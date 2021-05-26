<!DOCTYPE html>
<html>
<head>
    <title>Book Upload</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
        .container{
            margin: 40px auto;
            width: 400px;
        }
        .content {
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 5px #d9534f;
        }
    </style>
</head>
<body class="container-fluid">
<nav>
    <div class="nav-wrapper">
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="home.php">Home</a></li>
      
      
        <li><a href="logout.php">LogOut</a></li>
        
      </ul>
    </div>
  </nav>
<div class="container">
    <h1>Upload Book</h1>
    <div class="content">
        <div class="tabcontent" id="signin">
            <form method="post" action="upload.php" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title">
            <label>Description</label>
            <input type="text" name="description">
            <label>Book Image</label>
            <input type="File" name="file">
            <label>Book Upload</label>
            <input type="File" name="file2">
            <input type="submit" name="submit" value="submit" style="background-color: #d9534f; border-radius: 8px;">
            </form>
        </div>
    </div>
</div>
<br><br>
<br><br><br>
<div><?php include 'includes/foot.php'; ?></div>
</body>
</html>
 
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "socialnetwork";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
    #retrieve file title
    $title = $_POST["title"];
    $description = $_POST["description"];
     
    #file name with a random number so that similar dont get replaced
    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    $iname = rand(1000,10000)."-".$_FILES["file2"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
    $tiname = $_FILES["file2"]["tmp_name"];
   
    #upload directory path
    $uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    move_uploaded_file($tiname, $uploads_dir.'/'.$iname);
 
    #sql query to insert into database
    $sql = "INSERT into upload(title,image,description,book) VALUES('$title','$pname','$description','$iname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 