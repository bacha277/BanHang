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
    <div class="center_title_bar">Gửi liên hệ</div>
    <form action="" method="post">
        <div class="prod_box_big">
            <div class="center_prod_box_big">
                <div class="contact_form">
                    <div class="form_row">
                        <label class="contact"><strong>Họ tên</strong></label>
                        <input type="text" class="contact_input" name="txtName" value="<?php
                                                                                        if (isset($ho_ten)) {
                                                                                            echo $ho_ten;
                                                                                        }
                                                                                       ?>"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Email</strong></label>
                        <input type="text" class="contact_input" name="txtEmail" value="<?php
                                                                                        if (isset($email)) {
                                                                                            echo $email;
                                                                                        }
                                                                                       ?>"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Số điện thoại</strong></label>
                        <input type="text" class="contact_input" name="txtPhone" value="<?php
                                                                                        if (isset($sdt)) {
                                                                                            echo $sdt;
                                                                                        }
                                                                                       ?>"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Tiêu đề</strong></label>
                        <input type="text" class="contact_input" name="txtTitle"/>
                    </div>
                    <div class="form_row">
                        <label class="contact"><strong>Nội dung</strong></label>
                        <textarea class="contact_textarea" style="width: 100%" name="areaContent"></textarea>
                    </div>
                    <div class="form_row"><input type="submit" value="Gửi"/></div>
                </div>
            </div>
        </div>
    </form>
</div>
