<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm sản phẩm</title>
       
    </head>
    <body>
        <?php
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];

            $sql = "SELECT ten_san_pham,anh_san_pham,thong_tin_ct,khuyen_mai,hien_thi,gia,id_danh_muc FROM san_pham WHERE id_san_pham=$ma";

            $old_row = $db->query($sql) or die($db->errorInfo()[2]);

            $old_r = $old_row->fetch();
            
            $old_ten_sp = $old_r[0];
            $old_link_anh="../img/$old_r[1]";
            $old_ct = $old_r[2];
            $old_km = $old_r[3];
            $old_ht = $old_r[4]; 
            $old_dg = $old_r[5];
            $old_madm = $old_r[6];
            
        }
        ?>
        <?php
    
        
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $ten_sp = $_POST['txtTenSP'];
            $dg = $_POST['txtDG'];
            $km = $_POST['txtKM'];
            $ct = $_POST['txtCT'];
            $madm = $_POST['slDM'];
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
            $sql = "update san_pham set ten_san_pham='$ten_sp',anh_san_pham='$ten_anh',thong_tin_ct='$ct',khuyen_mai='$km',hien_thi='$ht',gia=$dg,ngay_dang=curdate(),id_danh_muc=$madm where id_san_pham=$ma";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                //luu anh
                unlink($old_link_anh);
                
                move_uploaded_file($_FILES['fHA']['tmp_name'],"../img/$ten_anh");
                
                header('location:index.php?page=ds_sp');
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Thêm mới sản phẩm</h1>
            
            <table>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        <input type="text" name="txtTenSP" style="width: 500px" value="<?php echo $old_ten_sp;?>"/>
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
                    <td>Đơn giá</td>
                    <td>
                        <input type="text" name="txtDG" style="width: 100px" value="<?php echo $old_dg;?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Thông tin chi tiết
                    </td>
                    <td>
                        <textarea name="txtCT" class="ckeditor"><?php echo $old_ct;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Khuyến mãi
                    </td>
                    <td>
                        <textarea name="txtKM" class="ckeditor"><?php echo $old_km;?></textarea> 
                    </td>
                </tr>
                <tr>
                    <td>Hiển thị </td>
                    <td>
                        <input type="checkbox" name="cbHT" <?php 
                                       if ($old_ht==1) {
                                           echo 'checked';
                                       }
                        ?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Danh mục
                    </td>
                    <td>
                        <select name="slDM">
                            <?php
                            //2. Truy van
                            $sql = "select id_danh_muc, ten_danh_muc from danh_muc";

                            //3. Thuc thi
                            $rows = $db->query($sql);


                            //4. Lay du lieu
                            foreach ($rows as $rDanhMuc) {
                                if ($old_madm == $rDanhMuc[0]) {
                                    echo "<option value='$rDanhMuc[0]' selected>$rDanhMuc[1]</option>";
                                } else {
                                    echo "<option value='$rDanhMuc[0]'>$rDanhMuc[1]</option>";
                                }
                            }
                            ?>
                        </select>
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