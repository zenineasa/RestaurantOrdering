<style>
table, tr, td{
border:0.1em solid #000;
padding:1em;
}
</style>
<?php
session_start();
if($_SESSION['username']){
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

		$query = "SELECT * FROM `done`";
		$stmt = $db->prepare($query);
		$rc = $stmt->execute();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo $row['data']."<b>Grand Total: ".$row['bill']."</b><br><br><hr><br><br><br>";
	}
}
else{
	header('Location:index.php');
}
?>
