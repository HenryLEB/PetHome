<?php
	require_once ('config.php');
  require_once ('filter.php');
  

  $petsNumSTR = 'select count(1) as num from pet;';
  $result = mysqli_query($conn, $petsNumSTR);
  $row = mysqli_fetch_array($result)['num'];

  $str = 'select count(1) as num from message;';
  $aaa = mysqli_query($conn, $str);
  $comment = mysqli_fetch_array($aaa)['num'];

  $str = 'select count(1) as num from message;';
  $aaa = mysqli_query($conn, $str);
  $item = mysqli_fetch_array($aaa)['num'];
?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>


  <div class="main">
    <?php include 'inc/navbar.php'; ?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>充满期望的一天</h1>
        <p>断剑重铸日，骑士归来之时</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">点点看</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo $row; ?></strong> 种宠物</li>
              <li class="list-group-item"><strong><?php echo $comment; ?></strong> 条留言</li>
              <li class="list-group-item"><strong><?php echo $item ?></strong> 个订单</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  
  <?php include 'inc/sidebar.php'; ?>
  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
