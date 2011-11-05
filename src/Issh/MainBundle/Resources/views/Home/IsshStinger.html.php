<?php if(!empty($form)): ?>
<form action="<?php echo $view['router']->generate('stinger') ?>" method="post" <?php echo $view['form']->enctype($form) ?> >
    <?php echo $view['form']->errors($form) ?>
    <?php echo $view['form']->rest($form) ?>
    <input type="submit" value="stinger!"/>
</form>
<?php endif; ?>
    **********************************
