<?php
	require_once ('config.php');
?>
<?php
	if($_SESSION["admin"]!=null){
		
	}else{
		header('Location: ./login.php');
		// header('Location: ./index.php');
	}
?>