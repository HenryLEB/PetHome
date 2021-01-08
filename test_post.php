<?php
	require_once ('config.php');
?>
<?php
$id =  $_POST["id"];
$pets_num =  $_POST["pets_num"];

$str = "UPDATE cart SET pets_num='".$pets_num."' WHERE ID=".$id;
		
$result = mysqli_query($conn,$str);
?>