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

if(isset($_POST['cat'])) {
	
	// Create connection
	$conn = new mysqli($host,$user,$pass,$database);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$cat = $_POST['cat'];

	$sql = "DROP TABLE `$cat`;";

	if ($conn->query($sql) === TRUE) {
	    echo "Table deleted successfully";
	    header('Location:index.php');
	} else {
	    echo "Error deleting: " . $conn->error;
	}

	$conn->close();

}
else{
	$title = "";
	$content = "";
}

?>

<h1>Delete category</h1>
	<form name="login" action="deletesection.php?cat=<?php echo $cat;?>" method="post">

		Category: 
		<select name="cat">
<?php
$con=mysqli_connect($host,$user,$pass,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SHOW TABLES FROM `$database`";
$result=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($result,MYSQLI_NUM)) {
	$cat = $row[0];
?>
			<option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>

<?php
}

mysqli_free_result($result);
mysqli_close($con);
?>
		</select><br>


		<input type="submit" name="submit" value="Submit" />
	</form>
<?php
}
else{
header('Location:index.php');
}
?>
</body>
</html>
