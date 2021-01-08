<?php
require_once('config.php');
require_once('filter.php');

session_start();

$GLOBALS['flag'] = $_GET['flag'];
?>


<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Add new post &laquo; Admin</title>
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
        <h1>添加新宠物</h1>
      </div>
      <!-- 有错误信息时展示 -->


      <?php if ($flag == 1) : ?>
        <div class="alert alert-success">
          <strong>添加成功 </strong>
        </div>
      <?php elseif ($flag == 2) : ?>
        <div class="alert alert-danger">
          <strong>添加失败 </strong>
        </div>
      <?php endif ?>
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <form class="row" action="pet-adds.php" method="POST">
        <div class="col-md-9">
          <div class="form-group">
            <label for="name">品种名称</label>
            <input id="name" class="form-control input-lg" name="name" type="text" placeholder="品种名称">
          </div>
          <div class="form-group">
            <label for="comment">备注/描述</label>
            <textarea id="comment" class="form-control input-lg" name="comment" cols="30" rows="10" placeholder="备注"></textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="price">价格</label>
            <input id="price" class="form-control" name="price" type="text" placeholder="price">
          </div>
          <div class="form-group">
            <label for="images">特色图像</label>
            <!-- show when image chose -->
            <img class="help-block thumbnail" style="display: none">
            <input id="images" class="form-control" name="images" type="file">
            <input value="" id="imagePath" name="imagePath" type="hidden" >

          </div>
          <div class="form-group">
            <label for="type">宠物分类</label>
            <select id="type" class="form-control" name="type">
              <option value="汪星人">汪星人</option>
              <option value="喵星人">喵星人</option>
              <option value="宠物兔">宠物兔</option>
              <option value="观赏鱼">观赏鱼</option>
              <option value="其他宠物">其他宠物</option>
            </select>
          </div>
          <div class="form-group">
            <label for="birthday">出生日期</label>
            <input id="birthday" class="form-control" name="birthday" type="datetime-local">
          </div>
          <div class="form-group">
            <label for="area">地区</label>
            <input id="area" class="form-control" name="area" type="text" placeholder="地区">
          </div>
          <div class="form-group">
            <label for="pure">是否纯种</label>
            <select id="pure" class="form-control" name="pure">
              <option value="是">是</option>
              <option value="否">否</option>
            </select>
          </div>
          <div class="form-group">
            <button id="" class="btn btn-primary" type="submit">保存</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php $current_page = 'pet-add'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>

  <script>

        $('#images').on('change',function() {
          // console.log($(this));

          var files = $(this).prop('files')
          // console.log(files)
          
          if(!files.length) return

          var file = files[0]

          var data = new FormData()
          data.append('image',file)

          var xhr = new XMLHttpRequest()
          xhr.open('POST','./upload.php')
          xhr.send(data)

          xhr.onload = function () {
            // console.log(this.responseText)
            var Path = this.responseText
            // console.log(Path)
            $('#imagePath').val(Path)
          }



        });

  </script>

</body>

</html>