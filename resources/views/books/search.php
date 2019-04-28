<div class="sort-items">
    <span class="sort-items-desc">Results for: <span class="badge badge-warning"
                                                     id="find-name"><?= $_GET['search'] ?></span></span>
</div>
<?php
if (isset($_GET['search']) && ($_GET['search']) != '') {
    if ($q = $app['db']->query($result)) {
        if ($q->num_rows == 0) {
            echo 'No results for <b>' . $_GET['search'] . '</b>.</br>';
            echo 'Try checking your spelling or use more general terms';
        } else {
            while ($book = $q->fetch_assoc()) : ?>
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
                        <p><b>Price</b>: <span style="color: #3c763d;"><?= sprintf("$ %01.2f", $book['price']) ?></span>
                        </p>
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
                        <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"
                           class="btn btn-primary">Details</a>
                    </div>
                </div>
            <?php endwhile;
        }
    }
}