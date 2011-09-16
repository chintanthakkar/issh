<?php $view->extend('IsshMainBundle::layout.html.php') ?>
<form action="<?php echo $view['router']->generate('register') ?>" method="post" <?php echo $view['form']->enctype($form) ?> novalidate>
    <?php echo $view['form']->widget($form) ?>

    <input type="submit" />
</form>