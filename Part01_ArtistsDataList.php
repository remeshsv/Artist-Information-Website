<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  
<div class="container-fluid">
    <div class="row col-sm-4" style="background-color:black;">
    <ul class="nav nav-tabs list-inline">
    <li style="color:white; align:center;">Assign 1</li>
    <li><a href="Default.php">Home</a></li>
    <li><a href="AboutUs.php">About Us</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="Part01_ArtistsDataList.php">Artist Data List</a></li>
      <li><a href="Part02-ArtistDetails.php">Single Artist</a></li>
      <li><a href="Part03-ArtistDetails.php">Single Work</a></li> 
      <li><a href="Part04_Search.php">Search</a></li>
    </ul></li>
    </div>
    <div class="col-sm-8 search" style="background-color:black;">

          <form action="Part04_Search.php" method="POST">
            <p class="text-right" style="color:white;">Remesh Sreemoolam Venkitachalam
            <input type="text" name="question" class="form-control input-sm" placeholder="Search" style="width:120px; display: inline-block;"/>
          <button type="submit" class="btn btn-primary btn-sm" style="display: inline-block;">Search</button>
        </p></form>
    
    </div>
</div>

<div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8"><h1>Artist Datalist (Part 1)</h1></div>
      <div class="col-sm-2"></div>
</div>      

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully </br>";

?>
<div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">

<?php
$sql = "SELECT FirstName, LastName, ArtistID, YearOfBirth, YearOfDeath FROM artists ORDER BY LastName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href=\"Part02-ArtistDetails.php?id=" . $row["ArtistID"] . "\">" . $row["FirstName"]. " " . $row["LastName"]. " (". $row["YearOfBirth"] .
         "-" . $row["YearOfDeath"] . ")</a><br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
      </div>
      <div class="col-sm-2"></div>
</div>
    
   </body>
</html>