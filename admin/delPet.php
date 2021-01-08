<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM PET WHERE ID=".$id;
      $result = mysqli_query($conn,$str);
		if($result>=1){
			header('Location: ./lists-pets.php');
		}else{
			header('Location: ./lists-pets.php');
		}
?>