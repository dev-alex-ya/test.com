<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once $_SERVER["SERVER_ROOT"].'/model/config.php';

class Event {
    static public function getAll()
    {        
        $query = "SELECT e.id, p.firstname, p.middlename, p.lastname, e.time_in, e.time_out, e.title, e.description "
                . "FROM b7_18317604_persons AS p, b7_18317604_events AS e "
                . "WHERE p.id = e.id_person ";
        $query2 = "";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function nextNDays($countOfDays)
    {        
        $query = "SELECT e.id, p.firstname, p.middlename, p.lastname, e.time_in, e.time_out, e.title, e.description "
                . "FROM b7_18317604_persons AS p, b7_18317604_events AS e "
                . "WHERE p.id = e.id_person AND TO_DAYS(NOW()) - TO_DAYS(e.time_out) <= $countOfDays";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function insertEvent($id_person, $time_in, $time_out, $title, $description)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $now = time();
        $query = "INSERT INTO b7_18317604_events (id_person,time_in, time_out, title, description) "
                . "values('$id_person','$time_in','$time_out','$title','$description')";
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }
    
    static public function updatePerson($id, $id_person, $time_out, $title, $description)
    {
        
    }
    
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_events WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
