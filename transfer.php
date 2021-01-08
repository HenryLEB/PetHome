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
    img {
      width: 200px;
      height: 200px;
      border-radius: 8px;
    }

    .media-body h4 {
      font-weight: 700;
      font-size: 25px;
    }

    .media-body p:nth-child(2) {
      font-size: 20px;
      margin-top: 20px;
    }

    .media-body p:last-child {
      font-size: 20px;
      margin-top: 80px;
      color: red;
    }

  </style>
</head>

<body>

  <!-- 顶部导航 -->
  <?php include_once('nav.php'); ?>

  <!--轮播图-->
  <?php include_once('banner.php'); ?>

  <!-- 宠物信息 -->


  <div class="pet-lists container">
  <?php while ($row = mysqli_fetch_array($result)) { ?>
    <div class="media col-xs-12 col-sm-6 col-md-4">
      <div class="media-left">
        <a href="details.php?id=<?php echo $row["id"]; ?>">
          <img class="media-object" src="<?php echo $row["images"]; ?>" alt="宠物">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $row["name"]; ?></h4>
        <p><?php echo $row["area"] ?></p>
        <p><?php echo $row["price"] . '  元';?></p>
      </div>
    </div>
    <?php } ?>
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