    

<div class="center_content">
     
      <div class="center_title_bar">Danh sách sản phẩm</div>
      <?php
        $sosp_tren_trang = 6;
        $start=0;
        if(isset($_REQUEST['p']))
        {
            $p = $_REQUEST['p'];
            $start=($p-1)*$sosp_tren_trang;
        }
        $sql = "select id_san_pham, ten_san_pham, anh_san_pham, gia, hien_thi from san_pham where hien_thi=1";
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sql.=" and id_danh_muc= $id";
        }
        if (isset($_REQUEST['key'])) {
            $key = $_REQUEST['key'];
            $sql.= " and ten_san_pham like '%$key%'";
        }
        $sql.=" order by id_san_pham desc";
        $count=count($db->query($sql)->fetchAll());
        $sql.=" limit $start,$sosp_tren_trang";
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
        $so_trang = ceil($count/$sosp_tren_trang);
      ?>
      <div style="clear: both; margin-top: 20px; text-align: center;">
          <?php
          if($so_trang>1)
          {
              $link = 'index.php?page=products';
              if(isset($_REQUEST['id']))
              {
                  $link.= '&id='.$_REQUEST['id'];
              }
              if(isset($_REQUEST['key']))
              {
                  $link.= '&key='.$_REQUEST['key'];
              }
              
              echo '<div class="pagination">';
              for($i=1; $i<=$so_trang; $i++)
              {
                  echo "<a href='$link&p=$i'>Trang $i</a>";
              }
              echo '</div>';
          }
          ?>
      </div>
    </div>