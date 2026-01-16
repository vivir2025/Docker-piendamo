<br>
<div class="container">
    <?php if (isset($msg)) { ?>
        <!-- Presentacion del mensajes de error
        <div class='alert alert-dismissible alert-<?= $tipmsg ?> fade in' data-dismiss="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $msg ?>
        </div>-->
        <div class="alert alert-<?= $tipmsg ?> alert-dismissible fade show" role="alert">
            <?= $msg ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
</div>