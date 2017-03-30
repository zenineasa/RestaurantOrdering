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

<h1>Deleting...</h1>
	<div class="container">
		<div class="left">
			<div class="title">
				<h1><?php echo $row['title'] ?></h1>
				Category: <?php echo $cat; ?><br><br>
			</div>
		</div>
	</div>
<?php
$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM `$cat` WHERE `id`=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location:index.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<?php
}
else{
header('Location:index.php');
}
?>
