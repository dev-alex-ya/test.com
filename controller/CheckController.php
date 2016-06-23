<?php

include_once $_SERVER['DOCUMENT_ROOT'].'model/Check.php';
include_once $_SERVER['DOCUMENT_ROOT'].'model/Calendar.php';

$checks;

if(!empty($_POST['total'])) //добавляем роль в БД
{
    $id_person = $_POST['id_person'];
    
    $time_out = Calendar::strToTimestamp($_POST['calendar']);
    
    
    if(!empty($_POST['id']))
    {
        //Check::updateCheck($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }
    else 
    {
        Check::insertCheck($id_person, $time_in, $time_out, $title, $description);
    }    
    header('Refresh: 10; url=http://test.com/newCheck.php');
    echo 'insert Check: '. "id=, id_person=$id_person, time_in=$time_in, time_out=$time_out, title=$title, description=$description";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{
    Check::removeById($_GET['id']);
    header('Refresh: 0; url=http://test.com/');
    echo 'delete Check by id='.$_GET['id'];
}
else //отображаем все роли
{
    $checks = Check::getAll();    
}