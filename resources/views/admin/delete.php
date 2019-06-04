<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Remove book</h1>
        </div>
        <form action="<?= \core\router\generate('admin') ?>" method="get">
            <div class="alert alert-danger fade in">
                <input type="hidden" name="id" value="<?= $id ?>"/>
                <p>Are you sure?</p><br>
                <p>
                    <input type="submit" value="Yes" class="btn btn-danger">
                    <a href="<?= \core\router\generate('admin') ?>" class="btn btn-default">No</a>
                </p>
            </div>
        </form>
    </div>
</div>