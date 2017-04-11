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
            $sql = "insert into san_pham(ten_san_pham,anh_san_pham,thong_tin_ct,khuyen_mai,hien_thi,gia,ngay_dang,id_danh_muc) values('$ten_sp','$ten_anh','$ct','$km','$ht',$dg,curdate(),$madm)";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                //luu anh
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
                        <input type="text" name="txtTenSP" style="width: 500px"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Hình ảnh
                    </td>
                    <td>
                        <input type="file" name="fHA"/>
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td>
                        <input type="text" name="txtDG" style="width: 100px"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Thông tin chi tiết
                    </td>
                    <td>
                        <textarea name="txtCT" class="ckeditor"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Khuyến mãi
                    </td>
                    <td>
                        <textarea name="txtKM" class="ckeditor"></textarea> 
                    </td>
                </tr>
                <tr>
                    <td>Hiển thị </td>
                    <td>
                        <input type="checkbox" name="cbHT" />
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
                            $sql = "select id_danh_muc, ten_danh_muc , id_danh_muc_cha from danh_muc";

                            //3. Thuc thi
                            $rows = $db->query($sql)->fetchAll();
                            
                            //4. Lay du lieu
                            foreach ($rows as $r) 
                            {
                                if ($r[2]==0) {
                                    echo "<option value='$r[0]'>$r[1]</option>";
                                    foreach ($rows as $r1) {
                                        if ($r1[2]==$r[0]) {
                                            echo "<option value='$r1[0]'>&nbsp;&nbsp;&nbsp;&nbsp;$r1[1]</option>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnSubmit" value="Thêm mới"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>