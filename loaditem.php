<?php
$cat = $_GET['cat'];
$id = $_GET['id'];

error_reporting(E_ALL);
ini_set('display_errors', True);

include 'database.php';

global $db;
try{
	$db = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $user, $pass);
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
	<div class="close"><a onclick="document.body.style.overflow='visible';$('#load').fadeOut('500');">&larr;</a></div>
	
	<div class="container">
		<div class="left">
			<div class="title">
				<h1><?php echo $row['title'] ?></h1>
				Category: <?php echo $cat; ?><br><br>
				<?php if($row['picture']!=''){?>
					<img src="images/items/<?php echo $row['picture'] ?>">
				<?php } ?>
			</div>
		</div>

		<div class="content">
				<?php echo $row['content'] ?>
		</div>
	</div>
