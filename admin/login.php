<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Đăng nhập vào trang quản trị</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="css/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="css/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="css/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="css/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="css/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="css/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="css/plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <script src="../ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        //1. connect
        include '../connect.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $user = str_replace("'","",$_POST['txtUser']);
            $pass = md5($_POST['txtPass']);
            
            $sql = "select count(*),ho_ten,quyen from tai_khoan where ten_dang_nhap='$user' and mat_khau = '$pass' and (quyen=0 or quyen=2)";
            $rows=$db->query($sql);
            $r=$rows->fetch();
            if ($r[0] > 0) {
                //Luu session
                $_SESSION['loginSession'] = $r[1];
                if ($r[2]==0) {
                    $_SESSION['role']=$r[2];
                }

                header("location:index.php");
            }
        }
        ?>
        <div class="box box-primary" style="width:450px; margin: auto; margin-top: 150px">
            <div class="box-header with-border">
                <h3 class="box-title">Đăng nhập</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" name="txtUser" class="form-control" id="exampleInputEmail1" placeholder="Tên đăng nhập"
                               <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" name="txtPass" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
            </form>
        </div>
    </body>
</html>
