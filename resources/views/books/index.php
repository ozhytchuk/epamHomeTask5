<div class="sort-items">
    <span class="sort-items-desc">Sort by:</span>
    <a href="<?= \core\router\generate('sort_by', ['param' => 'title']) ?>"
       class="badge badge-dark"
       id="find-name">Name</a>
    <a href="<?= \core\router\generate('sort_by', ['param' => 'price']) ?>"
       class="badge badge-dark"
       id="find-price">Price</a>
</div>
<?php
$num_pages = ceil($count / 4);
if (count($books) > 0) :
    foreach ($books as $book) : ?>
        <div class="book-item">
            <div class="poster">
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book->id]) ?>">
                    <img src="<?= $book->poster ?>" alt="<?= $book->title ?>" class="media-object">
                </a>
            </div>
            <div>
                <h4 class="book-title"><a
                            href="<?= \core\router\generate('book_by_id',
                                ['id' => $book->id]) ?>"><?= $book->title ?></a>
                </h4>
                <p><b>Author</b>: <?= $book->author ?></p>
                <p><b>Price</b>: <span style="color: #3c763d;">$ <?= $book->price ?></span></p>
                <p><b>Date</b>: <?= $book->book_date ?></p>
                <p>
                    <b>Tags</b>:
                    <?php
                    $tags = explode(" ", $book->book_tags);
                    foreach ($tags as $tag) : ?>
                        <span class="badge badge-pill badge-success"><?= $tag ?></span>
                    <?php endforeach; ?>
                </p>
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book->id]) ?>" class="btn btn-primary">Details</a>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="pag">
        <div class="pagination-page">
            <?php for ($page = 1; $page <= $num_pages; $page++) : ?>
                <a class="page-link" href='?page=<?= $page ?>'><?= $page ?></a>
            <?php endfor; ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        <strong>SORRY,</strong> we couldn't find this page.
    </div>
<?php endif; ?>