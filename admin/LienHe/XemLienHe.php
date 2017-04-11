<?php

//Lay gia tri tham so
if (isset($_REQUEST['ma'])) {
    $ma = $_REQUEST['ma'];



    //2. Cau truy van
    $sql = "update lien_he set trang_thai='1' where id_lien_he=$ma";


    //3. Thuc thi
    $count = $db->exec($sql) or die($db->errorInfo()[2]);

    //4. Kiem tra
    if ($count > 0) {
        header('location:index.php?page=ds_lh');
    }
}
?>