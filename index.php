<?php
declare(strict_types=1);

require 'Model/Meme.php';
// upload memes
// rate them
// display the highest available meme

// user table (email, password, username, description)
// 1:m + m:m (for ratings)
// meme table (name, author, src, rating)

// ç c b d é è e

$pdo = new PDO('mysql:host=localhost;dbname=memeapp', 'root');

// index.php?id=2
if(!empty($_GET['id'])) {
    $meme = Meme::load($pdo, (int)$_GET['id']);
}
elseif(!empty($_POST['id'])) {
    $meme = Meme::load($pdo, (int)$_POST['id']);
}
else {
    $meme = new Meme('','','');
}

if(isset($_POST['mode'])) {
    if($_POST['mode'] === 'save') {
        $meme->setAuthor($_POST['author']);
        $meme->setName($_POST['name']);
        $meme->setSrc($_POST['src']);
        $meme->save($pdo);
        die('save');
    }
    elseif($_POST['mode'] === 'delete') {
        $meme->delete($pdo);
    }
}

require 'templates/meme.php';
