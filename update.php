<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$usernam = $_POST['name'];
$sql = "UPDATE user_info SET Attendance=1 WHERE Username = '$usernam'";

if ($conn->query($sql) === TRUE) {
    echo "Loading....";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<script>

    // Your application has indicated there's an error
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "docs/QR.html";

    }, 100000);


</script>