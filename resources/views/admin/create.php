<div class="container">
    <form action="<?= \core\router\generate('create') ?>" method="get">
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea rows="10" class="form-control" name="desc" required></textarea>
        </div>
        <div class="form-group">
            <label>Poster</label>
            <input type="text" name="poster" class="form-control" required>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="text" name="url" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" class="form-control">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="text" name="book_date" class="form-control" placeholder="YYYY:MM:DD" required>
        </div>
        <div class="modal-footer">
            <a href="<?= \core\router\generate('admin') ?>"><input type="button" class="btn btn-default"
                                                                   value="Cancel"></a>
            <input type="submit" class="btn btn-info" value="Save">
        </div>
    </form>
</div>