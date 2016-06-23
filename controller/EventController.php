<?php

include_once $_SERVER['DOCUMENT_ROOT'].'model/Event.php';
include_once $_SERVER['DOCUMENT_ROOT'].'model/Calendar.php';

$events;
$next7days;

if(!empty($_POST['title'])) //добавляем роль в БД
{
    $id_person = $_POST['id_person'];
    $time_in = time();
    $time_out = Calendar::strToTimestamp($_POST['calendar']);
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    if(!empty($_POST['id']))
    {
        //Person::updatePerson($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }
    else 
    {
        Event::insertEvent($id_person, $time_in, $time_out, $title, $description);
    }    
    header('Refresh: 10; url=http://test.com/newEvent.php');
    echo 'insert events: '. "id=, id_person=$id_person, time_in=$time_in, time_out=$time_out, title=$title, description=$description";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{   
    Event::removeById($_GET['id']);
    header('Refresh: 0; url=http://test.com/');
    echo 'delete events by id='.$_GET['id'];
}
else //отображаем все роли
{
    $events = Event::getAll();
    $next7days = Event::getAll();
}