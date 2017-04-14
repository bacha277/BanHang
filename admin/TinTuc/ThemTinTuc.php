<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm tin tức</title>
       
    </head>
    <body>
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
            $sql = "insert into tin_tuc(tieu_de,anh,chi_tiet,ngay_dang,hien_thi) values('$tieu_de','$ten_anh','$ct',curdate(),'$ht')";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                //luu anh
                move_uploaded_file($_FILES['fHA']['tmp_name'],"../img/$ten_anh");
                
                header('location:index.php?page=ds_tt');
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="box-title">Thêm tin tức</h3>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tiêu đề</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tiêu đề ..." name="txtTieuDe">
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body pad">
                        <textarea id="editor1" rows="10" cols="80" class="ckeditor" name="txtCT"></textarea>
                    </div>
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