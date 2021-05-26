<?php



?>
 <html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  
  <style>
    #h{
      background:gray;
      text-decoration-color: white;
      text-align: center;
    }
  </style>
  <title>Book Publishing</title>
</head>
<body class="container-fluid"> 
  <nav>
    <div class="nav-wrapper">
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="userhome.php">Home</a></li>
        <li><a href="userprofile.php">Profile</a></li>
        <li><a href="userfriends.php">Follow</a></li>
        <li><a href="usershowdata.php">Available Books</a></li>
        <li><a href="userlogout.php">Log Out</a></li>
        
      </ul>
    </div>
  </nav>
  <br>
<div class="container">
  <div class="col-lg-12 m-auto"><h2 id="h">Available Books</h2>
  <table class="table table-stripped">
    <tr>
      <td>S No.</td>
      <td>Image</td>
      <td>Title</td>
      <td>Description</td>
      <td>Book</td>
    </tr>
    <?php
       $localhost = "localhost"; #localhost
       $dbusername = "root"; #username of phpmyadmin
       $dbpassword = "";  #password of phpmyadmin
       $dbname = "socialnetwork";  #database name
        
       #connection string
       $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

       $q= "select * from upload";
       $res=mysqli_query($conn,$q);
       while ($row= mysqli_fetch_array($res))
       {
    ?><tr>
      <td><?php echo $row['id']; ?></td>
      <td><img style="height: 100px;width: 100px;" src="images/<?php echo $row["image"] ?>"></td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><a href="images/<?php echo $row["book"] ?>"><?php echo $row["book"]; ?></a></td>
    </tr>
  <?php } ?>
  </table>    
  </div>
  </div><br><br>
  <nav>
    <div class="nav-wrapper">
      
    <div class="footer-copyright">
            <div class="container" >
          <center>  ©Copyright Self Publication 2020-21</center>
            
            </div>
          </div>
        
     
    </div>
  </nav>
</body>
</html>