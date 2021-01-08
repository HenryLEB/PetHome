<?php
	require_once ('config.php');
?>
<?php
	
	
	$id = $_POST["id"];
	$userid = $_SESSION["id"];
	
	$str = "DELETE FROM CART WHERE USER_ID=".$userid." AND ID=".$id;
		
	$result = mysqli_query($conn,$str);
	
?>