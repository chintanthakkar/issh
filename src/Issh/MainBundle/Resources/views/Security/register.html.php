<?php $view->extend('IsshMainBundle::layout.html.php') ?>
<form action="<?php echo $view['router']->generate('register') ?>" method="post" <?php echo $view['form']->enctype($form) ?> >
    <?php echo $view['form']->errors($form) ?>
    <?php echo $view['form']->row($form['firstName']) ?>
    <?php echo $view['form']->row($form['lastName']) ?>
    <?php echo $view['form']->row($form['userName']) ?>
    <?php echo $view['form']->row($form['password']) ?>
    <?php echo $view['form']->row($form['email']) ?>

    <?php echo $view['form']->rest($form) ?>
    <input type="submit" />
</form>