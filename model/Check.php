<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once $_SERVER["SERVER_ROOT"].'/model/config.php';

class Check {
    static public function getAll()
    {
        $query = "SELECT c.id, c.got_on_hands, c.blank_check, c.parts_cost, "
                . "c.transport, c.managers_part, c.masters_part, c.commission, "
                . "c.total, c.debt, c.transfer, c.date_transfer "
                . "FROM b7_18317604_check AS c ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }

    static public function insertCheck($got_on_hands, $blank_check, $parts_cost,
                $transport, $managers_part, $masters_part, $commission,
                $total,$debt,$transfer,$date_transfer)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $now = time();
        $query = "INSERT INTO b7_18317604_check (got_on_hands, blank_check, parts_cost, "
               . "transport, managers_part, masters_part, commission, total, debt, transfer, date_transfer) "
               . "values('$got_on_hands', '$blank_check', '$parts_cost', "
               . "'$transport', '$managers_part', '$masters_part', '$commission', "
               . "'$total', '$debt', '$transfer', '$date_transfer')";
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }
    
    static public function updateCheck($id)
    {
        //to do
    }

    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_check WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}