<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2018/11/25
 * Time: 2:36 PM
 */

class UserController
{
    public function show_html(){
        require_once 'view/HTML.html';
    }
    public function show_filesystem(){
        require_once 'model/file_sys_head.php';
        require_once 'view/FileSystem.php';
    }
    public function show_php(){
        require_once 'view/PHP.html';
    }
    public function show_css(){
        require_once 'view/CSS.html';
    }
    public function show_js(){
        require_once 'view/JavaScript.html';
    }
    public function show_mysql(){
        require_once 'view/MySQL.html';
    }
}