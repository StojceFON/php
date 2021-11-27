<?php

class Type_Of_Users
{
    public $id = 0;
    public $name = '';
    public $description = '';

    public static function returnAll($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM type_of_users");
        $tipovi = array();
        while($row = $result->fetch_assoc()) {
            $tip = new Type_Of_Users();
            $tip->id = $row['id_type'];
            $tip->name = $row['Name'];
            $tip->description= $row['Description'];
            array_push($tipovi, $tip);
        }
        return $tipovi;

    }



}