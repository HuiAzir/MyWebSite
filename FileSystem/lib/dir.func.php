<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2018/11/26
 * Time: 9:02 PM
 */

/**
 * 读取目录信息
 * @param $path
 * @return array|bool
 */
function read_directory($path){
    if(!is_dir($path)){
        return false;
    }
    $info=[];
    $arr=[];
    $handle = opendir($path);
    while(false !== ($item=@readdir($handle))){
        if($item!='.'&&$item!='..'){
            $filePath = $path.DIRECTORY_SEPARATOR.$item;
            $info['fileName'] = $filePath;
            $info['showName'] = $item;
            $info['readable'] = is_readable($filePath)?true:false;
            $info['writable'] = is_writable($filePath)?true:false;
            $info['executable'] = is_executable($filePath)?true:false;
            $info['atime'] = date('Y-m-d H:i:s',fileatime($filePath));
            if(is_file($filePath)){
                $arr['file'][]=$info;
            }
            if(is_dir($filePath)){
                $arr['dir'][]=$info;
            }
        }
    }
    closedir($handle);
    return $arr;
}

/**
 * 删除目录操作
 * @param $fileName
 * @return bool|string
 */
function del_directory($fileName){
    if(is_file($fileName)){
        if(@unlink($fileName)){
            return true;
        }else{
            return false;
        }
    }
    if(!is_dir($fileName)){
        return "目录不存在！";
    }
    $handle = opendir($fileName);
    while (false!==($item=@readdir($handle))){
        if($item!='.'&&$item!='..'){
            $filePath = $fileName.DIRECTORY_SEPARATOR.$item;
            if (is_file($filePath)){
                @unlink($filePath);
            }else{
                $func = __FUNCTION__;
                $func($filePath);
            }
        }
    }
    closedir($handle);
    rmdir($fileName);
}