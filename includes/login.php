<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = str_replace("'", "", $_POST['txtUser']);
    $pass = md5($_POST['txtPass']);

    $sql = "select count(*),id_tai_khoan,quyen from tai_khoan where ten_dang_nhap='$user' and mat_khau = '$pass'";
    $rows = $db->query($sql);
    $r = $rows->fetch();
    if ($r[0] > 0) {
        //Luu session
        $_SESSION['userLoginSession'] = $r[1];
        if ($r[2]==0||$r[2]==2) {
            $_SESSION['admin']=1;
        }

        header("location:index.php");
    } 
}
?>



<div class="center_content">
    <div class="center_title_bar">Đăng nhập</div>

    <form action="" method="post">
        <div class="prod_box_big">
            <div class="login-page" id="login">
                <div class="form">
                    <form class="login-form">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $r[0] == 0) {
                            echo "<font style='color:red'>Tên đăng nhập hoặc mật khẩu không đúng !</font>";
                        }
                        ?>
                        <input type="text" placeholder="Tên đăng nhập" name="txtUser" required/>
                        <input type="password" placeholder="Mật khẩu" name="txtPass" required/>
                        <button>Đăng nhập</button>
                        <p class="message">Bạn chưa đăng ký? <a href="index.php?page=register">Đăng ký ngay</a></p>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
