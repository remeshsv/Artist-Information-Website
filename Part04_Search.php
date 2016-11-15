<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script type="text/javascript">
    window.onload = function() {
    document.getElementById('desc-name').style.display = 'none';
    }

    function seeCheck() {
    if (document.getElementById('title').checked) {
        document.getElementById('title-name').style.display = 'block';
        document.getElementById('desc-name').style.display = 'none';
    } 
    else if(document.getElementById('desc').checked) {
        document.getElementById('desc-name').style.display = 'block';
        document.getElementById('title-name').style.display = 'none';
   }else if(document.getElementById('none').checked) {
        document.getElementById('desc-name').style.display = 'none';
        document.getElementById('title-name').style.display = 'none';
   }
}
    </script>
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
    
<!--($_POST["question"]==NULL)-->

<div class="container">
  <h2>Search Results</h2>
  <div class="panel panel-default" style="background-color:#E9F7FC ">
    <div class="panel-body">
      <form>
        <input type="radio" name="search" id="title" onclick="javascript:seeCheck();" checked/><label>Filter by Title</label></br>
        <input type="text" name="name" id="title-name" style="display:block; width:100%;"/></br>
         <input type="radio" name="search" id="desc" onclick="javascript:seeCheck();"/><label>Filter by Description</label></br>
         <input type="text" name="name" id="desc-name" style="display:block; width:100%;"/></br>
        <input type="radio" name="search" id="none" onclick="javascript:seeCheck();"/><label>No Filter(Displays All)</label></br></br>
        <button type="submit" class="btn btn-primary btn-md" data-toggle="collapse" data-target="#res">Filter</button>
      </form>
    </div>
  </div>
  <div id="res" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>

   </body>
</html>