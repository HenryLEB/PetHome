<!--导航栏-->
<?php
require_once('config.php');
?>
<nav class="navbar pet_nav" data-spy="affix" data-offset-top="200">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span class="">宠物家园LOGO</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">首页</a></li>
                <li><a href="transfer.php?keyword=喵星人">喵星人</a></li>
                <li><a href="transfer.php?keyword=汪星人">汪星人</a></li>
                <li><a href="transfer.php?keyword=宠物兔">宠物兔</a></li>
                <li><a href="transfer.php?keyword=观赏鱼">观赏鱼</a></li>
                <li><a href="transfer.php?keyword=其他宠物">其他宠物</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right hidden-sm">

                <?php if ($_SESSION["user"] == "") {
                    echo ' <li><a href="#" id="btn-register" >注册</a> <a href="#" id="btn-login">登录</a></li>';
                } else {
                    echo '
                        <li><a href="comments.php">留言板</a></li>
                        
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >个人中心 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="item.php">我的订单</a></li>
                          <li><a href="cart.php">我的购物车</a></li>
                          <li><a href="logout.php">注销</a></li>
                        </ul>
                      </li>
                      ';
                }
                ?>
            </ul>
        </div>
        <div class="pet-login">
            <form class="form-horizontal" method="POST" action="login.php">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">账户名</label>
                    <div class="col-sm-10">
                        <input name="username" type="email" class="form-control" id="inputEmail3" placeholder="账户名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">登录</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="pet-register">
            <form class="form-horizontal" method="POST" action="register.php">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">账户名</label>
                    <div class="col-sm-10">
                        <input name="username" type="email" class="form-control" id="inputEmail3" placeholder="账户名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input name="checkword" type="password" class="form-control" id="inputPassword3" placeholder="确认密码密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">注册</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<div class="container">

</div>

<script src="lib/jquery/jquery.min.js"></script>
<!-- <div class="snow-container" style="position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:100001;"></div>

<script type="text/javascript" src="js/all.js"></script> -->
<script>
    $(function() {
        $screen_h = $(window).height();
        $screen_w = $(document).width();

        $('#btn-login').on("click", function() {
            $('.pet-login').fadeIn();
            console.log($screen_w);
        })

        $('#btn-register').on("click", function() {
            $('.pet-register').fadeIn();
            console.log($screen_w);
        })


    });
</script>