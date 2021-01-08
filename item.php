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
        .cart-head ul {
            width: 100%;
            text-align: center;
        }

        .cart-head ul li,
        .cart-body ul li {
            float: left;
            width: 16.6%;
            text-align: center;
        }

        .cart-body ul li {
            float: left;
            width: 16.6%;
            text-align: center;
            height: 100px;
            line-height: 100px;
            font-size: 20px;
            padding: 5px;
            margin-bottom: 50px;
        }

        .cart-body ul li:nth-child(4) {
            float: left;
            height: 50px;
            width: 16.6%;
            text-align: center;
            height: 100px;
            line-height: 100px;
            font-size: 20px;
        }


        /* .cart-head ul li:first {
            width: 10%;
        } */
    </style>

</head>

<body>

    <!-- 顶部导航 -->
    <?php include_once('nav.php'); ?>

    <!-- 购物车 -->



    <div class="cart container">
        <div class="cart-head">
            <ul>
                <li>序号</li>
                <li>图片</li>
                <li>品种</li>
                <li>数量</li>
                <li>支付金额</li>
                <li>时间</li>
            </ul>
        </div>
        <div class="cart-body">

            <?php
            $userid = $_SESSION["id"];
            $str = "SELECT * FROM ITEM WHERE USER_ID=" . $userid . " ORDER BY DATE DESC";
            $result = mysqli_query($conn, $str);
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {  //如果数据库里查询到信息循环读出
                $bookid = $row["pet_id"];

                $str = "SELECT * FROM PET WHERE ID=" . $bookid;
                $i++;
                $re = mysqli_query($conn, $str);
                if ($r = mysqli_fetch_array($re)) {
            ?>
                    <ul id="list_<?php echo $row["id"]; ?>">
                        <input type="hidden" value="<?php echo $row["id"]; ?>" name="id[]" />
                        <li><?php echo $i; ?></li>
                        <li><img src="<?php echo $r["images"]; ?>" width="80" /></li>
                        <li><?php echo $r["name"]; ?></li>
                        <li><?php echo $row["pets_num"]; ?></li>
                        <li>
                            <input value="<?php echo $r["price"] ?>" id="price_num_<?php echo $row["id"]; ?>" type="hidden">
                            <span id="value_num_<?php echo $row["id"]; ?>"><?php echo $r["price"] * $row["pets_num"]; ?></span>
                        </li>
                        <li><?php echo date('Y-m-d',$row["date"]); ?></li>

                    </ul>
            <?php }
            } ?>

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