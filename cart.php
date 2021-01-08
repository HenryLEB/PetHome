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
            clear: both
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

        .cart-body {
            position: relative;
            clear: both;
        }

        form {
            /* width: 100%; */
            position: absolute;
            bottom: -25%;
            left: 25%;
            /* margin-left: -100px; */
            /* border: 1px solid #ccc; */
            padding: 20px;
            font-size: 20px;
        }

        form input:nth-child(2),
        form input:nth-child(5) {
            width: 500px;
            border-radius: 8px;
            background-color: rgba(0, 0, 0, .1);
            margin-top: 20px;
            padding: 10px;
        }

        form input:last-child {
            position: absolute;
            bottom: -15%;
            left: 30%;
            width: 150px;
            background-color: rgba(0, 0, 0, .1);
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
                <li>价格</li>
                <li>操作</li>
            </ul>
        </div>
        <div class="cart-body clearfix">

            <?php
            $userid = $_SESSION["id"];
            $str = "SELECT * FROM CART WHERE USER_ID=" . $userid;
            $result = mysqli_query($conn, $str);
            $flag = 0;
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $flag = 1;
                $bookid = $row["pet_id"];
                $i++;
                $str = "SELECT * FROM PET WHERE ID=" . $bookid;

                $re = mysqli_query($conn, $str);
                if ($r = mysqli_fetch_array($re)) {
            ?>
                    <ul id="list_<?php echo $row["id"]; ?>">
                        <input type="hidden" value="<?php echo $row["id"]; ?>" name="id[]" />
                        <li><?php echo $i; ?></li>
                        <li><img src="<?php echo $r["images"]; ?>" width="80" /></li>
                        <li><?php echo $r["name"]; ?></li>
                        <li><input type="text" style="width:50px; text-align:center; height: 50px;" value="<?php echo $row["pets_num"]; ?>" onkeyup="updateNum(<?php echo $row["id"]; ?>)" id="number_<?php echo $row["id"]; ?>" name="number" /></li>
                        <li>
                            <input value="<?php echo $r["price"] ?>" id="price_num_<?php echo $row["id"]; ?>" type="hidden">
                            <span id="value_num_<?php echo $row["id"]; ?>"><?php echo $r["price"] * $row["pets_num"]; ?></span>
                        </li>
                        <li><input type="button" class="btn btn-danger" onclick="delCartNum(<?php echo $row["id"]; ?>)" value="删除" /></li>

                    </ul>
            <?php }
            } ?>

            <?php
            if ($flag)
            echo '<form action="buy.php" class="clearfix" method="get">
                    <label for="phone">联系方式：</label><input type="text" name="phone" id="phone"><br>
                    <label for="address">收货地址：</label><input type="text" name="address" id="address">
                    <input type="submit" value="确认支付" id="">
                </form>'
            ?>
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

    <script>
        function updateNum(value_num) {
            var value = document.getElementById("number_" + value_num).value;
            var number = document.getElementById("price_num_" + value_num).value;
            $("#value_num_" + value_num).html(value * number);
            $.post("test_post.php", {
                    id: value_num,
                    pets_num: value
                },
                function(data, status) {});

        }

        function delCartNum(value_num) {
            $("#list_" + value_num).html("");
            $.post("delcart.php", {
                    id: value_num
                },
                function(data, status) {});

        }
    </script>
</body>

</html>