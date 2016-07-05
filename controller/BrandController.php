<?php

include_once $_SERVER["SERVER_ROOT"].'/model/Brand.php';

$brands;

if(!empty($_POST['brand'])) //добавляем роль в БД
{
    $name = $_POST['brand'];
    //$title = filter_var($_POST['person_role'], FILTER_SANITIZE_STRING /*, FILTER_FLAG_STRIP_HIGH*/);
    Brand::insertBrand($name);
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newBrand.php');
    echo 'insert brand: '. $name;
    exit();
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Brand::removeById($_GET['id']);
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newBrand.php');
    echo 'delete Brand by id='.$_GET['id'];
    exit();
}
else //отображаем все роли
{
    $brands = Brand::getAll();    
}