<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$type = $_POST["type"];
	
	$str = "INSERT INTO USER(USERNAME,PASSWORD,TYPE) VALUES('".$username."','".$password."','".$type."')";
		$result = mysqli_query($conn,$str);
		
		if($result>=1){
			header('Location: ./users.php?flag=1');
		}else{
			// header('Location: ./users.php?flag=2');

			// echo $username,$password,$type;
			echo $result;
		}
	
?>