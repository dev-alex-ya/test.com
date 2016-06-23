<?php

include_once  $_SERVER['DOCUMENT_ROOT'].'model/Appeal.php';

$appeals;

if(!empty($_POST['title'])) //добавляем роль в БД
{
    //$id = $_POST['id']; //нужен для функции update
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    if(!empty($_POST['id']))//обработчик update (в разработке)
    {
        //Appeal::updateWork($id, $title, $description, $cost);
    }
    else //обработчик create
    {
        Work::insertAppeal($title, $description);
    }    
    header('Refresh: 10; url=http://test.com/newAppeal.php');
    echo 'insert Appeal: '. "$id, title=$title, description=$description";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Appeal::removeById($_GET['id']);
    header('Refresh: 3; url=http://test.com/newAppeal.php');
    echo 'delete Appeal by id='.$_GET['id'];
}
else //отображаем все роли
{
    $appeals = Appeal::getAll();    
}