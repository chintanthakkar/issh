<?php $view->extend('IsshMainBundle::layout.html.php') ?>


<?php echo $view->render('IsshMainBundle:Home:IsshPost.html.php', array('posts'=>$posts));?>