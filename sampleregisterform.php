<?php

ini_set('display_errors',1);


// db_connect
$conn = mysqli_connect("localhost","root","","sampledbone");

if(mysqli_connect_error()){
   echo "Failed to connect ".mysqli_connect_error()."<br/>";
}

// echo "Connected Successfully <br/>";

if(isset($_POST['submit'])){
   $name = textfilter($_POST['fullname']);
   $email = textfilter($_POST['email']);
   $password = MD5(textfilter($_POST['password']));

   $stmt = "INSERT INTO users(name,email,password)
           VALUE(?,?,?)";
   $insertstmt = mysqli_prepare($conn,$stmt);
   mysqli_stmt_bind_param($insertstmt,'sss',$name,$email,$password);

   mysqli_stmt_execute($insertstmt);

   echo "New user created successfully <br/>";

   mysqli_close($conn);
}


function textfilter($data){
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}
?>

<!-- CREATE TABLE IF NOT EXISTS users(
 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(20),
 email VARCHAR(30),
 password VARCHAR(255)
); -->

<!DOCTYPE html>
<html>
<head>
  <title>Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container">

     <div class="col-md-6 mx-auto">
        <h3 class='text-center my-3'>Register Form</h3>
        <form action="" method="POST" >

            <div class="form-group mb-3">
               <label for="fullname">Full Name</label>
               <input type="text" name="fullname" id="fullname" class="form-control" />
            </div>

            <div class="form-group mb-3">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" />
            </div>

             <div class="form-group mb-3">
               <label for="password">Password</label>
               <input type="password" name="password" id="password" class="form-control" />
            </div>

            <input type="submit" name="submit" id="submit" class="btn btn-primary float-end" value="Submit" />

        </form>

     </div>
  </div>

</body>
</html>