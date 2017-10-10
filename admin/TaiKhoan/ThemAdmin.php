<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['txtId'];
    $pass = md5($_POST['txtPass']);
    $repass = $_POST['txtRePass'];
    $name = $_POST['txtName'];

    //2. Cau truy van
    $sql = "insert into tai_khoan(ten_dang_nhap,mat_khau,ho_ten,quyen) values('$id','$pass','$name',2)";
    
    $check_exist_sql="SELECT COUNT(*) FROM tai_khoan WHERE ten_dang_nhap='$id'";
    $rows = $db->query($check_exist_sql);
    $r=$rows->fetch();
    if ($r[0]>0) {
        $idError=1;
    }
    if ($pass != md5($repass)) {
        $rePassError=1;
    }
    if (!isset($idError)&&!isset($rePassError)) {
        //3. Thuc thi
        $count = $db->exec($sql) or die($db->errorInfo()[2]);
    }
    //4. Kiem tra
    if (isset($count)&&$count > 0) {
        header('location:index.php?page=ds_tk');
    }
}
?>
<div class="box box-info" style="width: 60%;margin: 0 auto;">
    <div class="box-header with-border">
        <h3 class="box-title">Thêm admin</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST">
        <div class="box-body">
            <div class="form-group">
                <label for="txtName" class="col-sm-2 control-label">Họ tên</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtName" placeholder="Họ tên" style="width: 90%" name="txtName">
                </div>
            </div>
            <div class="form-group">
                <label for="txtId" class="col-sm-2 control-label">Tên đăng nhập</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtId" placeholder="Tên đăng nhập" style="width: 90%" name="txtId">
                    <?php
                    if (isset($idError)) {
                        echo '<h5 style="color:red">Tên đăng nhập đã tồn tại</h5>';
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="txtPass" class="col-sm-2 control-label">Mật khẩu</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtPass" placeholder="Mật khẩu" style="width: 90%" name="txtPass">
                </div>
            </div>

            <div class="form-group">
                <label for="txtRePass" class="col-sm-2 control-label">Nhập lại mật khẩu</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtRePass" placeholder="Nhập lại mật khẩu" style="width: 90%" name="txtRePass">
                    <?php
                    if (isset($rePassError)) {
                        echo '<h5 style="color:red">Mật khẩu không trùng khớp</h5>';
                    }
                    ?>
                </div>
            </div>
            
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="reset" class="btn btn-default" >Reset</button>
            <button type="submit" class="btn btn-info pull-right">Thêm</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>