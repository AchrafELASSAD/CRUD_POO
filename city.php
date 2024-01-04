<?php

class City{

    public $id;
    public $name;


    public static function selectAllcities($tableName,$conn){
        $sql = "SELECT id, name  FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }
    }

    public static function selectCityById($tableName,$conn,$id){
        $sql = "SELECT name FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
    }
}



?>