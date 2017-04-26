  <div id="menu_tab">
      <ul class="menu">
        <li><a href="index.php" class="nav"> Trang chủ </a></li>
        <li class="divider"></li>
        <li><a href="index.php?page=products" class="nav">Sản phẩm</a></li>
        <li class="divider"></li>
        <li><a href="index.php?page=news" class="nav">Tin tức</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Liên hệ</a></li>
        <li class="divider"></li>
        <li><a href="index.php?page=login" class="nav">Đăng nhập</a></li>
        <li class="divider"></li>
        <li><a href="index.php?page=register" class="nav">Đăng ký</a></li>
        <?php
        if(isset($ho_ten))
        {
            echo "<li style='float:right'>Xin chào,<font style='color:blue'>$ho_ten</font></li>";
        }
        ?>
      </ul>
    </div>
   