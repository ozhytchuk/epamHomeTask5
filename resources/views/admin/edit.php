<div class="container">
    <?php foreach ($data

    as $item): ?>
    <form action="<?= \core\router\generate('edit_book', ['id' => $item->id]) ?>" method="get">
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" value="<?= $item->ISBN ?>" required>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= $item->title ?>" required>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="<?= $item->author ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea rows="10" class="form-control" name="desc" required><?= $item->description ?></textarea>
        </div>
        <div class="form-group">
            <label>Poster</label>
            <input type="text" name="poster" class="form-control" value="<?= $item->poster ?>" required>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" class="form-control" value="<?= $item->url ?>" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="<?= $item->price ?>" required>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" class="form-control" value="<?= $item->book_tags ?>">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="text" name="book_date" class="form-control" value="<?= $item->book_date ?>"
                   placeholder="YYYY:MM:DD" required>
        </div>
        <div class="modal-footer">
            <a href="<?= \core\router\generate('admin') ?>"><input type="button" class="btn btn-default"
                                                                   value="Cancel"></a>
            <input type="submit" class="btn btn-info" value="Save">
        </div>
        <?php endforeach; ?>
    </form>
</div>