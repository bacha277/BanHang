<div class="right_content">
    
    <form method="get">
        <input type="hidden" name="page" value="products"/>
        <?php
            if (isset($_REQUEST['id'])) {
                $id=$_REQUEST['id'];
                echo "<input type='hidden' name='id' value='$id'/>";
            }
            if (isset($_REQUEST['low']) && isset($_REQUEST['high'])) {
                $low=$_REQUEST['low'];
                echo "<input type='hidden' name='low' value='$low'/>";
                $high=$_REQUEST['high'];
                echo "<input type='hidden' name='high' value='$high'/>";
            }
        ?>
        <div class="title_box">Tìm kiếm</div>
        <div class="border_box">
            <input type="text" name="key" class="newsletter_input" placeholder="Từ khóa"/>
            <input type="submit" value="Tìm kiếm"/>
        </div>
    </form>

    
    <div class="shopping_cart">
        <div class="title_box">Giỏ hàng</div>
        <div class="cart_details"> <?php
                                        $i = 0;
                                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                            foreach ($_SESSION['cart'] as $r) {
                                                $i+=$r['sl'];
                                            }
                                        }
                                        echo $i;
                                    ?> sản phẩm <br />
            <span class="border_cart"></span> Tổng cộng: <span class="price"><?php
                                                                                $total = 0;
                                                                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                                                                    foreach ($_SESSION['cart'] as $r) {
                                                                                        $total+=$r['dg'] * $r['sl'];
                                                                                    }
                                                                                }
                                                                                echo number_format($total);
                                                                             ?></span> </div>
        <div class="cart_icon"><a href="index.php?page=cart"><img src="img/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
    </div>

    <div class="title_box">Tìm theo giá</div>
    <ul class="left_menu">
        <li class='odd'><a href='index.php?page=products&low=0&high=5000000'>Dưới 5.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=5000000&high=6000000'>5.000.000 ~ 6.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=6000000&high=7000000'>6.000.000 ~ 7.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=7000000&high=8000000'>7.000.000 ~ 8.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=8000000&high=9000000'>8.000.000 ~ 9.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=9000000&high=10000000'>9.000.000 ~ 10.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=10000000&high=11000000'>10.000.000 ~ 11.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=11000000&high=12000000'>11.000.000 ~ 12.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=12000000&high=13000000'>12.000.000 ~ 13.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=13000000&high=14000000'>13.000.000 ~ 14.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=14000000&high=15000000'>14.000.000 ~ 15.000.000</a></li>
        <li class='odd'><a href='index.php?page=products&low=15000000&high=999999999'>Trên 15.000.000</a></li>
    </ul>
</div>