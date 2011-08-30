<?php $view->extend('::base.html.php') ?>

<?php $view['slots']->output('_content') ?>

<?php $view['slots']->start('LeftCol') ?>
    Some large amount of HTML
<?php $view['slots']->stop() ?>

<?php $view['slots']->set('RightCol', 'Hello World Application') ?>