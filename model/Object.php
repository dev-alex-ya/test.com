<?php

include_once $_SERVER["SERVER_ROOT"].'/model/config.php';

class Object {
    static public function getAll()
    {        
        $query = "SELECT ob.id, t.name, b.name, ob.model, ob.serial_number, ob.cost "
                . "FROM b7_18317604_objects AS ob, b7_18317604_object_type AS t, b7_18317604_brand AS b "
                . "WHERE ob.id_type = t.id AND ob.id_brand = b.id";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function insertObject($id_type, $id_brand, $model, $serial_number, $cost)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO b7_18317604_objects (id_type, id_brand, model, serial_number, cost) "
                . "values('$id_type', '$id_brand', '$model', '$serial_number', '$cost')";
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }
    
    static public function updateObject($id, $id_type, $id_brand, $model, $serial_number, $cost)
    {
        
    }
    
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_objects WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
