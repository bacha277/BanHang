<link rel="stylesheet" type="text/css" href="css/contact.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['txtUser'];
    $pass = md5($_POST['txtPass']);
    $repass = md5($_POST['txtRePass']);
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $addr = $_POST['txtAddr'];

    $sqlCheck = "select * from tai_khoan where ten_dang_nhap='$user'";
    $count=$db->query($sqlCheck)->fetch()[0];
    
    if ($count>0) {
        $idError=1;
    }
    if ($pass != $repass) {
        $rePassError=1;
    }
    
    if (!isset($idError)&&!isset($rePassError)) {
        $sql = "insert into tai_khoan (ten_dang_nhap, mat_khau,ho_ten,email,sdt,dia_chi,quyen) values('$user','$pass','$name','$email','$phone','$addr',1)";

        $c = $db->exec($sql) or die($db->errorInfo()[2]);

        if ($c > 0) {
            header('location:index.php?page=register_success');
        }
    }
}
?>
<div class="center_content">
    <div class="container" id="ct">  
        <form id="contact" action="" method="post">
            <h3>Đăng ký tài khoản</h3>
            <h4>Hãy đăng ký để có thể sử dụng tất cả các tính năng !</h4>
            <fieldset>
                <?php
                if (isset($idError)) {
                    echo '<span style="color:red">Tên đăng nhập đã tồn tại</span>';
                }
                ?>
                <input placeholder="Tên đăng nhập" type="text" tabindex="1" required autofocus name="txtUser">
            </fieldset>
            <fieldset>
                <input placeholder="Mật khẩu" type="password" tabindex="2" required name="txtPass">
            </fieldset>
            <fieldset>
                <?php
                if (isset($idError)) {
                    echo '<span style="color:red">Mật khẩu không trùng khớp</span>';
                }
                ?>
                <input placeholder="Nhập lại mật khẩu" type="password" tabindex="2" required name="txtRePass">
            </fieldset>
            <fieldset>
                <input placeholder="Họ tên" type="text" tabindex="2" required name="txtName">
            </fieldset>
            <fieldset>
                <input placeholder="Email" type="email" tabindex="2" required name="txtEmail">
            </fieldset>
            <fieldset>
                <input placeholder="Số điện thoại" type="tel" tabindex="2" required name="txtPhone">
            </fieldset>
            <fieldset>
                <textarea placeholder="Địa chỉ" tabindex="5" required name="txtAddr"></textarea>
            </fieldset>
            <div class="g-recaptcha" data-sitekey="6Le0_DcUAAAAAPkm_Cz47n1giNH3hm-Pm43ySHGo"></div>
            <fieldset>
                <button name="submit" value="Đăng ký" type="submit" id="contact-submit" data-submit="...Đang xử lý">Đăng ký</button>
            </fieldset>
        </form>
    </div>
</div>
