<?php if(session('errorMsg')): ?>
    <?php foreach(session('errorMsg') as $error): ?>
        <div class="alert alert-warning alert-danger " role="alert">
            <?=$error?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>s
        </div>
        <?php break; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php if(session('successMsg')): ?>
    <?php foreach(session('successMsg') as $success): ?>
        <div class="alert alert-success alert-success " role="alert">
            <?=$success?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break; ?>
    <?php endforeach; ?>
<?php endif; ?>