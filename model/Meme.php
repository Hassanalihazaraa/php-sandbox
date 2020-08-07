<?php

class Meme
{
    private ?int $id;
    private string $name, $author, $src;

    public function __construct(string $name, string $author, string $src, ?int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->src = $src;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return ucfirst($this->name);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * @param string $src
     */
    public function setSrc(string $src): void
    {
        $this->src = $src;
    }

    private function insert(Pdo $pdo)
    {
        $q = $pdo->prepare('INSERT INTO meme (name, author, image) VALUES(:name, :author, :src)');
        $q->bindValue('name', $this->getName());
        $q->bindValue('author', $this->getAuthor());
        $q->bindValue('src', $this->getSrc());
        $q->execute();
        $this->id = $pdo->lastInsertId();
    }

    private function update(Pdo $pdo)
    {
        $q = $pdo->prepare('UPDATE meme SET name = :name, author = :author, image = :src WHERE id = :id');
        $q->bindValue('name', $this->getName());
        $q->bindValue('author', $this->getAuthor());
        $q->bindValue('src', $this->getSrc());
        $q->bindValue('id', $this->getId());
        $q->execute();
    }

    public function save(Pdo $pdo)
    {
        if(empty($this->getName())) {
            throw new DomainException('You need a name for your meme');
        }

        if(empty($this->id)) {
            $this->insert($pdo);
            return;
        }

        $this->update($pdo);
    }

    static public function load(Pdo $pdo, int $memeId) : self
    {
        $q = $pdo->prepare('select * from meme where id = :id');
        $q->bindValue('id', $memeId);
        $q->execute();
        $row = $q->fetch();

        if(empty($row['name'])) {
            throw new DomainException('Meme does not exist');
        }

        return new Meme($row['name'], $row['author'], $row['image'], $row['id']);
    }

    public function delete(Pdo $pdo)
    {
        $q = $pdo->prepare('DELETE FROM meme WHERE id = :id');
        $q->bindValue('id', $this->id);
        $q->execute();
    }
}