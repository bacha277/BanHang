<?php
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "select id_san_pham, ten_san_pham, anh_san_pham, gia, hien_thi,thong_tin_ct,khuyen_mai from san_pham where id_san_pham = $id";
    $rows = $db->query($sql);

    $r = $rows->fetch();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sl_mua=$_POST['nbSl'];
    header("location:index.php?page=cart&id=$id&sl_mua=$sl_mua");
}
?>
<div class="center_content">
    <form action="" method="post" id="my_form">
        <div class="center_title_bar"><?php if (isset($r)) echo $r[1]; ?></div>
        <div class="prod_box_big">
            <div class="center_prod_box_big">
                <div class="product_img_big"> 
                    <a href="javascript:popImage('img/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="img/<?php if (isset($r)) echo $r[2]; ?>" alt="" border="0" width="125px"/></a>
                </div>
                <div class="details_big_box">
                    <div class="product_title_big"><?php if (isset($r)) echo $r[1]; ?></div>
                    <div class="specifications"> 
                        Thông tin chi tiết :<span class="blue"> <?php if (isset($r)) echo $r[5]; ?> </span><br />
                    </div>
                    <div class="prod_price_big"> <span class="price"><?php if (isset($r)) echo number_format($r[3]); ?> VND</span></div>
                    <div class="prod_price_big"><span style="color: #159dcc">Số lượng cần mua</span> <input type="number" value="1" style="width: 30px" name="nbSl"></div>
                    <!--<a href="<?php echo "index.php?page=cart&id=$id" ?>" class="prod_buy">Thêm vào giỏ</a>--> 
                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="prod_buy">Thêm vào giỏ</a>
                </div>
            </div>
            <h2>Khuyến mại</h2>
            <div>
                <?php if (isset($r)) echo $r[6]; ?>
            </div>
        </div>
    </form>
</div>