<?php if (isset($_GET['search-tag']) && $_GET['search-tag'] > 0 && $_GET['search-tag'] <= $countTags && count($books) > 1) : ?>
    <div class="sort-items">
    <span class="sort-items-desc">Search by tag: <span class="badge badge-warning"
                                                       id="find-name"><?= $books[0]['tag'] ?></span></span>
    </div>
<?php elseif(count($books) === 0) : ?>
    <div class="alert alert-warning">
        <strong>SORRY,</strong> we couldn't find this page.
    </div>
<?php endif; ?>

<?php if (isset($books) && (!empty($books))) {
    foreach ($books as $book) : ?>
        <div class="book-item">
            <div class="poster">
                <img src="<?= $book['poster'] ?>" alt="<?= $book['title'] ?>" class="media-object">
            </div>
            <div>
                <h4 class="book-title"><a
                        href="<?=$book['url']?>"><?= $book['title'] ?></a>
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
            </div>
        </div>
    <?php endforeach;
}