<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2018/11/25
 * Time: 11:41 AM
 */
error_reporting(E_ALL^E_NOTICE);
header("content-type:text/html;charset=uft8");
$path_info = substr($_SERVER['PATH_INFO'],1);
$array = explode('/',$path_info);
list($controller,$action) = $array;
if($controller == ''){
    $controller = 'IndexController';
}
if($action==''){
    $action='index';
}

require_once './controller/'.$controller.'.php';
$class = new $controller;
$class->$action();