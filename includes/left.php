    <div class="left_content">
      <div class="title_box" style="margin-bottom: 2px;">Danh mục sản phẩm</div>
      <ul class="left_menu">
          
          <?php
            $sql_cha = "select id_danh_muc, ten_danh_muc from danh_muc where id_danh_muc_cha=0 order by id_danh_muc asc";

            $rows = $db->query($sql_cha)->fetchAll();
            foreach ($rows as $r) {
                echo "<li class='even'><a href='index.php?page=products&cat_id=$r[0]'>$r[1]</a></li>";
                $sql_con = "select id_danh_muc, ten_danh_muc from danh_muc where id_danh_muc_cha=$r[0] order by id_danh_muc asc";

                $rows_con = $db->query($sql_con);
                foreach ($rows_con as $r_con) {
                    echo "<li class='odd'><a href='index.php?page=products&cat_id=$r_con[0]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$r_con[1]</a></li>";
                }
            }
          ?>
          
     

      </ul>
    </div>
