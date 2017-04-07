<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách sản phẩm</title>
        <script>
            function check(ma,link_anh)
            {
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?') == true)
                {
                    window.location = "index.php?page=xoa_sp&ma=" + ma +"&link_anh="+link_anh;
                }
            }
        </script>
    </head>
    <body>
        <h1>Danh sách sản phẩm</h1>
        <table border="1" width="600px">
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Thông tin chi tiết</th>
                <th>Khuyến mãi</th>
                <th>Hiển thị</th>
                <th>Giá</th>
                <th>Ngày đăng</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>
            <?php
            //2. Truy van
            $sql = "SELECT id_san_pham,ten_san_pham,anh_san_pham,thong_tin_ct,khuyen_mai,hien_thi,gia,ngay_dang,ten_danh_muc FROM san_pham NATURAL JOIN danh_muc";

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
                . "<td>$r[6]</td>"
                . "<td>$r[7]</td>"
                . "<td>$r[8]</td>"
                . "<td>"
                . "<a href='#' onclick='check($r[0],\"$link_anh\")'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"
                . "<a href='index.php?page=sua_sp&ma=$r[0]'><i class='fa fa-pencil' aria-hidden='true'></i></a>"
                . "</td>"
                . "</tr>";
            }
            ?>
        </table>
    </body>
</html>