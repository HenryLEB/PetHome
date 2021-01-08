<?php
	require_once ('config.php');
?>
<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$str = "SELECT * FROM USER WHERE USERNAME='".$username."' AND PASSWORD='".$password."' AND TYPE=1";
	
	$result = mysqli_query($conn,$str);
	if($row = mysqli_fetch_array($result)){
		$_SESSION["admin"] = $row["username"];
		header('Location: ./index.php');
	}else{
		header('Location: ./login.php?message=1');
		// header('Location: ./index.php');
		// echo '错误';

	}
	
	
	
?>