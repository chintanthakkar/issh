<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
    <head>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
        <meta name="description" content="Angry? Frustrated? Slap someone!" />
        <meta name="keywords" content="Slap. Angry. Frustrated" />
        <meta name="robots" content="index, follow" />
        <title>
            <?php $view['slots']->output('title', 'I slap you so hard!') ?>
        </title>
        <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('css/style.css') ?>" media="screen" />
        <link rel="shortcut icon" href="<?php echo $view['assets']->getUrl('favico.ico') ?>" />
    </head>
    <body>
        <div id="header-wrap">
            <div id="header-container">
                <div id="center-logo">
                    <img src="<?php echo $view['assets']->getUrl('images/center-logo.png') ?>" width="120" height="120" alt="">
                </div>
            </div>
        </div>
        <div class="colmask threecol">
            <div class="colmid">
                <div class="colleft">
                    <div class="col1">
                        <!-- Main start -->
                        <?php $view['slots']->output('_content') ?>
                        <!-- Main end -->
                    </div>
                    <div class="col2">
                        <!-- Left start -->
                        <?php $view['slots']->output('LeftCol', '<h2>LEFT COL</h2>') ?>
                        <!-- Left end -->
                    </div>
                    <div class="col3">
                        <!-- Right start -->
                        <?php $view['slots']->output('RightCol', '<h2>RIGHT COL</h2>') ?>
                        <!-- Right end -->
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <h2>FOOTER</h2>
        </div>        
    </body>
</html>

