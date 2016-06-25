<?php

include_once 'config.php';

class Order {
    static public function getAll()
    {        
        $query = "SELECT ord.id, ord.date_in, ord.status, ord.date_out, ord.source, "
                . "ord.id_manager, ord.id_object, ord.appeal, ord.id_event, "
                . "ord.id_check, ord.comment "
                . "FROM b7_18317604_orders AS ord";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function insertOrder($date_in, $status, $date_out,
            $source, $id_manager, $id_object, $appeal,
            $id_event, $id_check, $comment)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);        
        $query = "INSERT INTO b7_18317604_orders (date_in, status, "
                . "date_out, source, id_manager, id_object, appeal, "
                . "id_event, id_check, comment) "
                . "values('$date_in', '$status', '$date_out', '$source',"
                . " '$id_manager', '$id_object', '$appeal','$id_event',"
                . " '$id_check', '$comment')";
        
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }
        
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_orders WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
