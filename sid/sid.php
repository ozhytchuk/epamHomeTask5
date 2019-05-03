<?php

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

try {
    $DBH = new PDO("mysql:host=localhost;dbname=test", 'root', '');
} catch(PDOException $e) {
    echo $e->getMessage();
}

$DBH->query('DELETE FROM books');

$author = $faker->firstName . ' ' . $faker->lastName;

for ($i = 0; $i < 5; $i++) {
    $STH = $DBH->prepare('
    INSERT INTO 
    books 
    (ISBN, title, author, description, poster, url, price, book_tags, book_date) 
    VALUES 
    (:ISBN, :title, :author, :description, :poster, :url, :price, :book_tags, :book_date)
    ');
    $STH->bindParam(':ISBN', $faker->randomNumber(9));
    $STH->bindParam(':title', $faker->text(75));
    $STH->bindParam(':author', $author);
    $STH->bindParam(':description', $faker->text(2500));
    $STH->bindParam(':poster', $faker->imageUrl());
    $STH->bindParam(':url', $faker->url);
    $STH->bindParam(':price', $faker->randomFloat(2, 1, 50));
    $STH->bindParam(':book_tags', $faker->word);
    $STH->bindParam(':book_date', $faker->date($format = 'Y-m-d', $max = 'now'));
    $STH->execute();
}