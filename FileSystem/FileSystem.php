<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/MyWebsite/image/hsq.png">
    <title>Hui的文件管理器</title>
</head>
<link rel="stylesheet" href="/MyWebsite/font/css/font-awesome.min.css">
<link href="https://cdn.bootcss.com/twitter-bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<body>
<?php
    require_once 'lib/file_sys_head.php';
?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/MyWebsite/index.php/IndexController/index">Hui首页</a>
                        </li>
                        <li>
                            <a href="/MyWebsite/index.php/UserController/show_html">HTML</a>
                        </li>
                        <li>
                            <a href="/MyWebsite/index.php/UserController/show_css">CSS</a>
                        </li>
                        <li>
                            <a href="/MyWebsite/index.php/UserController/show_js">JavaScript</a>
                        </li>
                        <li>
                            <a href="/MyWebsite/index.php/UserController/show_php">PHP</a>
                        </li>
                        <li>
                            <a href="/MyWebsite/index.php/UserController/show_mysql">MySQL</a>
                        </li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">工具<strong class="caret"></strong></a>
                            <ul class="dropdown-menu" role="menu" style="display: none;">
                                <li><a href="/MyWebsite/index.php/UserController/show_filesystem">文件管理</a></li>
                            </ul>
                        </li>
                        <li class="active"><a>Web在线文件管理器</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row clearfix" style="margin-top: 60px">
        <div class="col-md-12 column">
            <blockquote>
                <p>
                    Web在线文件管理器主要用于管理项目文件，实现在线编辑、修改、删除等操作。
                </p>
            </blockquote>
        </div>
        <div class="col-md-12 column">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>类型</th>
                    <th>名称</th>
                    <th>大小</th>
                    <th>读/写/执行</th>
                    <th>最后访问时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(is_array($info['dir'])){
                        foreach($info['dir'] as $value){
                ?>
                <tr>
                    <td><i class="fa fa-folder" aria-hidden="true"></i></td>
                    <td><?php echo $value['showName'] ?></td>
                    <td><?php echo $value['filesize'] ?></td>
                    <td>
                        <?php
                        $msg = '';
                        if ($value['readable'] == true) {
                            $msg .= '<i class="fa fa-check"></i>';
                        }else{
                            $msg .='<i class="fa fa-close"></i>';
                        }
                        if ($value['writable'] == true) {
                            $msg .= '<i class="fa fa-check"></i>';
                        }else{
                            $msg .='<i class="fa fa-close"></i>';
                        }
                        if ($value['executable'] == true) {
                            $msg .= '<i class="fa fa-check"></i>';
                        }else{
                            $msg .='<i class="fa fa-close"></i>';
                        }
                        echo $msg;
                        ?>
                    </td>
                    <td><?php echo $value['atime'] ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="FileSystem.php?path=<?php echo $value['fileName']?>">打开</a>
                        <a class="btn btn-primary btn-sm" href="#">重命名</a>
                        <a class="btn btn-primary btn-sm" href="#">剪切</a>
                        <a class="btn btn-primary btn-sm" href="#">复制</a>
                        <a class="btn btn-danger btn-sm deleteDir" href="javascript:void(0)" data-url="index.php?path=<?php echo $path?>&action=deleteDir&filename=<?php echo $value['filename']?>" data-showname="<?php echo $value['showname']?>">删除</a>
                    </td>
                </tr>
                <?php
                    }
                  }
                ?>
                <?php
                if(is_array($info['file'])){
                    foreach($info['file'] as $val){
                        ?>
                        <tr>
                            <td><?php echo $val['showName']?></td>
                            <td><?php echo $val['showName']?></td>
                            <td><?php echo $val['showName']?></td>
                            <td><?php echo $val['showName']?></td>
                            <td><?php echo $val['showName']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="#">查看</a>
                                <a class="btn btn-primary btn-sm" href="#">编辑</a>
                                <a class="btn btn-primary btn-sm" href="#">下载</a>
                                <a class="btn btn-primary btn-sm" href="#">重命名</a>
                                <a class="btn btn-primary btn-sm" href="#">剪切</a>
                                <a class="btn btn-primary btn-sm" href="#">复制</a>
                                <a class="btn btn-danger btn-sm deleteDir" href="javascript:void(0)" data-url="index.php?path=<?php echo $path?>&action=deleteDir&filename=<?php echo $value['filename']?>" data-showname="<?php echo $value['showname']?>">删除</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <p class="text-center muted">
                2018@哈尔滨理工大学-崔文辉版权所有
            </p>
        </div>
    </div>
</div>
</body>
</html>