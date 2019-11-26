<?php

//Config file
require '../config.php';
require '../util/Auth.php';

//Auto load all library class in libs folder
function __autoload($class)
{
    require ADMIN_LIBS . $class . ".php";
}

$app = new Bootstrap("../admin/");
$app->init();
