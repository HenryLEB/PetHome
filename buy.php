<?php
	require_once ('config.php');
?>
<?php
	
	// $ids = $_POST["id"]; //获得商品的id，下面和别的页面$_POST[""]这种都是接收读取信息的  就不一一注释了
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$userid = $_SESSION["id"];
	$str1 = "SELECT * FROM cart WHERE user_id=".$userid; //看到这种都是写sql语句的
	$result1 = mysqli_query($conn,$str1);
	$i=0;
	while($row1 = mysqli_fetch_array($result1)){ //看到这种都是从数据库循环读取信息的
	
		$date = date('Y-m-d H:i:s',time());
		$str = "INSERT INTO ITEM(USER_ID,pet_ID,DATE,PHONE,ADDRESS,pets_num) VALUES('".$userid."','".$row1["pet_id"]."','".$date."','".$phone."','".$address."','".$row1["pets_num"]."')";
		
		$result = mysqli_query($conn,$str);
		$i = $i+$result;
		mysqli_query($conn,"DELETE FROM CART WHERE ID=".$row1["id"]);

	
	}
	
	
	if($result>=0){
		header('Location: ./item.php?');
		
	}
	
?>