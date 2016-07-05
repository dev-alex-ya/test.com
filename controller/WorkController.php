<?php

include_once $_SERVER["SERVER_ROOT"].'/model/Work.php';

$works;

if(!empty($_POST['title'])) //добавляем роль в БД
{
    //$id = $_POST['id']; //нужен для функции update
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cost = floatval($_POST['cost']);
    
    
    if(!empty($_POST['id']))//обработчик update (в разработке)
    {
        //Work::updateWork($id, $title, $description, $cost);
    }
    else //обработчик create
    {
        Work::insertWork($title, $description, $cost);
    }    
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newWork.php');
    echo 'insert Work: '. "id, title=$title, description=$description, cost=$cost";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Work::removeById($_GET['id']);
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newWork.php');
    echo 'delete Work by id='.$_GET['id'];
}
else //отображаем все роли
{
    $works = Work::getAll();    
}