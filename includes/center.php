    <div class="center_content">
     
      <div class="center_title_bar">Sản phẩm mới nhất </div>
      <?php
        $sql = "select id_san_pham, ten_san_pham, anh_san_pham, gia, hien_thi from san_pham where hien_thi=1 order by id_san_pham desc limit 9";

        $rows = $db->query($sql);

        foreach ($rows as $r) {
            echo '<div class="prod_box">
          <div class="center_prod_box">
            <div class="product_title"  style="height:50px"><a href="#">' . $r[1] . '</a></div>
            <div class="product_img"><a href="index.php?page=pr_detail&id=' . $r[0] . '"><img src="img/' . $r[2] . '" alt="" border="0" width="100px" height="100px"/></a></div>
            <div class="prod_price"> <span class="price">' . number_format($r[3]) . ' VND </span></div>
          </div>
          <div class="prod_details_tab"> <a href="index.php?page=cart&id='.$r[0].'" class="prod_buy">Thêm vào giỏ</a> <a href="index.php?page=pr_detail&id=' . $r[0] . '" class="prod_details">Chi tiết</a> </div>
        </div>';
        }
      ?>
      
      
 

    </div>