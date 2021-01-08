<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php
		$id = $_GET['id'];
		$str = "DELETE FROM ITEM WHERE ID=".$id;
      $result = mysqli_query($conn,$str);
		if($result>=1){
			header('Location: ./itemlist.php');
		}else{
			header('Location: ./itemlis.php');
		}
?>