<?php

include_once $_SERVER["SERVER_ROOT"].'/model/config.php';

class Work {
    static public function getAll()
    {
        $query = "SELECT w.id, w.title, w.description, w.cost FROM b7_18317604_works AS w";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    static public function insertWork($title, $description, $cost)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO b7_18317604_works (title, description, cost) values('$title','$description','$cost')";
        mysqli_query($link, "SET NAMES 'utf8'");
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);        
    }
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_works WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
