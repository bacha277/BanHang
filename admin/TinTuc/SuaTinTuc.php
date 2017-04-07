<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa tin tức</title>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];

            $sql = "SELECT tieu_de,anh,chi_tiet,hien_thi FROM tin_tuc WHERE id_tin_tuc=$ma";

            $old_row = $db->query($sql) or die($db->errorInfo()[2]);

            $old_r = $old_row->fetch();
            
            $old_tieu_de = $old_r[0];
            $old_link_anh="../img/$old_r[1]";
            $old_chi_tiet = $old_r[2];
            $old_ht = $old_r[3]; 
        }
        ?>
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
            $sql = "update tin_tuc set tieu_de='$tieu_de',anh='$ten_anh',chi_tiet='$ct',ngay_dang=curdate(),hien_thi='$ht' where id_tin_tuc=$ma";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                unlink($old_link_anh);
                
                move_uploaded_file($_FILES['fHA']['tmp_name'],"../img/$ten_anh");
                
                header('location:index.php?page=ds_tt');
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Sửa tin tức</h1>
            
            <table>
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="text" name="txtTieuDe" style="width: 500px" value="<?php echo $old_tieu_de;?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Hình ảnh
                    </td>
                    <td>
                        <?php echo $old_r[1];?><input type="file" name="fHA"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Chi tiết
                    </td>
                    <td>
                        <textarea name="txtCT" class="ckeditor"><?php echo $old_chi_tiet;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Hiển thị </td>
                    <td>
                        <input type="checkbox" name="cbHT" <?php
                        if ($old_ht == 1) {
                            echo 'checked';
                        }
                        ?>/>
                    </td>
                </tr>                
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnSubmit" value="Cập nhật"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>