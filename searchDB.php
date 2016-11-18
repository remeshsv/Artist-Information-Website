
<?php
	  
$searchterm=$_GET['term'];
$searchtype=$_GET['type'];
//echo $searchterm;

if ($searchterm==NULL)
{
 echo "<p style=\"color:red;\">Please Enter an input search term</p>";
 exit;
}  


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

if($searchtype==1){
 $sql = "SELECT Title, Description, ImageFileName, ArtWorkID FROM artworks where Title like '%$searchterm%'";
}else if($searchtype==2){
 $sql = "SELECT Title, Description, ImageFileName, ArtWorkID FROM artworks where Description like '%$searchterm%'";
 $words = $searchterm;
}else if($searchtype==3){
 $sql = "SELECT Title, Description, ImageFileName, ArtWorkID FROM artworks";
}

 $result = $conn->query($sql);

 $display_string="<h3>Results found </h3></br>";


 if ($result->num_rows > 0) {
    // output data of each row
     while($row = $result->fetch_assoc()) {

     	$display_string .= "<div class=\"row\"><div class=\"col-sm-1\"></div>"; 
     	$display_string .= "<div class=\"col-sm-2\">"; 
     	$display_string .= "<a href=\"Part03-ArtistDetails.php?id= $row[ArtWorkID]\">";
     	$display_string .= "<img src=\"/Project3/images/art/works/square-medium/$row[ImageFileName].jpg\"></img></a></div>"; 
     	$display_string .= "<div class=\"col-sm-7\">"; 
     	$display_string .= "<a href=\"Part03-ArtistDetails.php?id= $row[ArtWorkID]\"><h4>$row[Title]</h4></a></br>";
     	if($row["Description"]!=NULL){
     		if($searchtype==2){
     			$string = preg_replace("/($words)/i","<i style=\"background-color:yellow;\">$1</i>",$row["Description"]);
     			$display_string .= "<p>$string</p></div>";
     		}else
     		$display_string .= "<p>$row[Description]</p></div>";
     	}
     	else{

     		$display_string .= "<p>No description available</p></div>";
     	}
      	
      	$display_string .="</div></br>";

     	}
     }else{
     	$display_string = "No Titles found";
     }

    	echo $display_string;
	?>

