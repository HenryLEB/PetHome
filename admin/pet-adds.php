<?php
	require_once ('config.php');
	require_once ('filter.php');
?>
<?php
	
	
	$name = $_POST["name"];
	$price = $_POST["price"];
	$imagePath = $_POST["imagePath"];
	$area = $_POST["area"];
	$birthday = $_POST["birthday"];
	$pure = $_POST["pure"];
	$comment = $_POST["comment"];
	$type = $_POST["type"];
	$str = "INSERT INTO PET(NAME,PRICE,IMAGES,AREA,BIRTHDAY,PURE,COMMENT,TYPE) VALUES('".$name."','".$price."','".$imagePath."','".$area."','".$birthday."','".$pure."','".$comment."','".$type."')";
		
	$result = mysqli_query($conn,$str);
	
	
	if($result>=1){
		header('Location: ./pet-add.php?flag=1');
		// echo $imagePath;
	}else{
		header('Location: ./pet-add.php?flag=2');
	}
	
	
	
?>