<?php
require_once('config.php');
$keyword = $_GET["keyword"];

if ($keyword != "")
  $str = "SELECT * FROM PET WHERE TYPE='" . $keyword . "' ORDER BY PRICE DESC";
else
  $str = "SELECT * FROM PET ORDER BY PRICE DESC";

$result = mysqli_query($conn, $str);

?>




<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <title>宠物家园</title>
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/transfer.css">


  <style>
    div.container {
      position: relative;
    }

    .message {
      position: absolute;
      font-size: 30px;
    }
 
  </style>

</head>

<body>

  <!-- 顶部导航 -->
  <?php include_once('nav.php'); ?>

  <!--轮播图-->

  <!-- 留言板 -->
  <div class="container">
        <?php
		
        $str = "SELECT * FROM MESSAGE";

        $result = mysqli_query($conn, $str);


        while ($row = mysqli_fetch_array($result)) {
          $left = rand(10,1000);
          $top = rand(10,800);
          
          $color = ['green','black','pink','hotpink','skyblue'];
          $c = rand(0,4);
          $Fcolor = $color[$c];
          // transform:rotate(90deg)
          $rotate = rand(0,90);
      	?> 
          
            <div class="message" style="<?php echo 'left:' .$left . 'px;' . 'top:' .$top . 'px;' 
                                                    .'color:'. $Fcolor .';' . 'transform:rotate( '. $rotate .'deg);'
                                                    ; ?>" ><?php echo  $row["content"]; ?></div>

          <?php }  ?> 

  </div>

  <!--合作伙伴-->

  <!-- <?php include_once('footer.php'); ?>  -->

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/artTemplate/template-native.js"></script>
  <script src="lib/iscroll/iscroll.js"></script>
  <script src="js/index.js"></script>
</body>

</html>