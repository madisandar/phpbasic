<?php

ini_set('display_errors',1);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sampledbone";

try{
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("SELECT id,name,email FROM users");
  $stmt->execute();


}catch(PDOException $e){
   echo $e->getMessage()."<br/>";
}


if(isset($_POST['delete'])){
  $stmt = $conn->prepare("DELETE FROM users WHERE id= :id");
  $stmt->bindParam(":id",$id);
  
  $id = $_POST['delete'];

  $stmt->execute();

  echo $stmt->rowCount()." User Delete Successfully ";

   $conn = null;

    echo "<script type='text/javascript'>
            // window.location.href = window.location.href;

           // window.location.replace(window.location.href);

          // window.location.apply(window.location.href);
        </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container">

     <div class="col-md-6 mx-auto">
        <h3 class='text-center my-3'>User Dlete Form</h3>
        
        <table class="table table-striped table-hover">
           <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
           </thead>
           <tbody>
              <?php
                
                while($row = $stmt->fetch()){
                   $id = $row['id'];
                   $name = $row['name'];
                   $email = $row['email']; 

                   echo "<tr>";
                   echo "<td>$id</td>";
                   echo "<td>$name</td>";
                   echo "<td>$email</td>";
                   echo "<td><form action='' method='POST'><button type='submit' name='delete' id='delete' class='btn btn-danger' value='$id'>Delete</button></form></td>";
                   echo "</tr>";
                }
              ?>
           </tbody>
        </table>
     </div>
  </div>

</body>
</html>