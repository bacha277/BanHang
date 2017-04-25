<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = str_replace("'", "", $_POST['txtUser']);
    $pass = md5($_POST['txtPass']);

    $sql = "select count(*),id_tai_khoan from tai_khoan where ten_dang_nhap='$user' and mat_khau = '$pass' and quyen=1";
    $rows = $db->query($sql);
    $r = $rows->fetch();
    if ($r[0] > 0) {
        //Luu session
        $_SESSION['userLoginSession'] = $r[1];

        header("location:index.php");
    } 
}
?>
<div class="center_content">
    <div class="center_title_bar">Đăng nhập</div>
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
                        <input type="submit" value="Đăng nhập"/>
                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'&&$r[0]==0) {
                        echo "<font style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng !</font>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>
