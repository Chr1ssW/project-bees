<?php
$errors = array();
if (count($errors) > 0) : ?>
    <div class="invalid-response">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>