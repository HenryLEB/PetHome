<!DOCTYPE html>
<html lang="zh-CN">

<?php
require_once('config.php');
$keyword = $_GET["keyword"];


$str = 'SELECT * FROM PET WHERE ID>=19 AND ID <=24 ORDER BY PRICE DESC';

$result = mysqli_query($conn, $str);

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <title>宠物家园</title>
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/nav.css">
  <style>
    .pet-lists img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
    }

    .snow-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 100001;
    }
  </style>
</head>

<body>

  <!-- 顶部导航 -->
  <?php include_once('nav.php'); ?>

  <!--轮播图-->
  <?php include_once('banner.php'); ?>

  <!-- 热门宠物 -->



  <div class="container hot-pet">
    <div class="hot-pet-top">
      <h3>热门宠物</h3>
      <a href="">更多>></a>
    </div>
    <div class="pet-lists container">
      <?php while ($row = mysqli_fetch_array($result)) { ?>
        <div class="media col-xs-12 col-sm-6 col-md-4">
          <div class="media-left">
            <a href="details.php?id=<?php echo $row["id"]; ?>">
              <img class="media-object" src="<?php echo $row["images"]; ?>" alt="宠物">
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>


  <!--合作伙伴-->

  <!-- <?php include_once('footer.php'); ?>  -->

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/artTemplate/template-native.js"></script>
  <script src="lib/iscroll/iscroll.js"></script>
  <script src="js/index.js"></script>
  <script src="js/nav.js"></script>

  <script src="js/snowy.js"></script>
  <div class="snow-container"></div>
</body>

</html>