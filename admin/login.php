<!DOCTYPE html>

<?php

$message = isset($_GET['message']) ? $_GET['message'] : 0;

?>

<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap" action="logins.php" method="POST">
      <img class="avatar" src="../assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <?php if($message): ?>
      <div class="alert alert-danger">
        <strong>错误！</strong> 用户名或密码错误！
      </div>
      <?php endif ?>  
      <div class="form-group">
        <label for="username" class="sr-only">用户名</label>
        <input id="username" name="username" type="text" class="form-control" placeholder="用户名" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="密码">
      </div>
      <!-- <a class="btn btn-primary btn-block" href="index.php">登 录</a> -->
      <button class="btn btn-primary btn-block" >登 录</button>
    </form>
  </div>
</body>
</html>
