<?php
$id_tin_tuc = $_REQUEST['id'];
//2. Truy van
$sql = "SELECT tieu_de,chi_tiet FROM tin_tuc where id_tin_tuc=$id_tin_tuc";

//3. Thuc thi
$rows = $db->query($sql)->fetch();

?>
<div class="center_content">
    <div class="center_title_bar"><?php echo $rows[0]; ?></div>
    <div style="width: 100%">
        <?php
        echo $rows[1];
        ?>
    </div>
</div>