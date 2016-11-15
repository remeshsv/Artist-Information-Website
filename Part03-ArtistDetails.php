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

<?php

$id = $_GET["id"];

if ($id==NULL)
{
 header("Location:Error.php");
}


echo $id;

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

/*$sql = "SELECT artworks.Description, artworks.Title as Title, artworks.ImageFileName, artworks.Excerpt, artworks.ArtWorkType, 
        artworks.YearOfWork, artworks.OriginalHome, artists.FirstName, artists.LastName from artworks, artists 
        WHERE artworks.ArtWorkID=$id and artists.ArtistID = (Select ArtistID from artworks where ArtWorkID=$id)";
//$sql = "SELECT Title, ArtistID, Description, ImageFileName, Excerpt, ArtWorkType, YearOfWork, OriginalHome FROM artworks where ArtWorkID=$id";*/

$sql = "SELECT artworks.ArtistID as ArtistID, artworks.Description, artworks.Title as Title, artworks.ImageFileName, artworks.Excerpt, artworks.ArtWorkType, 
        artworks.YearOfWork as YoW, artworks.OriginalHome, artworks.MSRP, artworks.Medium, artworks.Width, artworks.Height,
        artists.FirstName as FName, artists.LastName as LName from artists INNER JOIN artworks
ON artists.ArtistID=(Select ArtistID from artworks where ArtWorkID=$id) and artworks.ArtWorkID=$id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
     
     </br>
  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">  <h3>
  <?php
        echo $row["Title"];
        ?></h3>
        <h5>By <a href="Part02-ArtistDetails.php?id=<?php echo $row["ArtistID"]; ?>">
          <?php
        echo $row["FName"] . " " . $row["LName"];
        ?></a></h5>
      
    </div>
  </div>

  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-2">
      <img src="/Project3/images/art/works/square-medium/<?php echo $row["ImageFileName"]; ?>.jpg" style="width:204px;height:210px; border:#F6F5F5 solid 5px; 
      border-radius: 2px; padding: 2px;" data-toggle="modal" data-target="#myModal"></img>

      <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php
        echo $row["Title"]. "(" . $row["YoW"] . ") by " . $row["FName"] . " " . $row["LName"];
        ?></h4>
      </div>
      <div class="modal-body">
        <p><img class="center-block" src="/Project3/images/art/works/medium/<?php echo $row["ImageFileName"]; ?>.jpg"></img></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  </div>
  <div class="col-sm-4">
    <p style="font-size:12px;">
      <?php 
      if($row["Description"]==NULL){
        echo "No Description Available";
      }
      else
      { echo $row["Description"];
      }
     ?></br><h5 style="color:red;"><strong>
     <?php 
     $fprice=(string)$row["MSRP"];
     $price= explode(".",$fprice);
     echo "$" . $price[0] . ".00"; 
     ?></strong></h5>
   </p>
   </br>
   <div class="btn-group">
  <button type="button" style="color:blue;" class="btn btn-default"><span class="glyphicon glyphicon-gift"></span>Add To WishList</button>
  <button type="button" style="color:blue;" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Shopping Cart</button>
  </div>
     </br></br>
     <table class="table table-condensed" style="width:400px; border:solid 1px;">
      <thead style="background-color: #EEEDED;"><tr><th colspan="3">Product Details</th></tr></thead>
      <tr>
        <td><strong> Date: </strong></td>
        <td colspan="2">
          <?php 
          echo " " .$row["YoW"];
          ?></td>
      </tr>
      <tr>
        <td><strong> Medium: </strong></td>
        <td colspan="2">
          <?php 
          echo " " . $row["Medium"];
          ?></td>
      </tr>
      <tr>
        <td><strong> Dimensions: <strong></td>
        <td colspan="2">
          <?php 
          echo " " . $row["Width"] . "cm x " . $row["Height"]. "cm";
          ?></td>
      </tr>
      <tr>
        <td><strong> Home: </strong></td>
        <td colspan="2">
          <?php 
          echo " " .$row["OriginalHome"];
          ?></td>
      </tr>
      <tr>
        <td><strong> Genre: </strong></td>
        <td colspan="2">
          <?php 
          $sqlgenre = "SELECT GenreName from genres where GenreID in (SELECT GenreID from artworkgenres where ArtWorkID=$id)";
          $resultgenre = $conn->query($sqlgenre);


          if ($resultgenre->num_rows > 0) {
          // output data of each row
          while($row1 = $resultgenre->fetch_assoc()) {
          echo "<a href=\"#\"> " . $row1["GenreName"] . "</a></br>";
        }
      }else{
        echo "Genre not available";
      }
          ?></td>
      </tr>
      <tr>
        <td><strong> Subjects: <strong></td>
        <td colspan="2">
          <?php 
          $sqlsub = "SELECT SubjectName from subjects where SubjectId in (SELECT SubjectID from artworksubjects where ArtWorkID=$id)";
          $resultsub = $conn->query($sqlsub);


          if ($resultsub->num_rows > 0) {
          // output data of each row
          while($row2 = $resultsub->fetch_assoc()) {
          echo "<a href=\"#\"> " . $row2["SubjectName"] . "</a></br>";
        }
      }else{
        echo "Subject not available";
      }
          ?></td>
      </tr>
     </table>
   </div>
   <div class="col-sm-4">
    <table class="table table-condensed" style="width:120px; border:solid 1px;">
      <thead style="background-color: #D5F2FB;"><tr><th>Sales</th></tr></thead>
      <tr>
        <td><?php 
          $sqldate = "SELECT DateCompleted from orders WHERE OrderID IN (SELECT OrderID from orderdetails WHERE ArtWorkID=$id)";
          $resultdate = $conn->query($sqldate);


          if ($resultdate->num_rows > 0) {
          // output data of each row
          while($row3 = $resultdate->fetch_assoc()) {
            $fdate=(string)$row3["DateCompleted"];
            $date=substr($fdate,0,10);
          echo "<a href=\"#\"> " . $date . "</a></br>";
        }
      }else{
        echo "Subject not available";
      }
          ?></td>
      </tr>
   </div>
 </div>


      <?php
      }
} else {
    echo "0 results";
}
?>
    
   </body>
</html>