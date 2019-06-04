<?php
if (isset($message)) : ?>
    <div class="alert alert-success" role="alert">
        <?= $message ?>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        Your changes have not been saved
    </div>
<?php endif; ?>
<a href="<?= \core\router\generate('admin') ?>"><input type="button" class="btn btn-primary"
                                                       value="Back"></a>