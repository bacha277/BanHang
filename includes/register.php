<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['txtUser'];
    $pass = md5($_POST['txtPass']);
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $addr = $_POST['txtAddr'];

    $sqlCheck = "select * from tai_khoan where ten_dang_nhap='$user'";
    $count=$db->query($sqlCheck)->fetch()[0];
    if ($count==0) {
        $sql = "insert into tai_khoan (ten_dang_nhap, mat_khau,ho_ten,email,sdt,dia_chi,quyen) values('$user','$pass','$name','$email','$phone','$addr',1)";

        $c = $db->exec($sql) or die($db->errorInfo()[2]);

        if ($c > 0) {
            header('location:index.php?page=register_success');
        }
    }
}
?>
<div class="center_content">
    <div class="center_title_bar">Đăng ký tài khoản người dùng</div>
    <form action="" method="post">
        <div class="prod_box_big">
            <div class="center_prod_box_big">
                <div class="contact_form">
                    <div class="form_row">
                        <label class="contact"><strong>Tên đăng nhập</strong></label>
                        <input type="text" class="contact_input" name="txtUser"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Mật khẩu</strong></label>
                        <input type="password" class="contact_input" name="txtPass"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Họ tên</strong></label>
                        <input type="text" class="contact_input" name="txtName"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Email</strong></label>
                        <input type="email" class="contact_input" name="txtEmail"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Số điện thoại</strong></label>
                        <input type="text" class="contact_input" name="txtPhone"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Địa chỉ</strong></label>
                        <input type="text" class="contact_input" name="txtAddr"/>
                    </div>
                    <div class="form_row"><input type="submit" value="Gửi"/></div>
                </div>
            </div>
        </div>
    </form>
</div>
