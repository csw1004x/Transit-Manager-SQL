<?php
    error_reporting(E_ALL);   
    require "class/menu_template.php";

    $tpl = new Template('template');

    $menu = $tpl->render('employee');

    print $tpl->render('index', array(
        'bus_num' => 'that has this value',
        'user_bio' => 'with another value',
    ));
?>