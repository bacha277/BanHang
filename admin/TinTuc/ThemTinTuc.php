<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thêm tin tức</title>
       
    </head>
    <body>
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
            $sql = "insert into tin_tuc(tieu_de,anh,chi_tiet,ngay_dang,hien_thi) values('$tieu_de','$ten_anh','$ct',curdate(),'$ht')";
            
            
            //3. Thuc thi
            $count = $db -> exec($sql) or die($db->errorInfo()[2]);
            
            //4. Kiem tra
            if($count>0)
            {
                //luu anh
                move_uploaded_file($_FILES['fHA']['tmp_name'],"../img/$ten_anh");
                
                header('location:index.php?page=ds_tt');
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Thêm mới tin tức</h1>
            
            <table>
                <tr>
                    <td>Tiêu đề</td>
                    <td>
                        <input type="text" name="txtTieuDe" style="width: 500px"/>
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
                    <td>
                        Chi tiết
                    </td>
                    <td>
                        <textarea name="txtCT" class="ckeditor"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Hiển thị </td>
                    <td>
                        <input type="checkbox" name="cbHT" />
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