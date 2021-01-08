<?php
	require_once ('config.php');
?>
<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$str = "SELECT * FROM USER WHERE USERNAME='".$username."' AND PASSWORD='".$password."' AND TYPE=0";
	
	$result = mysqli_query($conn,$str);
	echo $username;
	echo $password;

	if($row = mysqli_fetch_array($result)){
		$_SESSION["user"] = $row["username"];
		$_SESSION["id"] = $row["id"];
		// echo "<script type='text/javascript'>alert('登陆成功');window.location.href='index.php';</script>";
		header('Location: ./index.php');
	}else{
		echo "<script type='text/javascript'>alert('登陆失败!');history.go(-1);</script>";
	}
    
?>
>
