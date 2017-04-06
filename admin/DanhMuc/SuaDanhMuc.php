<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa danh mục</title>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];

            $sql = "SELECT a.ten_danh_muc,b.id_danh_muc FROM danh_muc a LEFT JOIN danh_muc b ON a.id_danh_muc_cha=b.id_danh_muc WHERE a.id_danh_muc=$ma";

            $old_row = $db->query($sql) or die($db->errorInfo()[2]);

            $old_r = $old_row->fetch();
        }
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['txtTenDM'];
            $id_dmc = $_POST['slDanhMucCha'];

            $sql = "update danh_muc set ten_danh_muc='$ten' , id_danh_muc_cha=$id_dmc where id_danh_muc=$ma";


            $count = $db->exec($sql) or die($db->errorInfo()[2]);

            if ($count > 0) {
                header('location:index.php?page=ds_dm');
            }
        }
        ?>
        <form action="" method="post">
            <h1>Cập nhật thông tin danh mục</h1>

            <table>
                <tr>
                    <td>Tên danh mục </td>
                    <td>
                        <input type="text" name="txtTenDM" value="<?php echo "$old_r[0]"; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Danh mục cha </td>
                    <td>
                        <select name="slDanhMucCha">
                            <option value='0'>Không có</option>
                            <?php
                            $sql = "SELECT id_danh_muc,ten_danh_muc FROM danh_muc";
                            $rows = $db->query($sql);
                            foreach ($rows as $r) {
                                if ($r[0] == $old_r[1]) {
                                    echo "<option value='$r[0]' selected>$r[1]</option>";
                                } else {
                                    echo "<option value='$r[0]'>$r[1]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnSubmit" value="Cập nhật"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>