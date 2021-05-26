<html>
<head>
	<title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<nav>
 <div class="nav-wrapper" class="" style="background-color: #d9534f;">

    <?php
        $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
    <ul  id="nav-mobile" class="right hide-on-med-and-down" style="font-family: Georgia;"> 
    <!-- Ensure there are no enter escape characters.-->

    <li><div class="globalsearch" style="background-color: #d9534f;">
        <form method="get" action="search.php" onsubmit="return validateField()"> 
        <!-- Ensure there are no enter escape characters.-->
            
           <li> <input type="text" placeholder="Search" style="text-align:center" name="query" id="query"></li>
           <li><select name="location" style="font-family: Georgia;">
                <option value="emails">Emails</option>
                <option value="names">Names</option>
                <option value="hometowns">Hometowns</option>
                <option value="posts">Posts</option>
            </select></li>
          <li>  <input type="submit" value="Search"  id="querybutton"></li>
        </form>
  
    </div></li>
        <li><a href="requests.php">Follow Requests(<?php echo $row['count'] ?>)</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="friends.php">Follow</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="upload.php">Upload Book</a></li>
        <li><a href="logout.php">Log Out</a></li>
  </ul>
  </nev>

  </dev>
<script>
function validateField(){
    var query = document.getElementById("query");
    var button = document.getElementById("querybutton");
    if(query.value == "") {
        query.placeholder = 'Type something!';
        return false;
    }
    return true;
}
</script>
</body>
</html>