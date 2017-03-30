<?php
session_start();

$userinfo = array(
	'admin'=>'iambatman007'
);

if(isset($_GET['logout'])) {
	$_SESSION['username'] = '';
	header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
	if(isset($userinfo[$_POST['username']])&&($userinfo[$_POST['username']] == $_POST['password'])) {
		$_SESSION['username'] = $_POST['username'];
	}else {
		echo "Incorrect Credentials";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="../favicon.ico" />
<title>Administration</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php if(isset($_SESSION['username']) && $_SESSION['username']){

// SQL Connect...
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

?>
<div class="topbar">
	<a class="right" href="?logout=1">Logout</a>
	<a href="index.php">Admin Panel</a> | <a href="active.php">Active Orders</a> | <a href="done.php">Fulfiled Orders</a>
</div>

<div class="box">
	<p><strong>Welcome Admin</strong></p>

	<p><a href="addsection.php">Add Category</a> | <a href="editsection.php">Edit Category</a> | <a href="deletesection.php">Delete Category</a></p>
	<p><a href="add.php">Add new item</a></p>


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

	<h2><?php echo $cat; ?></h2>
			<ul>
<?php
			$query = "SELECT * FROM `$cat`";
			$stmt = $db->prepare($query);
			$rc = $stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?><li>
					<a onclick="loader(<?php echo $row['id'] ?>,'<?php echo $cat ?>');"><?php echo $row['title'] ?></a>
					<?php
					if($row['availability']==1){ ?>
						<font color="#00ff00">(Available)</font> - <a href="unavail.php?cat=<?php echo $cat;?>&id=<?php echo $row['id'];?>">Mark Unavailable</a>
					<?php
					}
					else{ ?>
						<font color="#ff0000">(Unavailable)</font> - <a href="avail.php?cat=<?php echo $cat;?>&id=<?php echo $row['id'];?>">Mark Available</a>
					<?php
					}
					?> 
				</li>
				<?php
			}
 ?>
			</ul>

<?php
}

mysqli_free_result($result);
mysqli_close($con);
?>
	<div id="load"></div>

</div>


<?php }
else {
?>


<div class="box" style="text-align:center;">
	<br>
	<form name="login" action="" method="post">
		<input id="form" type="text" name="username" value="Username" onblur="if (this.value == '') {this.value = 'Username';}" onfocus="if (this.value == 'Username') {this.value = '';}"><br>
		<input id="form" type="password" name="password" value="password" onblur="if (this.value == '') {this.value = 'password';}" onfocus="if (this.value == 'password') {this.value = '';}"><br><br>
		<input id="login" type="submit" name="submit" value="Submit">
	</form>
	<p><br><br>Administration Panel</p>
</div>


<?php }
?>


<script src="../js/jquery.min.js"></script>
<script>
function loader(id,cat){
	$("#load").hide().load("load.php?cat="+cat+"&id="+id).fadeIn('500');

}
</script>
</body>
</html>
