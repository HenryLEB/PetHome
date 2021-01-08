<?php
	require_once ('config.php');
?>
<?php
	
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$str = "SELECT * FROM USER WHERE USERNAME='".$username."'";
	$result = mysqli_query($conn,$str);
	
	
	if($row = mysqli_fetch_array($result)){
		echo "<script type='text/javascript'>alert('该用户已存在！');window.location.href='register.php';</script>";
		return;
	}else{
		$str = "INSERT INTO USER(USERNAME,PASSWORD,TYPE) VALUES('".$username."','".$password."',0)";
		$result = mysqli_query($conn,$str);
		if($result>=1){
			echo "<script type='text/javascript'>alert('注册成功！');window.location.href='index.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('注册失败！');window.location.href='register.php';</script>";
		}
	}
	
	
	
?>