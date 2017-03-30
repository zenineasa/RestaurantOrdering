<?php
$cat = $_GET['cat'];

error_reporting(E_ALL);
ini_set('display_errors', True);

include 'database.php';

global $db;
try{
	$db = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', $user, $pass);//use charset=utf8 here
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch ( PDOException $e ) {
	echo "Database error ".$e->getMessage();
}
?>
			<ul>
<?php
			$query = "SELECT * FROM `$cat`";
			$stmt = $db->prepare($query);
			$rc = $stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?><li>
					<a onclick="document.body.style.overflow='hidden';loaditem(<?php echo $row['id'] ?>,'<?php echo $cat ?>');"><?php echo $row['title'] ?></a> <span class="price">(Rs. <?php echo $row['price'] ?>)</span>
					<?php
					if($row['availability']==1){
					?>
						<input type="number" class="inp" name="<?php echo $row['id'] ?><?php echo $cat ?>" value="0" min="0"></li>
					<?php
					}
					else{ 
						echo "<span class='right'>Unavailable</span>";
					} ?>
				<?php
			}
 ?>
			</ul>

	<script>
	function loaditem(id,cat){
		$("#load").hide().load("loaditem.php?cat="+cat+"&id="+id).fadeIn('500');

	}
	</script>
