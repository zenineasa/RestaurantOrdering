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

$cat = $_GET['cat'];
$id = $_GET['id'];

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
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$price = mysqli_real_escape_string($conn,$_POST['price']);


	if(!isset($_FILES["picture"]) || $_FILES["picture"]["error"] == UPLOAD_ERR_NO_FILE) {
		$sql = "UPDATE `$cat` SET title='$title',content='$content', price='$price' WHERE id='$id'";
	} else {
		$target_dir = "../images/items/";
		$filename = $_POST['title'] . basename($_FILES["picture"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
		    } else {
			echo "Sorry, there was an error uploading your file.";
		    }
		}
		$sql = "UPDATE `$cat` SET title='$title',content='$content', `picture`='$filename',price='$price' WHERE id='$id'";
	}


	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();

}

global $db;
try{
	$db = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $user, $pass);//use charset=utf8 here
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch ( PDOException $e ) {
	echo "Database error ".$e->getMessage();
}

$query = "SELECT * FROM `$cat` where `id`=$id";
$stmt = $db->prepare($query);
$rc = $stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
	entity_encoding : "numeric"
});
</script>

<div class="box">
	<h1>Edit item</h1>
	<form name="login" action="edit.php?cat=<?php echo $cat;?>&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
		Title: <input name="title" value="<?php echo $row['title'] ?>" /><br>
		Content: <textarea style="height:50%" name="content"><?php echo $row['content'] ?></textarea><br>
		Price: <input name="price" value="<?php echo $row['price'] ?>" /><br>
		Picture: <input type="file" id="picture" name="picture" accept="image/*"><br>

		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
<?php
}
else{
header('Location:index.php');
}
?>
