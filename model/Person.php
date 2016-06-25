<?php
include_once 'config.php';

class Person {
    static public function getAll()
    {
        $query = "SELECT p.id, p.firstname, p.middlename, p.lastname, r.title, p.phone, p.address, p.card FROM b7_18317604_persons AS p, b7_18317604_person_role AS r WHERE p.id_role = r.id ORDER BY p.id";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function getManagers()
    {
        $query = "SELECT p.id, p.firstname, p.middlename, p.lastname, r.title, p.phone, p.address, p.card "
               . "FROM b7_18317604_persons AS p, b7_18317604_person_role AS r WHERE p.id_role = r.id AND r.title = 'Менеджер' ORDER BY p.id";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function getClients()
    {
        $query = "SELECT p.id, p.firstname, p.middlename, p.lastname, r.title, p.phone, p.address, p.card "
               . "FROM b7_18317604_persons AS p, b7_18317604_person_role AS r WHERE p.id_role = r.id AND r.id = 'Клиент' ORDER BY p.id";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);                
        $db->query("SET NAMES 'utf8'");
        $result = $db->query($query) or die($db->error);
        $db->close();
        return $result->fetch_all();
    }
    
    static public function insertPerson($firstname, $middlename, $lastname, $id_role, $phone, $address, $card)
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO b7_18317604_persons (firstname, middlename, lastname, id_role, phone, address, card) "
                . "values('$firstname', '$middlename', '$lastname', '$id_role', '$phone', '$address', '$card')";
        mysqli_query($link, "SET NAMES 'utf8'");
        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }
    
    static public function updatePerson($id, $firstname, $middlename, $lastname, $id_role, $phone, $address, $card)
    {
        
    }
    
    static public function removeById($id)
    {
        $query = "DELETE FROM b7_18317604_persons WHERE id = $id ";
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $result = $db->query($query) or die($db->error);
        $db->close();
    }
}
