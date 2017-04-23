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
        <div class="cart_details"> 3 items <br />
            <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href="http://all-free-download.com/free-website-templates/"><img src="img/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
    </div>

</div>