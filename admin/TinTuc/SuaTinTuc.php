<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa tin tức</title>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];

            $sql = "SELECT tieu_de,anh,chi_tiet,hien_thi FROM tin_tuc WHERE id_tin_tuc=$ma";

            $old_row = $db->query($sql) or die($db->errorInfo()[2]);

            $old_r = $old_row->fetch();
            
            $old_tieu_de = $old_r[0];
            $old_link_anh="../img/$old_r[1]";
            $old_chi_tiet = $old_r[2];
            $old_ht = $old_r[3]; 
        }
        ?>
        <?php
    
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $tieu_de = $_POST['txtTieuDe'];
            $ct = $_POST['txtCT'];
            $ht = 0; 
            if(isset($_POST['cbHT']))
            {
                $ht=1;
            }
            
            //Ten anh
            $ten_anh = $_FILES['fHA']['name'];
            //kich thuoc (bytes)
            $kt = $_FILES['fHA']['size'];
            
            //Dinh dang => image/png, image/gif, image/jpg
            $dd = $_FILES['fHA']['type'];
          
            //2. Cau truy van
            
            if ($_FILES['fHA']['size'] == 0)
                $sql = "update tin_tuc set tieu_de='$tieu_de',chi_tiet='$ct',ngay_dang=curdate(),hien_thi='$ht' where id_tin_tuc=$ma";
            else
                $sql = "update tin_tuc set tieu_de='$tieu_de',anh='$ten_anh',chi_tiet='$ct',ngay_dang=curdate(),hien_thi='$ht' where id_tin_tuc=$ma";

            //3. Thuc thi
            $count = $db -> exec($sql);
            
            //4. Kiem tra
            if($_FILES['fHA']['size'] > 0) {
                unlink($old_link_anh);

                move_uploaded_file($_FILES['fHA']['tmp_name'], "../img/$ten_anh");
            }
            header('location:index.php?page=ds_tt');
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="box-title">Sửa tin tức</h3>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tiêu đề</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tiêu đề ..." name="txtTieuDe" value="<?php echo $old_tieu_de;?>">
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad" style="display: none;">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtCT" <?php echo $old_chi_tiet;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh</label>
                    <?php echo $old_r[1];?><input type="file" id="exampleInputFile" name="fHA">
                    <p class="help-block">Chọn đường dẫn đến file ảnh .</p>
                </div>
                <div class="checkbox">
                  <label>
                      <input type="checkbox" name="cbHT" <?php
                        if ($old_ht == 1) {
                            echo 'checked';
                        }
                        ?> <b>Hiển thị</b>
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