<div class="aside">
    <div class="profile">
      <img class="avatar" src="../uploads/hashiqi.jpg">
      <h3 class="name">管理员</h3>
    </div>
    <ul class="nav">
      <li <?php echo $current_page === 'itemlist' ? ' class="active"' : '' ?>>
        <a href="itemlist.php"><i class="fa fa-dashboard"></i>订单列表</a>
      </li>
      <?php $menu_posts = array('petslists', 'pet-add'); ?>
      <li >
      
        <a href="#menu-posts" <?php echo in_array($current_page, $menu_posts) ? '' : ' class="collapsed"' ?> data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>商品管理<i class="fa fa-angle-right"></i>
        </a>
        
        <ul id="menu-posts" class="collapse <?php echo in_array($current_page, $menu_posts) ? ' in' : '' ?>">
          <li <?php echo $current_page == 'petslists' ? ' class="active"' : '' ?>><a href="lists-pets.php">商品列表</a></li>
          <li <?php echo $current_page == 'pet-add' ? ' class="active"' : '' ?> ><a href="pet-add.php">添加商品</a></li>
          <li><a  href="#">品种分类</a></li>
        </ul>
      </li>
      <li <?php echo $current_page === 'comments' ? ' class="active"' : '' ?>>
        <a href="comments.php"><i class="fa fa-comments"></i>留言</a>
      </li>
      <li <?php echo $current_page == 'users' ? ' class="active"' : '' ?>>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li class="active">
        <a href="#menu-settings" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="#">导航菜单</a></li>
          <li class=""><a href="#">图片轮播</a></li>
          <li><a href="#">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>