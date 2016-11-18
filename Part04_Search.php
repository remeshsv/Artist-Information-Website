<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script language="javascript" type="text/javascript">

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

//Browser Support Code
function ajaxFunction(){
   var ajaxRequest;  // The variable that makes Ajax possible!
   try{
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById("ajaxresult");
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }

   if (document.getElementById('title').checked) {
        var term = document.getElementById('title-name').value;
        var type = 1;
    } 
    else if(document.getElementById('desc').checked) {
        var term = document.getElementById('desc-name').value;
        var type = 2;
   }
    else if(document.getElementById('none').checked) {
        var term = "all";
        var type = 3;
   }
   
   //alert(term);
   var queryString = "?term=" + term + "&type=" + type;

   ajaxRequest.open("GET", "searchDB.php" + queryString, true);
   ajaxRequest.send(null); 
}

</script>

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
            <p id="name-bar" class="text-right" style="color:white;">Remesh Sreemoolam Venkitachalam
            <input type="text" name="question" class="form-control input-sm" placeholder="Search" style="width:140px; display: inline-block;"/>
          <button type="submit" class="btn btn-primary btn-sm" style="display: inline-block;">Search</button>
        </p></form>
    
    </div>
</div>

<div class="container">
  <h2>Search Results</h2>
  <div class="panel panel-default" style="background-color:#E9F7FC ">
    <div class="panel-body">
      <form name="searchform">
        <input type="radio" name="search" id="title" onclick="javascript:seeCheck();" checked/><label>Filter by Title</label></br>
<?php
    if(isset($_POST["question"]))
    {
?>   
        <input type="text" name="name" id="title-name" style="display:block; width:100%;" value="<?php echo $_POST["question"]; ?>"/></br>

<?php  echo "<script> ajaxFunction(); </script>"; 
}else{
  ?>
        <input type="text" name="name" id="title-name" style="display:block; width:100%;"/></br>
        <?php
           }       
?> 
         <input type="radio" name="search" id="desc" onclick="javascript:seeCheck();"/><label>Filter by Description</label></br>
         <input type="text" name="name" id="desc-name" style="display:block; width:100%;"/></br>
        <input type="radio" name="search" id="none" onclick="javascript:seeCheck();"/><label>No Filter(Displays All)</label></br></br>
        <input type="button" class="btn btn-primary btn-md" onclick="ajaxFunction();" value="Filter"/>
      </form>
    </div>
  </div>
  </div>

  <div class="container" id="ajaxresult"></div>

   </body>
</html>