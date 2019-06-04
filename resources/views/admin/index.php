<div class="page-header" id="add-book">
    <a href="<?= \core\router\generate('form') ?>" class="btn btn-success new-stud" id="but-add-book">Add new book</a>
</div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th>Poster</th>
        <th>URL</th>
        <th>Price</th>
        <th>Tags</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td><?= $book->id ?></td>
            <td><?= $book->ISBN ?></td>
            <td><?= $book->title ?></td>
            <td><?= $book->author ?></td>
            <td><?= htmlspecialchars(mb_strimwidth($book->description, 0, 50, '...')) ?></td>
            <td><?= mb_strimwidth($book->poster, 0, 25) ?></td>
            <td><?= mb_strimwidth($book->url, 0, 50) ?></td>
            <td><?= $book->price ?></td>
            <td><?= $book->book_tags ?></td>
            <td><?= $book->book_date ?></td>
            <td id="with-icons">
                <a href="<?= \core\router\generate('by_id', ['id' => $book->id]) ?>" class="edit"
                   data-toggle="modal"><i class="material-icons"
                                          data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="<?= \core\router\generate('delete_book', ['id' => $book->id]) ?>" class="delete"
                   data-toggle="modal"><i class="material-icons"
                                          data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
