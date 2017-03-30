<?php
session_start();
if($_SESSION['username']){


error_reporting(E_ALL);
ini_set('display_errors', True);

include '../database.php';

if(isset($_POST['title'])) {

	if(!isset($_FILES["picture"]) || $_FILES["picture"]["error"] == UPLOAD_ERR_NO_FILE) {
		$filename = '';
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
	}
	
	// Create connection
	$conn = new mysqli($host,$user,$pass,$database);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$cat = $_POST['cat'];
	$price = mysqli_real_escape_string($conn,$_POST['price']);

	$sql = "INSERT INTO `$cat` (`id`, `title`, `content`, `picture`, `price`) VALUES (NULL, '$title', '$content', '$filename', '$price');";

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
	$price = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../favicon.ico" />
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
	editor_encoding : "numeric"
});
</script>
<title>Administration</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="topbar">
	<a class="right" href="index.php?logout=1">Logout</a>
	<a href="index.php">Admin Panel</a> | <a href="active.php">Active Orders</a> | <a href="done.php">Fulfiled Orders</a>
</div>

<div class="box">
	<h1>Add new item</h1>
	<form name="login" action="add.php" method="post" enctype="multipart/form-data">
		Title: <input name="title" value="<?php echo $title ?>" /><br>
		Content: <textarea style="height:50%" name="content"><?php echo $content ?></textarea><br>
		Price: <input name="price" value="<?php echo $price ?>" /><br>

		Picture: <input type="file" id="picture" name="picture" accept="image/*"><br>

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
</div>
<?php
}
else{
header('Location:index.php');
}
?>
