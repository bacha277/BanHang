<div class="right_content">
    
    <form method="get">
        <input type="hidden" name="page" value="products"/>
        <?php
            if (isset($_REQUEST['id'])) {
                $id=$_REQUEST['id'];
                echo "<input type='hidden' name='id' value='$id'/>";
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

</div>