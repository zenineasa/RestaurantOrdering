<style>
table, tr, td{
border:0.1em solid #000;
padding:1em;
}
</style>
<?php 

	$data = "<table>";
	$data .= "<tr>";
	$data .= "<td>";
	$data .= "<b>Category</b>";
	$data .= "</td>";
	$data .= "<td>";
	$data .= "<b>Item</b>";
	$data .= "</td>";
	$data .= "<td>";
	$data .= "<b>Quantity</b>";
	$data .= "</td>";
	$data .= "<td>";
	$data .= "<b>Price</b>";
	$data .= "</td>";
	$data .= "<td>";
	$data .= "<b>Amount</b>";
	$data .= "</td>";
	$data .= "</tr>";

	$total = 0;

	include 'database.php';
	
	global $db;

    foreach ($_POST as $key => $value) {
	if($value != 0 && $key != "Table"){

		$array = preg_split("/(\d+)/", $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		$id = $array[0];
		$cat = $array[1];

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

		$total = $total + ( $row['price'] * $value );


		$data .= "<tr>";
		$data .= "<td>";
		$data .= $cat;
		$data .= "</td>";
		$data .= "<td>";
		$data .= $row['title'];
		$data .= "</td>";
		$data .= "<td>";
		$data .= $value;
		$data .= "</td>";
		$data .= "<td>";
		$data .= $row['price'];
		$data .= "</td>";
		$data .= "<td>";
		$data .= ( $row['price'] * $value );
		$data .= "</td>";
		$data .= "</tr>";
	}
    }

	$data .= "Note : ".$_POST['Note'];
	$data .= "</table><br>Table Number: ".$_POST['Table']."<br><br>";
	echo $data;
	echo "<b>Grand Total: ".$total."</b><br>";

	// Create connection
	$conn = new mysqli($host,$user,$pass,$database2);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO `active` (`id`, `data`, `bill`) VALUES (NULL, '$data', '$total');";

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>
