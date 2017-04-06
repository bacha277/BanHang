<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách danh mục</title>
        <script>
            function check(madm, so_sp)
            {
                if (so_sp > 0)
                {
                    alert("Tồn tại sản phẩm trong danh mục , không thể xóa !");
                }
                else
                {
                    if (confirm('Bạn có chắc chắn muốn xóa danh mục này ?') == true)
                    {
                        window.location = "index.php?page=xoa_dm&ma=" + madm;
                    }
                }
            }
        </script>
    </head>
    <body>
        <h1>Danh sách danh mục</h1>
        <table border="1" width="600px">
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Tên danh mục cha</th>
                <th>Số sản phẩm</th>
                <th>Thao tác</th>
            </tr>
            <?php
            //2. Truy van
            $sql = "SELECT a.id_danh_muc,a.ten_danh_muc,b.ten_danh_muc,COUNT(san_pham.id_san_pham) FROM danh_muc a LEFT JOIN danh_muc b ON a.id_danh_muc_cha=b.id_danh_muc LEFT JOIN san_pham ON a.id_danh_muc=san_pham.id_danh_muc GROUP BY id_danh_muc";

            //3. Thuc thi
            $rows = $db->query($sql);


            //4. Lay du lieu
            foreach ($rows as $r) {
                echo "<tr>"
                . "<td>$r[0]</td>"
                . "<td>$r[1]</td>"
                . "<td>$r[2]</td>"
                . "<td>$r[3]</td>"
                . "<td>"
                . "<a href='#' onclick='check($r[0],$r[3])'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"
                . "<a href='index.php?page=sua_dm&ma=$r[0]'><i class='fa fa-pencil' aria-hidden='true'></i></a>"
                . "</td>"
                . "</tr>";
            }
            ?>
        </table>
    </body>
</html>