<?php

namespace src\books;

use PDO;
use function core\view\view;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @return Response
 */
function index()
{
    global $app;
    global $request;

    $page = ($request->get('page', 1) - 1) * 4;

    $STH = $app['db']->prepare("SELECT * from books limit :page, :per_page");
    $allBooks = $app['db']->query("SELECT * FROM books");
    $STH->bindParam(':page', $page, PDO::PARAM_INT);
    $STH->bindParam(':per_page', $app['per_page'], PDO::PARAM_INT);
    $STH->execute();
    $books = $STH->fetchAll(PDO::FETCH_OBJ);
    $countRows = $allBooks->rowCount();

    return view(['default_layout.php', 'books/index.php'], ['books' => $books, 'count' => $countRows]);
}

/**
 * @param $param
 * @return Response
 */
function sortBy($param)
{
    global $app;
    global $request;

    $page = ($request->get('page', 1) - 1) * 4;
    $books = '';

    $STH = $app['db']->prepare("SELECT * FROM books ORDER BY $param LIMIT :page, :per_page");
    $allBooks = $app['db']->query("SELECT * FROM books");
    $STH->bindParam(':page', $page, PDO::PARAM_INT);
    $STH->bindParam(':per_page', $app['per_page'], PDO::PARAM_INT);
    $countRows = $allBooks->rowCount();

    if ($STH) {
        $STH->execute();
        $books = $STH->fetchAll(PDO::FETCH_OBJ);
    }

    return view(['default_layout.php', 'books/index.php'], ['books' => $books, 'count' => $countRows]);
}

/**
 * @return Response
 */
function searchByWord()
{
    global $request;

    $word = $request->get('search');
    $wordSearch = explode(" ", htmlspecialchars($word));
    $querySearch = '';

    foreach ($wordSearch as $key => $item) {
        if ($key > 0) {
            $querySearch .= ' OR ';
        }
        $querySearch .= '`title` LIKE "%' . $item . '%"';
    }

    $result = "SELECT * FROM books WHERE $querySearch";

    return view(['default_layout.php', 'books/search.php'], ['result' => $result, 'word' => $word]);
}

/**
 * @return Response
 */
function searchByTags()
{
    global $app;
    global $request;

    $tag = $request->get('search-tag');

    $STH = $app['db']->prepare("
        SELECT books.*, books_tag.*, tags.* FROM books 
        INNER JOIN books_tag ON books.id=books_tag.book_id 
        INNER JOIN tags ON books_tag.tag_id=tags.id WHERE books_tag.tag_id = :tag
    ");
    $STH->bindParam(':tag', $tag, PDO::PARAM_INT);
    $STH->execute();
    $books = $STH->fetchAll(PDO::FETCH_ASSOC);

    $countTags = [];
    $tags = $app['db']->query("SELECT * FROM tags");
    $tags->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $tags->fetch()) {
        $countTags[] = $row;
    }

    return view(['default_layout.php', 'books/search_tag.php'], ['books' => $books, 'countTags' => count($countTags)]);
}

/**
 * @param $id
 * @return Response
 */
function bookById($id)
{
    global $app;

    $STH = $app['db']->prepare("SELECT * FROM books WHERE id = :id");
    $STH->execute([
        ':id' => $id,
    ]);
    $books = $STH->fetchAll(PDO::FETCH_OBJ);

    return view(['default_layout.php', 'books/book_by_id.php'], compact('books'));
}