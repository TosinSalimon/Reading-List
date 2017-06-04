<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID = mysqli_real_escape_string($conn, $_REQUEST['ID']);

// sql to delete a record
$sql = "DELETE FROM ReadingList WHERE ID = '$ID'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: index.php");
?>
 