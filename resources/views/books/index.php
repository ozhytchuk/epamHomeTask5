<div class="sort-items">
    <span class="sort-items-desc">Sort by:</span>
    <a href="<?= \core\router\generate('sort_by', ['param' => 'name']) ?>"
       class="badge badge-dark"
       id="find-name">Name</a>
    <a href="<?= \core\router\generate('sort_by', ['param' => 'price']) ?>"
       class="badge badge-dark"
       id="find-price">Price</a>
</div>
<?php
if (!$_SERVER['QUERY_STRING'] || (strpos($_SERVER['QUERY_STRING'], 'page') === 0)) :
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
    <?php endforeach; ?>
    <div class="pagination-page">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($page = 1; $page <= 4; $page++) : ?>
                    <?php if (isset($_GET['sort_by'])) : ?>
                        <li class="page-item">
                            <a class="page-link"
                               href='?sort_by=<?= $_GET['sort_by'] ?>&page=<?= $page ?>'><?= $page ?></a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href='?page=<?= $page ?>'><?= $page ?></a>
                        </li>
                    <?php endif; endfor; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>