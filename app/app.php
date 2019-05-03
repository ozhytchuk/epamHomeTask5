<?php
$app = [
    'name' => 'Book Store',

    'routes' => [
        'books' => [
            'path' => '/',
            'file' => 'books.php',
            'function' => 'src\\books\\allBooks',
        ],
        'search_by_word' => [
            'path' => '/books/find-words',
            'file' => 'books.php',
            'function' => 'src\\books\\searchByWord',
        ],
        'search_by_tags' => [
            'path' => '/books/find-tags',
            'file' => 'books.php',
            'function' => 'src\\books\\searchByTags',
        ],
        'book_by_id' => [
            'path' => '/books/{id}.html',
            'file' => 'books.php',
            'function' => 'src\\books\\bookById',
        ],
        'sort_by' => [
            'path' => '/books/sort-by/{param}',
            'file' => 'books.php',
            'function' => 'src\\books\\sortBy'
        ]
    ],
];

$app['db'] = new PDO("mysql:host=localhost;dbname=books", 'root', '');