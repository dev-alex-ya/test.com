<?php

$login = 'test_login'; 
$pass = 'test_password'; 

if(($_SERVER['PHP_AUTH_PW']!= $pass || $_SERVER['PHP_AUTH_USER'] != $login)|| !$_SERVER['PHP_AUTH_USER']) 
{ 
    header('WWW-Authenticate: Basic realm="Test auth"'); 
    header('HTTP/1.0 401 Unauthorized'); 
    echo 'Auth failed'; 
    exit; 
}



//include_once $_SERVER['DOCUMENT_ROOT'].'model/config.php';
//
//function getAll()
//{
//    $query = "SELECT b7_18317604_users.b7_18317604_login, b7_18317604_users.b7_18317604_password FROM b7_18317604_users";
//    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
//    $db->query("SET NAMES 'utf8'");
//    $result = $db->query($query) or die($db->error);
//    $db->close();
//    return $result->fetch_all();
//}
//
//$authArr = getAll();//в массив помещаются правильные пользователи и пароли
//$flag = FALSE;//классика жанра
//$N = count($authArr);//меряем массив
//
//
//print_r($authArr);//отладочная информация
//
////сравниваем то что нам подсовывает юзер с тем что в базе
//for($z=0; $z < $N; $z++)
//{
//    if(($_SERVER['PHP_AUTH_PW']!= $authArr[$z][1] || $_SERVER['PHP_AUTH_USER'] != $authArr[$z][0])|| !$_SERVER['PHP_AUTH_USER']) 
//    { 
//        continue;
//    }
//    else 
//    {
//        $flag=TRUE;    
//    }
//}
//if(!$flag)//если не то, выдаем запрос авторизации
//{
//    header('WWW-Authenticate: Basic realm="Test auth"'); 
//    header('HTTP/1.0 401 Unauthorized'); 
//    echo 'Auth failed'; 
//    exit;
//}