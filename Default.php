<!-- 
    Student Name: Sreemoolam Venkitachalam, Remesh
    Project 3: Artist Portal

    Database Information
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
-->


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
  	<!--<div class="container-fluid">
  	<div class="row">
      <div class="col-sm-1" style="background-color:black; color:white;">Assign 1</div>
      <div class="col-sm-1" style="background-color:gray;">Home</div>
      <div class="col-sm-1">About us</div>
      <div class="col-sm-1">Pages</div>
      <div class="col-sm-8">.</div>
    </div>
</div>-->

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
          <button type="submit" name="submit" class="btn btn-primary btn-sm" style="display: inline-block;">Search</button>
        </p></form>
    
    </div>
</div>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10 jumbotron">
  <h1>Welcome to Assignment #1</h1>
  <p>This is the first assignment for <strong>Remesh Sreemoolam Venkitachalam</strong> in CSE 5334</p>
  </div>
  <div class="col-sm-1"></div>
 </div> 
    
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-2">
    <p><h4><span class="glyphicon glyphicon-info-sign"></span> About Us</h4></p>
    <p>What it is all About and other stuff</p>
    <a href="AboutUs.php"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</button></a>
  </div>
  <div class="col-sm-2">
    <h4><span class="glyphicon glyphicon-list"></span> Artist List</h4>
    <p>Display a list of Artist names as links</p>
    <a href="Part01_ArtistsDataList.php"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</button></a>
  </div>
  <div class="col-sm-2">
    <h4><span class="glyphicon glyphicon-user"></span> Single Artist</h4>
    <p>Displays information for a Single Artist</p>
    <a href="Part02-ArtistDetails.php?id=19"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</button></a>
  </div>
  <div class="col-sm-2">
    <h4><span class="glyphicon glyphicon-picture"></span> Single Work</h4>
    <p>Displays information for a Single Work</p>
    <a href="Part03-ArtistDetails.php?id=394"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</button></a>
  </div>
  <div class="col-sm-2">
    <h4><span class="glyphicon glyphicon-search"></span> Search</h4>
    <p>Perform search on ArtWorks table</p>
    <a href="Part04_Search.php"><button type="button" name="question" value="NULL" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</button></a>
  </div>
</div>

   </body>
</html>