<?php

  $filenames = $_FILES['profile']['name'];
  $filetmps = $_FILES['profile']['tmp_name'];
  $fileerrs = $_FILES['profile']['error'];

//   echo "<pre>".print_r($fileerrs,true)."</pre>";
  
  $uploaddir = "assets/";
  
  if(isset($_POST['submit'])){

     foreach($fileerrs as $idx=>$fileerr){
        // echo $fileerr."<br/>";
        //   echo $key."<br/>";

        //  UPLOAD_ERR_OK
        // there is no error,the file uploaded with success

        if($fileerr === UPLOAD_ERR_OK){
            $getfilename = $filenames[$idx];
            $uploadfile = basename($getfilename);
            $getfiletmp = $filetmps[$idx];

            if(move_uploaded_file($getfiletmp,$uploadfile)){
                echo "Files Successfully Uploaded";
            }else{
                echo "Upload Failed";
            }
        }
     }
  }

?>


<!DOCTYPE <html>
<html>
    <head>
        <title>Multi Uploading File</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- <div class="col-md-6 mx-auto mt-5">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
             <div class="form-group mb-3">
                <label for="profile">Profile Picture</label>
                <input type="file" name="profile[]" id="profile" class="form-control"  /><br/>
                <input type="file" name="profile[]" id="profile" class="form-control"  /><br/>
                <input type="file" name="profile[]" id="profile" class="form-control"  /><br/>
             </div>
             <input type="submit" name="submit" class="btn btn-primary float-end" value="Upload"  />
         </form>
    </div> -->

    <div class="col-md-6 mx-auto mt-5">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
             <div class="form-group mb-3">
                <label for="profile">Profile Picture</label>
                <input type="file" name="profile[]" id="profile" class="form-control" multiple /><br/>
             </div>
             <input type="submit" name="submit" class="btn btn-primary float-end" value="Upload"  />
         </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


