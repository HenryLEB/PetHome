<?php

use function PHPSTORM_META\type;

require_once ('config.php');
	require_once ('filter.php');
?>

<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$type = $_POST["type"];
	$id = $_POST["id"];
	$str = "UPDATE USER SET USERNAME='".$username."',PASSWORD='".$password."',TYPE='".$type."' WHERE ID=".$id;
		$result = mysqli_query($conn,$str);
		if($result>=1){
			header('Location: ./users.php');
		}else{
			// header('Location: ./users.php');
			echo $username,$password,$type,$id;
		}
	
?>