<?php

namespace src\books;

use PDO;
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
    $booksPerPage = 4;

    $STH = $app['db']->prepare("SELECT * from books limit :page, :per_page");
    $STH->bindParam(':page', $pageResult, PDO::PARAM_INT);
    $STH->bindParam(':per_page', $booksPerPage, PDO::PARAM_INT);
    $STH->execute();
    $result = $STH->fetchAll(PDO::FETCH_ASSOC);

    return view(['default_layout.php', 'books/index.php'], ['books' => $result]);
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
    $page = (!isset($pageNumber)) ? 1 : $pageNumber;
    $pageResult = ($page - 1) * 4;
    $booksPerPage = 4;
    $result = '';

    $STH = $app['db']->prepare("SELECT * FROM books ORDER BY $param LIMIT :page, :per_page");
    $STH->bindParam(':page', $pageResult, PDO::PARAM_INT);
    $STH->bindParam(':per_page', $booksPerPage, PDO::PARAM_INT);

    if ($STH) {
        $STH->execute();
        $result = $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    return view(['default_layout.php', 'books/index.php'], ['books' => $result]);
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

    $tag = $request->get('search-tag');

    $STH = $app['db']->prepare("
        SELECT books.*, books_tag.*, tags.* FROM books 
        INNER JOIN books_tag ON books.ISBN=books_tag.ISBN 
        INNER JOIN tags ON books_tag.tag=tags.id WHERE books_tag.tag = :tag
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
    $STH->bindParam(':id', $id, PDO::PARAM_INT);
    $STH->execute();
    $books = $STH->fetchAll(PDO::FETCH_ASSOC);

    return view(['default_layout.php', 'books/book_by_id.php'], ['books' => $books]);
}