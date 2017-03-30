<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../favicon.ico" />
<title>Active Orders - Administration</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
session_start();
if($_SESSION['username']){
?>
<div class="topbar">
	<a class="right" href="index.php?logout=1">Logout</a>
	<a href="index.php">Admin Panel</a> | <a href="active.php">Active Orders</a> | <a href="done.php">Fulfiled Orders</a>
</div>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', True);

	include '../database.php';

	global $db;
	try{
		$db = new PDO('mysql:host=localhost;dbname='.$database2.';charset=utf8', $user, $pass);//use charset=utf8 here
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch ( PDOException $e ) {
		echo "Database error ".$e->getMessage();
	}

	if(isset($_GET['f'])){
		$id = $_GET['f'];
		$query = "SELECT * FROM `active` where `id`='$id'";
		$stmt = $db->prepare($query);
		$rc = $stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$data = $row['data'];
		$bill = $row['bill'];

		// Create connection
		$conn = new mysqli($host,$user,$pass,$database2);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO `done` (`id`, `data`, `bill`) VALUES ('$id', '$data', '$bill');";

		if ($conn->query($sql) === TRUE) {
			echo "Added successfully";
			$sql = "DELETE FROM `active` WHERE id='$id';";

			if ($conn->query($sql) === TRUE) {
			    echo "Deleted successfully";
			    header('Location:active.php');
			} else {
			    echo "Error updating record: " . $conn->error;
			}

		} else {
		    echo "Error updating record: " . $conn->error;
		}

	}
	else{
		$query = "SELECT * FROM `active`";
		$stmt = $db->prepare($query);
		$rc = $stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo "<a href='active.php?f=".$row['id']."'>Order Fulfiled</a><br><br>";
			echo $row['data']."<b>Grand Total: ".$row['bill']."</b><br><br><hr><br><br><br>";
		}
	}
}
else{
	header('Location:index.php');
}
?>
</body>
</html>
