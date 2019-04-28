<ol class="my-breadcrumb">
    <li><a href="<?= \core\router\generate('books') ?>">Books</a></li>
    <li class="active-book"> / <?= $books[0]['name']; ?></li>
</ol>
<div class="book-item">
    <div class="poster">
        <img src="<?= $books[0]['poster'] ?>" alt="<?= $books[0]['name'] ?>" class="media-object">
        <div class="text-center" style="margin-top: 25px">
            <a href="<?= $books[0]['url'] ?>" target="_blank" class="btn btn-success" id="but" role="button"
               aria-pressed="true">More information</a>
        </div>
    </div>
    <div>
        <h4 class="book-title title-color"><?= $books[0]['name'] ?></h4>
        <p><b>Author</b>: <?= $books[0]['author'] ?></p>
        <p><b>Price</b>: <span style="color: #3c763d;"><?= sprintf("$ %01.2f", $books[0]['price']) ?></span></p>
        <?php $date = explode(" ", $books[0]['book_date']); ?>
        <p><b>Date</b>: <?= $date[0] ?></p>
        <p>
            <b>Tags</b>:
            <?php
            $tags = explode(" ", $books[0]['book_tags']);
            foreach ($tags as $tag) : ?>
                <span class="badge badge-pill badge-warning"><?= $tag ?></span>
            <?php endforeach; ?>
        </p>
        <p><?= $books[0]['description']; ?></p>
    </div>
</div>