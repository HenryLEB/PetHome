<?php
	require_once ('config.php');
	require_once ('filter.php');
?>

<?php $search = $_GET["search"]; ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
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
        <h1>所有宠物</h1>
        <a href="pet-add.php" class="btn btn-primary btn-xs">添加宠物</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="">所有分类</option>
            <option value="">未分类</option>
          </select>
          <select name="" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="">草稿</option>
            <option value="">已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>品种名称</th>
            <th>地区</th>
            <th>价格</th>
            <th class="text-center">出生日期</th>
            <th class="text-center">宠物分类</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if($search<>"")
            $str = "SELECT * FROM PET WHERE NAME LIKE '%".$search."%' OR TYPE LIKE '%".$search."%' OR AUTHOR LIKE '%".$search."%'";
          else
            $str = "SELECT * FROM PET";


          $result = mysqli_query($conn,$str);


          while($row = mysqli_fetch_array($result)){

          
          ?>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["area"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td class="text-center"><?php echo $row["birthday"]; ?></td>
            <td class="text-center"><?php echo $row["type"]; ?></td>
            <td class="text-center">
              <a href="editPet.php?id=<?php echo $row["id"]; ?>" class="btn btn-default btn-xs">编辑</a>
              <a href="delPet.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <?php } ?> 
        </tbody>
      </table>
    </div>
  </div>
  <?php $current_page = 'petslists'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>
</body>

</html>