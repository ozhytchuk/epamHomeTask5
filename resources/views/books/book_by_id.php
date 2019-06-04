<?php if (count($books) === 0) : ?>
    <div class="alert alert-warning">
        <strong>SORRY,</strong> we couldn't find this page.
    </div>
<?php endif; ?>
<?php foreach ($books as $book): ?>
    <ol class="my-breadcrumb">
        <li><a href="<?= \core\router\generate('books') ?>">Books</a></li>
        <li class="active-book"> / <?= $book->title; ?></li>
    </ol>
    <div class="book-item">
        <div class="poster">
            <img src="<?= $book->poster ?>" alt="<?= $book->title ?>" class="media-object">
            <div class="text-center" style="margin-top: 25px">
                <a href="<?= $book->url ?>" target="_blank" class="btn btn-success" id="but" role="button"
                   aria-pressed="true">More information</a>
            </div>
        </div>
        <div>
            <h4 class="book-title title-color"><?= $book->title ?></h4>
            <p><b>Author</b>: <?= $book->author ?></p>
            <p><b>Price</b>: <span style="color: #3c763d;">$ <?= $book->price ?></span></p>
            <p><b>Date</b>: <?= $book->book_date ?></p>
            <p>
                <b>Tags</b>:
                <?php
                $tags = explode(" ", $book->book_tags);
                foreach ($tags as $tag) : ?>
                    <span class="badge badge-pill badge-warning"><?= $tag ?></span>
                <?php endforeach; ?>
            </p>
            <p><?= $book->description; ?></p>
        </div>
    </div>
<?php endforeach; ?>