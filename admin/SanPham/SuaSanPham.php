<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa sản phẩm</title>

    </head>
    <body>
        <?php
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];

            $sql = "SELECT ten_san_pham,anh_san_pham,thong_tin_ct,khuyen_mai,hien_thi,gia,id_danh_muc FROM san_pham WHERE id_san_pham=$ma";

            $old_row = $db->query($sql) or die($db->errorInfo()[2]);

            $old_r = $old_row->fetch();

            $old_ten_sp = $old_r[0];
            $old_link_anh = "../img/$old_r[1]";
            $old_ct = $old_r[2];
            $old_km = $old_r[3];
            $old_ht = $old_r[4];
            $old_dg = $old_r[5];
            $old_madm = $old_r[6];
        }
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_sp = $_POST['txtTenSP'];
            $dg = $_POST['txtDG'];
            $km = $_POST['txtKM'];
            $ct = $_POST['txtCT'];
            $madm = $_POST['slDM'];
            $ht = 0;
            if (isset($_POST['cbHT'])) {
                $ht = 1;
            }

            //Ten anh
            $ten_anh = $_FILES['fHA']['name'];
            //kich thuoc (bytes)
            $kt = $_FILES['fHA']['size'];

            //Dinh dang => image/png, image/gif, image/jpg
            $dd = $_FILES['fHA']['type'];

            //2. Cau truy van

            if ($_FILES['fHA']['size'] == 0)
                $sql = "update san_pham set ten_san_pham='$ten_sp',thong_tin_ct='$ct',khuyen_mai='$km',hien_thi='$ht',gia=$dg,ngay_dang=curdate(),id_danh_muc=$madm where id_san_pham=$ma";
            else
                $sql = "update san_pham set ten_san_pham='$ten_sp',anh_san_pham='$ten_anh',thong_tin_ct='$ct',khuyen_mai='$km',hien_thi='$ht',gia=$dg,ngay_dang=curdate(),id_danh_muc=$madm where id_san_pham=$ma";

            //3. Thuc thi
            $count = $db->exec($sql);

            //luu anh
            if ($_FILES['fHA']['size'] > 0) {
                unlink($old_link_anh);

                move_uploaded_file($_FILES['fHA']['tmp_name'], "../img/$ten_anh");
            }

            header('location:index.php?page=ds_sp');
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="box-title">Sửa sản phẩm</h3>

            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm ..." name="txtTenSP" value="<?php echo $old_ten_sp; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn giá</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập đơn giá ..." name="txtDG" value="<?php echo $old_dg; ?>">
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin chi tiết</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtCT"><?php echo $old_ct; ?></textarea>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Khuyến mãi</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtKM"><?php echo $old_km; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="slDM" class="form-control">
                        <?php
                        //2. Truy van
                        $sql = "select id_danh_muc, ten_danh_muc from danh_muc";

                        //3. Thuc thi
                        $rows = $db->query($sql);


                        //4. Lay du lieu
                        foreach ($rows as $rDanhMuc) {
                            if ($old_madm == $rDanhMuc[0]) {
                                echo "<option value='$rDanhMuc[0]' selected>$rDanhMuc[1]</option>";
                            } else {
                                echo "<option value='$rDanhMuc[0]'>$rDanhMuc[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh</label>
                        <?php echo $old_r[1]; ?><input type="file" id="exampleInputFile" name="fHA">
                    <p class="help-block">Chọn đường dẫn đến file ảnh .</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="cbHT" <?php
                    if ($old_ht == 1) {
                        echo 'checked';
                    }
                    ?>> <b>Hiển thị</b>
                    </label>
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Cập nhật"/>
                </div>
            </div>


        </form>
        <script src="../css/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../css/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../css/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../css/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../css/dist/js/demo.js"></script>
        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>