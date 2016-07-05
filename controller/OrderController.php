<?php

include_once $_SERVER["SERVER_ROOT"].'/model/Order.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Calendar.php';
include_once $_SERVER["SERVER_ROOT"].'/model/Appeal.php';

$events;
$next7days;

if(!empty($_POST['id_object'])) //добавляем заказ в БД
{
    $date_in = time();
    $status = $_POST['status'];
    $date_out = Calendar::strToTimestamp($_POST['date_out']);
    $source = $_POST['source'];
    $id_manager = $_POST['id_manager'];
    $id_object = $_POST['id_object'];    
    $id_event = $_POST['id_event'];
    $id_check = $_POST['id_check'];
    $comment = $_POST['comment'];
    
    $appeals = $_POST['appeals'];
    $appealString='';
    foreach ($appeals as $value)
    {
        $appealString = $appealString .' '. Appeal::getNameById($value) ."\n";
    }

    if(!empty($_POST['id']))
    {
        //Order::updateOrder($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card);
    }
    else 
    {        
        Order::insertOrder($date_in, $status, $date_out,
            $source, $id_manager, $id_object, $appealString,
            $id_event, $id_check, $comment);
    }    
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newOrder.php');
    echo 'insert order: '. "id=, date_in=$date_in, status=$status, "
            . "date_out=$date_out, id_source=$source, id_manager=$id_manager, "
            . "id_object =$id_object, appeal=$appealString, "
            . "id_event=$id_event, id_check=$id_check, comment=$comment ";
}
if(!empty($_GET['id'])) //удаляем заказ из БД
{   
    Order::removeById($_GET['id']);
    header('Refresh: 3; url=http://myserviceapp.byethost7.com/newOrder.php');
    echo 'delete order by id='.$_GET['id'];
}
else //отображаем все роли
{
    $orders = Order::getAll();
    //$next7days = Event::getAll();
}