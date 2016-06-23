<?php

include_once  $_SERVER['DOCUMENT_ROOT'].'model/Person.php';

$persons;

if(!empty($_POST['firstname'])) //добавляем роль в БД
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $id_role = $_POST['id_role'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $card = $_POST['card'];
    
    if(!empty($_POST['id']))
    {
        //Person::updatePerson($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }
    else 
    {
        Person::insertPerson($firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }    
    header('Refresh: 10; url=http://test.com/newPerson.php');
    echo 'insert Person: '. "$id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Person::removeById($_GET['id']);
    header('Refresh: 3; url=http://test.com/newPerson.php');
    echo 'delete Person by id='.$_GET['id'];
}
else //отображаем все роли
{
    $persons = Person::getAll();    
}