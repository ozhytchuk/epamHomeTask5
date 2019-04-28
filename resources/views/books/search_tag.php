<?php if ($_GET['search-tag'] > 0 && $_GET['search-tag'] <= $countTags) : ?>
    <div class="sort-items">
    <span class="sort-items-desc">Search by tag: <span class="badge badge-warning"
                                                       id="find-name"><?= $books[0]['tag'] ?></span></span>
    </div>
<?php else : ?>
    <div class="alert alert-warning">
        <strong>SORRY,</strong> we couldn't find this page.
    </div>
<?php endif; ?>

<?php if (isset($books) && (!empty($books))) {
    foreach ($books as $book) : ?>
        <div class="book-item">
            <div class="poster">
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>">
                    <img src="<?= $book['poster'] ?>" alt="<?= $book['name'] ?>" class="media-object">
                </a>
            </div>
            <div>
                <h4 class="book-title"><a
                        href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"><?= $book['name'] ?></a>
                </h4>
                <p><b>Author</b>: <?= $book['author'] ?></p>
                <p><b>Price</b>: <span style="color: #3c763d;"><?= sprintf("$ %01.2f", $book['price']) ?></span></p>
                <?php $date = explode(" ", $book['book_date']); ?>
                <p><b>Date</b>: <?= $date[0] ?></p>
                <p>
                    <b>Tags</b>:
                    <?php
                    $tags = explode(" ", $book['book_tags']);
                    foreach ($tags as $tag) : ?>
                        <span class="badge badge-pill badge-success"><?= $tag ?></span>
                    <?php endforeach; ?>
                </p>
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>" class="btn btn-primary">Details</a>
            </div>
        </div>
    <?php endforeach;
}