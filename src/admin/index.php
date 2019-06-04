<?php

namespace src\admin;

use function core\view\view;
use PDO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

function index()
{
    global $app;

    $STH = $app['db']->prepare("SELECT * FROM books");
    $STH->execute();
    $books = $STH->fetchAll(PDO::FETCH_OBJ);

    return view(['admin/default_layout.php', 'admin/index.php'], compact('books'));
}

function deleteBook($id)
{
    global $app;
    $message = '';

    $STH = $app['db']->prepare("DELETE FROM books WHERE id = :id");
    if ($STH) {
        $STH->execute(['id' => $id]);
        $message = 'Recording successfully deleted';
    }

    return view(['admin/default_layout.php', 'admin/information.php'], ['id' => $id, 'message' => $message]);
}

function editBook($id)
{
    global $app;
    global $request;

    $message = '';

    $STH = $app['db']->prepare(
        "UPDATE books SET ISBN=:isbn, title=:title, author=:author, description=:descr, poster=:poster, url=:url,
        price=:price, book_tags=:tags, book_date=:book_date WHERE id=:id");
    $STH->execute([
        'isbn' => $request->get('isbn'),
        'title' => $request->get('title'),
        'author' => $request->get('author'),
        'descr' => $request->get('desc'),
        'poster' => $request->get('poster'),
        'url' => $request->get('url'),
        'price' => $request->get('price'),
        'tags' => $request->get('tags'),
        'book_date' => $request->get('book_date'),
        'id' => $id,
    ]);

    if ($STH) {
        $message = 'Your changes have been successfully saved';
    }

    return view(['admin/default_layout.php', 'admin/information.php'], compact('message'));
}

function bookById($id)
{
    global $app;

    $STH = $app['db']->prepare("SELECT * FROM books WHERE id = :id");
    $STH->execute(['id' => $id]);
    $data = $STH->fetchAll(PDO::FETCH_OBJ);

    return view(['admin/default_layout.php', 'admin/edit.php'], compact('data'));
}

function form()
{
    return view(['admin/default_layout.php', 'admin/create.php']);
}

function create()
{
    global $app;
    global $request;

    $data = [
        'isbn' => (int)$request->get('isbn'),
        'title' => $request->get('title'),
        'author' => $request->get('author'),
        'descr' => $request->get('desc'),
        'poster' => $request->get('poster'),
        'url' => $request->get('url'),
        'price' => (float)$request->get('price'),
        'tags' => $request->get('tags'),
        'book_date' => $request->get('book_date'),
    ];
    $sql = "INSERT INTO books (ISBN, title, author, description, poster, url, price, book_tags, book_date) VALUES 
    (:isbn, :title, :author, :descr, :poster, :url, :price, :tags, :book_date)";
    $stmt = $app['db']->prepare($sql);
    $stmt->execute($data);

    if ($stmt) {
        $message = 'Your changes have been successfully saved';
    }

    return view(['admin/default_layout.php', 'admin/information.php'], compact('message'));
}