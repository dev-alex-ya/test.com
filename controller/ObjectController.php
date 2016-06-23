<?php

include_once  $_SERVER['DOCUMENT_ROOT'].'model/Object.php';

$objects;

if(!empty($_POST['model'])) //добавляем роль в БД
{
    $id_type = $_POST['id_type'];
    $id_brand = $_POST['id_brand'];
    $model = $_POST['model'];
    $serial_number = $_POST['serial_number'];
    $cost = $_POST['cost'];

    if(!empty($_POST['id']))
    {
        //Person::updatePerson($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }
    else
    {
        Object::insertObject($id_type, $id_brand, $model, $serial_number, $cost);
    }
    header('Refresh: 0; url=http://test.com/newObject.php');
    //echo 'insert object: '."$id, $id_type, $id_brand, $model, $serial_number, $cost";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{
    Object::removeById($_GET['id']);
    header('Refresh: 3; url=http://test.com/newObject.php');
    echo 'delete Objects by id='.$_GET['id'];
}
else //отображаем все роли
{
    $objects = Object::getAll();
}