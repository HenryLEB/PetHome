<?php
require_once('config.php');

$id = $_GET["id"];
$str = "SELECT * FROM PET WHERE ID=" . $id;
$result = mysqli_query($conn, $str);
if ($row = mysqli_fetch_array($result)) {
}
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

    <style>
        .details {
            margin-top: 20px;
        }

        .details .details-left,
        .details .details-right {
            float: left;
        }

        .details .details-left img {
            width: 500px;
            height: 500px;
        }

        .details .details-right {
            
            position: relative;
            margin-left: 100px;
        }

        .details .details-right h2 {
            margin-top: 0;
            margin-bottom: 60px;
        }

        .details .details-right p {
            display: block;
            margin: 60px 0;
            font-size: 20px;
        }

        .addCartBtn a {
            width: 200px;
            height: 50px;
            font-size: 20px;
            text-align: center;
            /* position: absolute;
            right: 20%;
            top: 50%; */
        }
    </style>

</head>

<body>

    <!-- 顶部导航 -->
    <?php include_once('nav.php'); ?>

    <!--轮播图-->
    <?php include_once('banner.php'); ?>

    <!-- 宠物详情 -->

    <div class="details container">
        <div class="details-left">
            <img src="<?php echo $row["images"]; ?>" style="width:300px;" />
        </div>
        <div class="details-right">
            <h2>品种: <?php echo $row['name'] ?></h2>
            <h2>价格: <?php echo $row['price'] ?></h2>
            <p>地区: <?php echo $row['area'] ?></p>
            <p>年龄: <?php echo date('Y', time()) - date("Y", strtotime($row['birthday'])) . ' 岁'; ?></p>
            <p>纯种: <?php echo $row['pure'] ?></p>
            <p>备注: <?php echo $row['comment'] ?></p>


            <div class="addCartBtn">
                <a type="button" class="btn btn-info" href="addCart.php?id=<?php echo $row["id"]; ?>">加入购物车</a>
            </div>
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
</body>

</html>