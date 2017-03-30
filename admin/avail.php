<?php
session_start();
if($_SESSION['username']){


$cat = $_GET['cat'];
$id = $_GET['id'];

error_reporting(E_ALL);
ini_set('display_errors', True);

include '../database.php';
	
	// Create connection
	$conn = new mysqli($host,$user,$pass,$database);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$price = mysqli_real_escape_string($conn,$_POST['price']);



	$sql = "UPDATE `$cat` SET availability='1' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
	    echo "Marked available";
		header('Location:index.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();


}
else{
header('Location:index.php');
}
?>
