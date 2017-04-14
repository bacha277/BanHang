<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm sản phẩm</title>
    </head>
    <body>
        <?php
    
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $ten_sp = $_POST['txtTenSP'];
            $dg = $_POST['txtDG'];
            $km = $_POST['txtKM'];
            $ct = $_POST['txtCT'];
            $madm = $_POST['slDM'];
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
            $sql = "insert into san_pham(ten_san_pham,anh_san_pham,thong_tin_ct,khuyen_mai,hien_thi,gia,ngay_dang,id_danh_muc) values('$ten_sp','$ten_anh','$ct','$km','$ht',$dg,curdate(),$madm)";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                //luu anh
                move_uploaded_file($_FILES['fHA']['tmp_name'],"../img/$ten_anh");
                
                header('location:index.php?page=ds_sp');
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="box-title">Thêm sản phẩm</h3>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm ..." name="txtTenSP">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Đơn giá</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập đơn giá ..." name="txtDG">
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin chi tiết</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad" style="display: none;">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtCT"></textarea>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Khuyến mãi</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad" style="display: none;">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtKM"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="slDM" class="form-control">
                        <?php
                            //2. Truy van
                            $sql = "select id_danh_muc, ten_danh_muc , id_danh_muc_cha from danh_muc";

                            //3. Thuc thi
                            $rows = $db->query($sql)->fetchAll();
                            
                            //4. Lay du lieu
                            foreach ($rows as $r) 
                            {
                                if ($r[2]==0) {
                                    echo "<option value='$r[0]'>$r[1]</option>";
                                    foreach ($rows as $r1) {
                                        if ($r1[2]==$r[0]) {
                                            echo "<option value='$r1[0]'>&nbsp;&nbsp;&nbsp;&nbsp;$r1[1]</option>";
                                        }
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh</label>
                    <input type="file" id="exampleInputFile" name="fHA">
                    <p class="help-block">Chọn đường dẫn đến file ảnh .</p>
                </div>
                <div class="checkbox">
                  <label>
                      <input type="checkbox" name="cbHT"> <b>Hiển thị</b>
                  </label>
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Thêm mới"/>
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