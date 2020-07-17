<?php
declare(strict_types=1);

// upload memes
// rate them
// display the highest available meme

// user table (email, password, username, description)
// 1:m + m:m (for ratings)
// meme table (name, author, src, rating)

// ç c b d é è e

$pdo = new PDO('mysql:host=localhost;dbname=memeapp', 'root');
