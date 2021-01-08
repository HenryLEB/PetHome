<?php
require_once('config.php');
require_once('filter.php');

$GLOBALS['flag'] = $_GET['flag'];
$GLOBALS['update'] = $_GET['update'];


$id =  $_GET['id'];
$str = "SELECT * FROM USER WHERE ID=".$id;
	$result = mysqli_query($conn,$str);
	if($row = mysqli_fetch_array($result)){
		
	}

?>



<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
  <script>
    NProgress.start()
  </script>

  <div class="main">
    <?php include 'inc/navbar.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <?php if ($flag == 1) : ?>
        <div class="alert alert-success">
          <strong>添加成功 </strong>
        </div>
      <?php elseif ($flag == 2) : ?>
        <div class="alert alert-danger">
          <strong>添加失败 </strong>
        </div>
      <?php endif ?>
      <div class="row">
        <div class="col-md-4">
          <form action="<?php echo isset($update) ? 'user-edit.php' : 'user-add.php'; ?>" method="POST">
            <h2><?php echo $update==1 ? '修改' : '添加新'; ?>用户</h2>
            <div class="form-group">
              <label for="username">用户名</label>
              <input type="hidden" name="id" class="text" value="<?php echo isset($id) ? $row["id"] : ''; ?>"/>
              <input id="username" class="form-control" name="username" type="text"  placeholder="用户名" value="<?php echo isset($id) ? $row['username'] : ''; ?>">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input id="password" class="form-control" name="password" type="text" placeholder="密码" value="<?php echo isset($id) ? $row['password'] : ''; ?>">
            </div>
            <div class="form-group">
              <label class="btn btn-default">
                <input type="radio" id="option1" autocomplete="off" value="0" name="type" checked> 普通用户
              </label>
              <label class="btn btn-default">
                <input type="radio" id="option2" autocomplete="off" value="1" name="type"> 管理员
              </label>

            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit"><?php echo isset($id) ? '修改' : '添加'; ?></button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>用户名</th>
                <th>密码</th>
                <th>用户类型</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>


              <?php

              if ($search != "")
                $str = "SELECT * FROM USER WHERE USERNAME LIKE '%" . $search . "%'";
              else
                $str = "SELECT * FROM USER";


              $result = mysqli_query($conn, $str);


              while ($row = mysqli_fetch_array($result)) {

              ?>
                <tr>
                  <td class="text-center"><input type="checkbox"></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['password']; ?></td>
                  <td><?php echo $row["type"]==1?"管理员":"普通用户";?></td>
                  <td class="text-center">
                    <a href="users.php?id=<?php echo $row['id'] ?>&update=1" class="btn btn-default btn-xs">编辑</a>
                    <a href="user-delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs">删除</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php $current_page = 'users'; ?>               
  <?php include 'inc/sidebar.php'; ?>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>
</body>

</html>