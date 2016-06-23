<?php
include_once 'config.php';

class Role 
{
    static public function getAll()
    {
        $query = "SELECT r.id, r.title FROM b7_18317604_person_role r ORDER BY id";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    static public function insertRole($title)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO b7_18317604_person_role (title) values('$title')";
        mysqli_query($link, "SET NAMES 'utf8'");
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);        
    }
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_person_role WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
