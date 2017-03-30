<?php
$nooftables = 14;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Restaurant App</title>

		<meta name="author" content="Zenin Easa" />

		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<script src="js/jquery.min.js"></script>
		<script>
		jQuery(window).load(function() {
			jQuery("#preloader").delay(1000).fadeOut("slow");
		})
		</script>
	</head>

	<body>

<?php
if(!isset($_GET["t"])){
?>
		<div class="holder">
			<h2>Choose your Table No.</h2>
			<?php
			for($i=1;$i<=$nooftables;$i++){
			?>
			<a href="?t=<?php echo $i; ?>"><div class="table">
				<div class="block"> <?php echo $i; ?> </div>
			</div></a>
			<?php
			}
			?>
		</div>
		
<?php
}
else{
?>

		<div class="slide first">
			<h1>Restaurant Name</h1>
		</div>
		<div class="second slide">

		<form action="table.php" method="post">
			<div class="link">
				<?php

				include 'database.php';

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

					<a onclick="loadsection('<?php echo $cat; ?>')"><div class="button"><?php echo $cat; ?></div></a>
					<div id="<?php echo $cat.'-load'; ?>" style="display:none"></div>

				<?php
				}

				mysqli_free_result($result);
				mysqli_close($con);
				?>
				<input type="hidden" name="Table" value="<?php echo $_GET["t"]; ?>">
				<textarea name="Note" class="text" onblur="if (this.value == '') {this.value = 'In case you wanna mention something...';}" onfocus="if (this.value == 'In case you wanna mention something...') {this.value = '';}">In case you wanna mention something...</textarea>
				<input type="submit" class="submit" value="Place your order">

			</div>

		</form>

		</div>
<?php
}
?>
		<div id="preloader">
			<ul class="loader">
				<li>
					<div class="circle"></div>
					<div class="ball"></div>
				</li>
				<li>
					<div class="circle"></div>
					<div class="ball"></div>
				</li>
				<li>
					<div class="circle"></div>
					<div class="ball"></div>
				</li>
				<li>
					<div class="circle"></div>
					<div class="ball"></div>
				</li>
				<li>
					<div class="circle"></div>
					<div class="ball"></div>
				</li>
			</ul>
		</div>

		<div id="load"></div>
		<script>
		function loadsection(cat){
			if($("#"+cat+"-load").is(':visible')){
				$("#"+cat+"-load").hide();      
			}
			else{
				$("#"+cat+"-load").hide().load("loadsection.php?cat="+cat).fadeIn('500');
			}
		}
		</script>

	</body>
</html>
