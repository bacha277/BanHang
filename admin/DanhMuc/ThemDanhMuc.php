<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm mới danh mục</title>
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['txtTenDM'];
            $id_dmc = $_POST['slDanhMucCha'];

            $sql = "insert into danh_muc (ten_danh_muc, id_danh_muc_cha) values('$ten',$id_dmc)";


            $count = $db->exec($sql) or die($db->errorInfo()[2]);

            if ($count > 0) {
                header('location:index.php?page=ds_dm');
            }
        }
        ?>
        <form action="" method="post">
            <h1>Thêm mới danh mục</h1>

            <table>
                <tr>
                    <td>Tên danh mục </td>
                    <td>
                        <input type="text" name="txtTenDM"/>
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
                                echo "<option value='$r[0]'>$r[1]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnSubmit" value="Thêm mới"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>