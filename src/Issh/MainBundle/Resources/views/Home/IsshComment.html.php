<?php if(!empty($form)): ?>
<form action="<?php echo $view['router']->generate('comment') ?>" method="post" <?php echo $view['form']->enctype($form) ?> >
    <?php echo $view['form']->errors($form) ?>
    <?php echo $view['form']->row($form['text']) ?>
    <?php echo $view['form']->rest($form) ?>
    <input type="submit" />
</form>
<?php endif; ?>
<?php if(!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
    <p><?php echo $comment->getText();?></p>
    **********************************
    <?php endforeach; ?>
<?php endif; ?>
