<?php

if(isset($_POST['submit'])){
    $result = $_FILES['profile'];
    echo "<pre>".print_r($result,true)."</pre>";
     
    // echo $_FILES['profile']['name']."<br/>";
    // echo $_FILES['profile']['type']."<br/>";
    // echo $_FILES['profile']['tmp_name']."<br/>";
    // echo $_FILES['profile']['error']."<br/>";
    // echo $_FILES['profile']['size']."<br/>";
 
   $fileext = explode('.',$_FILES['profile']['name']);
   echo "<pre>".print_r($fileext,true)."</pre>";

   $filename = current(explode('.',$_FILES['profile']['name']));
  //   echo $filename."<br/>";

   $filetype = end(explode('.',$_FILES['profile']['name']));
 //  echo $filetype."<br/>";

}

// Method1
// $uploaddir = "assets/";
// $uploadfile = $uploaddir.basename($_FILES['profile']['name']);
// echo $uploadfile;

// if(isset($_POST['submit'])){
//     if(move_uploaded_file($_FILES['profile']['tmp_name'],$uploadfile)){
//         echo "File Successfully Uploaded";
//     }else{
//         echo "File Error";
//     }
// }

// $uploaddir = "C:/xampp/htdocs/phpbatch3/part1/assets/";
// $uploadfile = $uploaddir.basename($_FILES['profile']['name']);
// $uploadsize = $_FILES['profile']['size'];

// if(isset($_POST['submit'])){
//    if($uplodsize > 300000){
//     echo "Your file is too large";
//    }else{
//      if(file_exists($uploadfile)){
//         echo "Your file already exists";
//      }else{
//         if(move_uploaded_file($_FILES['profile']['tmp_name'],$uploadfile)){
//             echo "Your file successfully uploaded";
//         }else{
//             echo "File Not Found";
//         }
//      }
//    }
// }

// $uploaddir = "C:/xampp/htdocs/phpbatch3/part1/assets/";
// $uploadfile = $uploaddir.basename($_FILES['profile']['name']);
// $uploadsize = $_FILES['profile']['size'];
// $uploadtype = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));


// if(isset($_POST['submit'])){
//     if($uploadtype !== 'jpg' && $uploadtype !== 'jpeg' && $uploadtype !== 'png' && $uploadtype !== 'gif'){
//         echo "We do not allowed this file types";
//     }else{
//         if($uploadsize > 20000){
//             echo "Your file is too large";
//         }else{
//             if(file_exists($uploadfile)){
//                 echo "Your file already exists";
//             }else{
//                 move_uploaded_file($_FILES['profile']['tmp_name'],$uploadfile);
//             }
//         }
//     }
// }

// $uploaddir = "C:/xampp/htdocs/phpbatch3/part1/assets/";
// $uploadfile = $uploaddir.basename($_FILES['profile']['name']);
// $uploadsize = $_FILES['profile']['size'];
// $uploadtype = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
// $uploadready = true;

// if(isset($_POST['submit'])){

//     if(file_exists($uploadfile)){
//         echo "Your file already exists";
//         $uploadready = false;
//     }

//     if($uploadsize > 30000){
//         echo "Your file is too large";
//         $uploadready = false;
//     }

//     if($uploadtype !== 'png'){
//         echo "Sorry,we only allow jpg format"; 
//         $uploadready = false;
//     }

//     if($uploadready){
//         if(move_uploaded_file($_FILES['profile']['tmp_name'],$uploadfile)){
//             echo "Your file successfully uploaded";
//         }else{
//             echo "Uploading failed";
//         }
//     }else{
//         echo "Sorry,your file was not uploaded";
//     }


// }

if(isset($_POST['submit']) && !empty($_FILES['profile']['name'])){

    $filename = $_FILES['profile']['name'];
    $filesize = $_FILES['profile']['size'];
    $filetmp = $_FILES['profile']['tmp_name'];

    $uploaddir = "C:/xampp/htdocs/phpbatch3/part1/assets/";
    $uploadfile = $uploaddir.basename($filename);
    $uploadtype = strtolower(end(explode('.',$uploadfile)));

    $allowextensions = ['jpg','jpeg','png','gif'];

    if(isset($_FILES['profile'])){
        $errors = [];

        if(in_array($uploadtype,$allowextensions) === false){
            $errors[] = "Sorry,we just allowed JPG,JPEG,PNG & GIF files type.";
        }

        if($filesize > 30000){
            $errors[] = "Your file is too large";
        }

        if(empty($errors) === true){
            move_uploaded_file($filetmp,$uploadfile);
            echo "File Uploaded Successfully <br/>";
        }else{
            echo "<pre>".print_r($erros,true)."</pre>";
        }
    }

}


?>

<!DOCTYPE <html>
<html>
    <head>
        <title>Uploading File</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="col-md-6 mx-auto mt-5">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
             <div class="form-group mb-3">
                <label for="profile">Profile Picture</label>
                <input type="file" name="profile" id="profile" class="form-control"  />
             </div>
             <input type="submit" name="submit" class="btn btn-primary float-end" value="Upload"  />
         </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

