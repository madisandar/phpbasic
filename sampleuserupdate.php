<?php

ini_set('display_errors',1);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sampledbone";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if($conn->connect_error){
   die("Failed to connect ".$conn->connect_error);
}

// echo "Connected Successfully ";
$sql = "SELECT id,name,email FROM users";
$result = $conn->query($sql);

// echo "$result->num_rows";

if(isset($_POST['submit'])){
   $stmt = $conn->prepare("UPDATE users SET name=? , email=? , password=? WHERE id=?");
   $stmt->bind_param("sssi",$name,$email,$password,$id);

   $id = $_POST['id'];
   $name = textfilter($_POST['name']);
   $email = textfilter($_POST['email']);
   $password = MD5(textfilter($_POST['password']));
   
   $stmt->execute();

   echo "User Update Successfully <br/>";
    
   $stmt->close();
   $conn->close();

}

function textfilter($data){
   $data = trim($data);
   $data = htmlspecialchars($data);
   $data = stripslashes($data);
   return $data;
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
        <h3 class='text-center my-3'>Register Form</h3>
        <form action="" method="POST" >

            <div class="form-group mb-3">
               <label for="id">ID</label>
               <select name="id"  class="form-control">
                    <?php
                      
                      if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                           $id = $row['id'];
                           echo "<option value='$id'>$id</option>";
                         }
                      }else{
                        echo "<option value=''>No data</option>";
                      }

                    ?>
               </select>
            </div>

            <div class="form-group mb-3">
               <label for="fullname">Full Name</label>
               <input type="text" name="name" id="fullname" class="form-control" />
            </div>

            <div class="form-group mb-3">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" />
            </div>

             <div class="form-group mb-3">
               <label for="password">Password</label>
               <input type="password" name="password" id="password" class="form-control" />
            </div>

            <input type="submit" name="submit" id="submit" class="btn btn-primary float-end" value="Update" />

        </form>

     </div>
  </div>

</body>
</html>