<?php $view->extend('IsshMainBundle::layout.html.php') ?>

<?php 
//embed another controller in view
echo $view['actions']->render('IsshMainBundle:Home:post'); 
?>
