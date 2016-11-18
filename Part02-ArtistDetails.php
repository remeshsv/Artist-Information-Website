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
    <li style="color:white; align:center;"><h4>Assign 1</h4></li>
    <li><a href="Default.php">Home</a></li>
    <li><a href="AboutUs.php">About Us</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="Part01_ArtistsDataList.php">Artist Data List</a></li>
      <li><a href="Part02-ArtistDetails.php?id=19">Single Artist</a></li>
      <li><a href="Part03-ArtistDetails.php?id=394">Single Work</a></li>
      <li><a href="Part04_Search.php">Search</a></li>
    </ul></li>
    </div>
    <div class="col-sm-8 search" style="background-color:black;">

          <form action="Part04_Search.php" method="POST">
            <p class="text-right" style="color:white;">Remesh Sreemoolam Venkitachalam
            <input type="text" name="question" class="form-control input-sm" placeholder="Search" style="width:140px; display: inline-block;"/>
          <button type="submit" class="btn btn-primary btn-sm" style="display: inline-block;">Search</button>
        </p></form>
    
    </div>
</div>

<?php

$id = $_GET["id"];

if ($id==NULL)
{
 header("Location:Error.php");
}

//echo $id;

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
//echo "Connected successfully </br>";


$sql = "SELECT FirstName, LastName, ArtistID, YearOfBirth, YearOfDeath, Details, ArtistLink, Nationality FROM artists where ArtistID=$id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
    </br>
  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">  <h3><?php
        echo $row["FirstName"]. " " . $row["LastName"];
        ?></h3>
      
    </div>
  </div>

  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
      <img src="/Project3/images/art/artists/medium/<?php echo $id; ?>.jpg" style="width:204px;height:260px; border:#F6F5F5 solid 5px; 
      border-radius: 2px; padding: 2px;"></img>
  </div>
  <div class="col-sm-4">
    <p style="font-size:12px;">
      <?php 
     echo $row["Details"];
     ?></p>
   </br>
     <button type="button" style="color:blue;" class="btn btn-default"><span class="glyphicon glyphicon-heart"></span>Add To Favorites</button>
     </br></br>
     <table class="table table-condensed" style="width:250px; border:solid 1px;">
      <thead style="background-color: #EEEDED;"><tr><th colspan="3">Artist Details</th></tr></thead>
      <tr>
        <td><strong> Date: </strong></td>
        <td colspan="2">
          <?php 
          echo " " .$row["YearOfBirth"]. "-" . $row["YearOfDeath"];
          ?></td>
      </tr>
      <tr>
        <td><strong> Nationality: </strong></td>
        <td colspan="2">
          <?php 
          echo " " . $row["Nationality"];
          ?></td>
      </tr>
      <tr>
        <td><strong> More Info: <strong></td>
        <td colspan="2">
          <a href="<?php echo $row["ArtistLink"];?>">
          <?php 
          echo " " . $row["ArtistLink"];
          ?></a></td>
      </tr>
     </table>
   </div>
     <div class="col-sm-4"></div>
 </div> 
  </br>
  </br>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <p><h4> Art By <?php echo $row["FirstName"]. " " . $row["LastName"]; ?></h4></p>
  </div>
  <div class="col-sm-2"></div>
</div>
<?php
        
    }
} else {
  
 header("Location:Error.php");
}

$counter= 1;
$sql1 = "SELECT ArtWorkID, YearOfWork, ImageFileName, Title FROM artworks where ArtistID=$id";
$result1 = $conn->query($sql1);
//$conn->close();
echo $result1->num_rows;
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {

      if(($counter%4)==1)
      {

?>

<div class="container">
  <div class="col-sm-2"></div>
  <?php }
  ?>

  <div class="col-sm-2" style="border: #CFC8C8 solid 2px; margin:2px; padding:2px;">
    <a href="Part03-ArtistDetails.php?id=<?php echo $row["ArtWorkID"]; ?>">
    <img src="/Project3/images/art/works/square-thumbs/<?php echo $row["ImageFileName"]; ?>.jpg" style="display: block; margin: auto;"></img>
    <p align="center" style="font-size:10px; "><?php echo $row["Title"]. ", " . $row["YearOfWork"]; ?></a></br></br>
    <a href="Part03-ArtistDetails.php?id=<?php echo $row["ArtWorkID"]; ?>">
      <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span>View</button></a>
  <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-gift"></span>Wish</button>
  <button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</button>
  </div>

  <?php if(($counter%4)==0)
        {
  ?>
  <div class="col-sm-2"></div>
</div>
    <?php
  }
  $counter = $counter+1;
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>
   </body>
</html>