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

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm mới danh mục</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" placeholder="Nhập tên danh mục ..." name="txtTenDM">
                    </div>

                    <div class="form-group">
                        <label>Danh mục cha</label>
                        <select name="slDanhMucCha" class="form-control">
                            <option value='0'>Không có</option>
                            <?php
                            $sql = "SELECT id_danh_muc,ten_danh_muc FROM danh_muc where id_danh_muc_cha=0";
                            $rows = $db->query($sql);
                            foreach ($rows as $r) {
                                echo "<option value='$r[0]'>$r[1]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Thêm mới"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>