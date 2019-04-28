<?php

namespace src\books;

use function core\view\view;
use Symfony\Component\HttpFoundation\Response;

/**
 * @return Response
 */
function allBooks()
{
    global $app;
    /** @var Symfony\Component\HttpFoundation\Request*/
    global $request;

    $pageNumber = $request->get('page');
    $page = (!isset($pageNumber)) ? 1 : $pageNumber;
    $pageResult = ($page - 1) * 4;
    $books = [];

    $result = $app['db']->query("SELECT * FROM books LIMIT $pageResult, 4");

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    return view(['default_layout.php', 'books/index.php'], ['books' => $books]);
}

/**
 * @param $param
 * @return Response
 */
function sortBy($param)
{
    global $app;
    global $request;

    $pageNumber = $request->get('page');
    $books = [];
    $page = (!isset($pageNumber)) ? 1 : $pageNumber;
    $pageResult = ($page - 1) * 4;

    $result = $app['db']->query("SELECT * FROM books ORDER BY $param LIMIT $pageResult, 4");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }

    return view(['default_layout.php', 'books/index.php'], ['books' => $books]);
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
        $querySearch .= '`name` LIKE "%' . $item . '%"';
    }

    $result = "SELECT * FROM books WHERE $querySearch";

    return view(['default_layout.php', 'books/search.php'], ['result' => $result]);
}

/**
 * @return Response
 */
function searchByTags()
{
    global $app;
    global $request;

    $books = [];
    $tag = $request->get('search-tag');

    $result = $app['db']->query("
        SELECT books.*, books_tag.*, tags.* FROM books 
        INNER JOIN books_tag ON books.ISBN=books_tag.ISBN 
        INNER JOIN tags ON books_tag.tag=tags.id WHERE books_tag.tag = $tag
    ");

    $countTags = [];
    $tags = $app['db']->query("SELECT * FROM tags");
    while ($row = $tags->fetch_assoc()) {
        $countTags[] = $row;
    }

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;

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

    $books = [];
    $result = $app['db']->query("SELECT * FROM books WHERE id = $id");

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    return view(['default_layout.php', 'books/book_by_id.php'], ['books' => $books]);
}