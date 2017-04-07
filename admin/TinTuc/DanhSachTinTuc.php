<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách tin tức</title>
        <script>
            function check(ma,link_anh)
            {
                if (confirm('Bạn có chắc chắn muốn xóa tin tức này ?') == true)
                {
                    window.location = "index.php?page=xoa_tt&ma=" + ma +"&link_anh="+link_anh;
                }
            }
        </script>
    </head>
    <body>
        <h1>Danh sách tin tức</h1>
        <table border="1" width="600px">
            <tr>
                <th>Id</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Chi tiết</th>
                <th>Ngày đăng</th>
                <th>Hiển thị</th>
                <th>Thao tác</th>
            </tr>
            <?php
            //2. Truy van
            $sql = "SELECT id_tin_tuc,tieu_de,anh,chi_tiet,ngay_dang,hien_thi FROM tin_tuc";

            //3. Thuc thi
            $rows = $db->query($sql);


            //4. Lay du lieu
            foreach ($rows as $r) {
                $ht="Ẩn";
                if ($r[5]==1) {
                    $ht="Hiện";
                }
                $link_anh="../img/$r[2]";
                echo "<tr>"
                . "<td>$r[0]</td>"
                . "<td>$r[1]</td>"
                . "<td><img src='$link_anh' width='100px'/></td>"
                . "<td>$r[3]</td>"
                . "<td>$r[4]</td>"
                . "<td>$ht</td>"
                . "<td>"
                . "<a href='#' onclick='check($r[0],\"$link_anh\")'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"
                . "<a href='index.php?page=sua_tt&ma=$r[0]'><i class='fa fa-pencil' aria-hidden='true'></i></a>"
                . "</td>"
                . "</tr>";
            }
            ?>
        </table>
    </body>
</html>