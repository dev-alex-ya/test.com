<?php

include_once $_SERVER["SERVER_ROOT"].'/model/ObjectType.php';

$types;

if(!empty($_POST['object_type'])) //добавляем роль в БД
{
    $name = $_POST['object_type'];    
    ObjectType::insertObjectType($name);
    header('Refresh: 0; url=http://myserviceapp.byethost7.com/newObjectType.php');
    echo 'insert object_type: '. $name;
    exit();
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    ObjectType::removeById($_GET['id']);
    header('Refresh: 0; url=http://myserviceapp.byethost7.com/newObjectType.php');
    echo 'delete object_type by id='.$_GET['id'];
    exit();
}
else //отображаем все object_type
{
    $types = ObjectType::getAll();    
}