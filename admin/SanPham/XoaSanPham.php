<?php

//Lay gia tri tham so
if (isset($_REQUEST['ma'])&&isset($_REQUEST['link_anh'])) {
    $ma = $_REQUEST['ma'];
    $link_anh=$_REQUEST['link_anh'];


    //2. Cau truy van
    $sql = "delete from san_pham where id_san_pham=$ma";


    //3. Thuc thi
    $count = $db->exec($sql) or die($db->errorInfo()[2]);

    //4. Kiem tra
    if ($count > 0) {
        unlink($link_anh);
        header('location:index.php?page=ds_sp');
    }
}
?>