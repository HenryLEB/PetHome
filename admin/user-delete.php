<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM USER WHERE ID=".$id;
      $result = mysqli_query($conn,$str);
		if($result>=1){
			header('Location: ./users.php');
		}else{
			header('Location: ./users.php');
		}
?>