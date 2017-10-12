<link rel="stylesheet" type="text/css"  href="css/contact.css">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $title = $_POST['txtTitle'];
    $content = $_POST['areaContent'];

    $sql = "insert into lien_he (ho_ten, email,sdt,tieu_de,noi_dung) values('$name','$email','$phone','$title','$content')";

    $c = $db->exec($sql) or die($db->errorInfo()[2]);

    if ($c > 0) {
        header('location:index.php?page=contact_success');
    }
}
?>
<div class="center_content">
    <div class="container" id="ct">  
        <form id="contact" action="" method="post">
            <h3>Gửi liên hệ</h3>
            <h4>Hãy liên hệ với chúng tôi !</h4>
            <fieldset>
                <input placeholder="Họ tên" type="text" tabindex="1" required autofocus name="txtName" value="<?php
                                                                                        if (isset($ho_ten)) {
                                                                                            echo $ho_ten;
                                                                                        }
                                                                                       ?>">
            </fieldset>
            <fieldset>
                <input placeholder="Email" type="email" tabindex="2" required name="txtEmail" value="<?php
                                                                                        if (isset($email)) {
                                                                                            echo $email;
                                                                                        }
                                                                                       ?>">
            </fieldset>
            <fieldset>
                <input placeholder="Số điện thoại (Không bắt buộc)" type="tel" tabindex="3" name="txtPhone" value="<?php
                                                                                        if (isset($sdt)) {
                                                                                            echo $sdt;
                                                                                        }
                                                                                       ?>">
            </fieldset>
            <fieldset>
                <input placeholder="Tiêu đề" type="text" tabindex="4" required name="txtTitle">
            </fieldset>
            <fieldset>
                <textarea placeholder="Nội dung" tabindex="5" required name="areaContent"></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" value="Gửi" type="submit" id="contact-submit" data-submit="...Đang gửi">Gửi</button>
            </fieldset>
        </form>
    </div>
</div>


