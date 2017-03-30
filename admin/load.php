<?php
session_start();
if($_SESSION['username']){

$cat = $_GET['cat'];
$id = $_GET['id'];

error_reporting(E_ALL);
ini_set('display_errors', True);

include '../database.php';

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
	<div class="container">
		<div class="left">
			<div class="title">
				<h1><?php echo $row['title'] ?></h1>
				Category: <?php echo $cat; ?><br><br>
			</div>
		</div>
		<a href="edit.php?cat=<?php echo $cat;?>&id=<?php echo $id;?>">Edit</a> <a href="delete.php?cat=<?php echo $cat;?>&id=<?php echo $id;?>">Delete</a>

		<div class="content">
				<?php echo $row['content'] ?>
		</div>
	</div>
<?php
}
else{
header('Location:index.php');
}
?>
