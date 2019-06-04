<?php
$app = [
    'name' => 'Book Store',

    'routes' => [
        'books' => [
            'path' => '/',
            'file' => 'books.php',
            'function' => 'src\\books\\index',
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
        ],
        'admin' => [
            'path' => '/admin',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\index',
        ],
        'delete_book' => [
            'path' => '/admin/delete/{id}',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\deleteBook',
        ],
        'edit_book' => [
            'path' => '/admin/edit/{id}',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\editBook',
        ],
        'by_id' => [
            'path' => '/admin/view/{id}',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\bookById',
        ],
        'create' => [
            'path' => '/admin/create',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\create',
        ],
        'form' => [
            'path' => '/admin/form',
            'file' => 'admin/index.php',
            'function' => 'src\\admin\\form',
        ],
    ],
];

$app['db'] = new PDO("mysql:host=localhost;dbname=book_store", 'root', '');
$app['per_page'] = 4;