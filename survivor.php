

<?php 
$conn = new mysqli("localhost","root",'',"hack");

// Start XML file, create parent node 

$dom = new DOMDocument("1.0"); 
$node = $dom->createElement("user_info"); 
$parnode = $dom->appendChild($node); 

// Select all the rows in the user_info table 

$query = "SELECT * FROM user_info"; 
$result = mysqli_query($conn,$query); 
if (!$result) { 
  die('Invalid query: ' . mysql_error()); 
} 

header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each 

while ($row = mysql_fetch_assoc($result)){ 
  // ADD TO XML DOCUMENT NODE 
  $node = $dom->createElement("marker"); 
  $newnode = $parnode->appendChild($node); 

  $newnode->setAttribute("lat", $row['latitude']); 
  $newnode->setAttribute("lng", $row['longitude']); 
} 

echo $dom->saveXML(); 

?> 