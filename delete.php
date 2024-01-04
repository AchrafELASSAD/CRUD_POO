<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

include('connection.php');

$connection = new Connection();
$connection->selectDatabase('crudPoo6');

include('client.php');

Client::deleteClient('Clients',$connection->conn,$id);




}
?>
