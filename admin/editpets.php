<?php
	require_once ('config.php');
	require_once ('filter.php');
?>
<?php
	$id =  $_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$images = $_POST["images"];
	$area = $_POST["area"];
	$birthday = $_POST["birthday"];
	$pure = $_POST["pure"];
	$comment = $_POST["comment"];
	$type = $_POST["type"];
	
	$str = "UPDATE PET SET TYPE='".$type."',NAME='".$name."',PRICE='".$price."',IMAGES='".$images."',AREA='".$area."',BIRTHDAY='".$birthday."',COMMENT='".$comment."',PURE='".$pure."' WHERE ID=".$id;
		
	$result = mysqli_query($conn,$str);
	
	
	if($result>=1){
		header('Location: ./lists-pets.php');
	}else{
		header('Location: ./lists-pets.php');
	}
	
	
	
?>