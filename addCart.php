<?php
	require_once ('config.php');
	// require_once ('filter.php');
?>
<?php
	
	
	$id = $_GET["id"];  //获得商品的id
	$userid = $_SESSION["id"];//获得用户的id
	
	$str = "INSERT INTO CART(USER_ID,PET_ID,PETs_num) VALUES('".$userid."','".$id."',1)"; //执行插入购物车的sql语句
	// $str = "INSERT INTO CART(USER_ID,PET_ID) VALUES('".$userid."','".$id.")"; //执行插入购物车的sql语句
		
	$result = mysqli_query($conn,$str);//执行sql语句
	
	
	if($result>=1){  //获得执行sql的结果进行判断
		header('Location: ./details.php?id=' . $id);
	}else{
		header('Location: ./details.php?id=' . $id);

	}
	
	
	
?>