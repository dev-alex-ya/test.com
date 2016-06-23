<?php

include_once $_SERVER['DOCUMENT_ROOT'].'model/Check.php';
include_once $_SERVER['DOCUMENT_ROOT'].'model/Calendar.php';

$checks;

if(!empty($_POST['total'])) //добавляем роль в БД
{
    $got_on_hands = $_POST['got_on_hands'];
    $blank_check = $_POST['blank_check'];
    $parts_cost = $_POST['parts_cost'];
    $transport = $_POST['transport'];
    $managers_part = $_POST['managers_part'];
    $masters_part = $_POST['masters_part'];
    $commission = $_POST['commission'];
    $total = $_POST['total'];
    $debt = $_POST['debt'];
    $transfer = $_POST['transfer'];
    $date_transfer = Calendar::strToTimestamp($_POST['date_transfer']);
        
    if(!empty($_POST['id']))
    {
//        Check::updateCheck($id, $got_on_hands, $blank_check, $parts_cost, 
//                $transport, $managers_part, $masters_part, $commission, 
//                $total,$debt,$transfer,$date_transfer);
    }
    else 
    {
        Check::insertCheck($got_on_hands, $blank_check, $parts_cost,
                $transport, $managers_part, $masters_part, $commission,
                $total,$debt,$transfer,$date_transfer
                );
    }    
    header('Refresh: 10; url=http://test.com/newCheck.php');
    echo 'insert Check: '. "id=, got_on_hands=$got_on_hands, blank_check=$blank_check, "
            . "parts_cost=$parts_cost, transport=$transport, managers_part=$managers_part "
            . "masters_part=$masters_part, commission=$commission, total=$total, "
            . "debt=$debt, transfer=$transfer, date_transfer=$date_transfer";
}
if(!empty($_GET['id'])) //удаляем роль из БД
{
    Check::removeById($_GET['id']);
    header('Refresh: 0; url=http://test.com/newCheck.php');
    echo 'delete Check by id='.$_GET['id'];
}
else //отображаем все роли
{
    $checks = Check::getAll();    
}