<?php

include_once  $_SERVER['DOCUMENT_ROOT'].'model/Role.php';

$roles;

if(!empty($_POST['person_role'])) //добавляем роль в БД
{
    $title = $_POST['person_role'];
    //$title = filter_var($_POST['person_role'], FILTER_SANITIZE_STRING /*, FILTER_FLAG_STRIP_HIGH*/);
    Role::insertRole($title);
    header('Refresh: 0; url=http://test.com/newRole.php');
    echo 'insert role: '. $title;
    exit();
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Role::removeById($_GET['id']);
    header('Refresh: 0; url=http://test.com/newRole.php');
    echo 'delete role by id='.$_GET['id'];
    exit();
}
else //отображаем все роли
{
    $roles = Role::getAll();    
}