<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../favicon.ico" />
<title>Add Category - Administration</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
session_start();
if($_SESSION['username']){


error_reporting(E_ALL);
ini_set('display_errors', True);

include '../database.php';

if(isset($_POST['title'])) {
	
	// Create connection
	$conn = new mysqli($host,$user,$pass,$database);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$title = mysqli_real_escape_string($conn,$_POST['title']);

	$sql = "CREATE TABLE `$title` ( id INT NOT NULL AUTO_INCREMENT, title VARCHAR(255), price DECIMAL(7,2), content TEXT, `picture` VARCHAR(100) NOT NULL, availability TINYINT NOT NULL DEFAULT '1', PRIMARY KEY (id) )";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	    header('Location:index.php');
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();

}
else{
	$title = "";
	$content = "";
}

?>

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
	editor_encoding : "numeric"
});
</script>

<div class="topbar">
	<a class="right" href="index.php?logout=1">Logout</a>
	<a href="index.php">Admin Panel</a> | <a href="active.php">Active Orders</a> | <a href="done.php">Fulfiled Orders</a>
</div>

<h1>Add new section</h1>
	<form name="login" action="addsection.php" method="post">
		Title: <input name="title" value="<?php echo $title ?>" /><br>
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
