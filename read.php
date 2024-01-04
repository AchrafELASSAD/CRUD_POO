<?php
include('city.php');
//include connection file
include('connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('crudPoo6'); 

 //include the client file
 include('client.php');

 
  //call the static selectAllClients method and store the result of the method in $clients
  $clients = Client::selectAllClients('Clients',$connection->conn);

  if(isset($_POST['submit'])){
    $clients = Client::selectClientByCityId('Clients',$connection->conn,$_POST['cities']);

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div class="container my-5">
    <h2>List of users from database</h2>
    <a  class="btn btn-primary" href="create.php" role="button">Signup</a>

    <br>
    <br>
    <form method="post">

    <div class="input-group">
  <span class="input-group-btn">
   
    <button class="btn btn-success" type="submit" name="submit">Search</button>
   
  </span>
  <select name='cities' class="form-select">
                <option selected>Select a city</option>
                <?php
                        
                        $cities=City::selectAllcities('Cities',$connection->conn);
                        foreach($cities as $city){
                                echo "<option value='$city[id]' >$city[name]</option>";

                        }
                    ?>
  </select>
  </form>
    <table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>City Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php

       
       
       
     
        foreach($clients as $row) {
            
            $city = City::selectCityById('Cities',$connection->conn,$row['idCity']);
           echo " <tr>
            <td>$row[id]</td>
            <td>$row[firstname]</td>
            <td>$row[lastname]</td>
            <td>$row[email]</td>
            <td>$city[name]</td>
            <td>
            <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
            <a class ='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>delete</a>
            </td>
        </tr>";
        }
        
        ?>
        </tbody>
        
    </table>
    </div>
</body>
</html>
