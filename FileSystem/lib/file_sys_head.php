<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2018/11/26
 * Time: 9:20 PM
 */
date_default_timezone_set("PRC");
error_reporting(E_ALL^E_NOTICE);
require_once 'dir.func.php';
define('MyFiles','MyFiles');
$result = isset($_REQUEST['path'])?$_REQUEST['path']:MyFiles;
$info = read_directory($result);
