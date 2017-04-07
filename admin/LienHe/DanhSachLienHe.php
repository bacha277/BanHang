<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách liên hệ</title>
    </head>
    <body>
        <h1>Danh sách liên hệ</h1>
        <table border="1" width="600px">
            <tr>
                <th>Id</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
            </tr>
            <?php
            //2. Truy van
            $sql = "SELECT id_lien_he,ho_ten,email,sdt,tieu_de,noi_dung FROM lien_he";

            //3. Thuc thi
            $rows = $db->query($sql);


            //4. Lay du lieu
            foreach ($rows as $r) {
                echo "<tr>"
                . "<td>$r[0]</td>"
                . "<td>$r[1]</td>"
                . "<td>$r[2]</td>"
                . "<td>$r[3]</td>"
                . "<td>$r[4]</td>"
                . "<td>$r[5]</td>"
                . "</tr>";
            }
            ?>
        </table>
    </body>
</html>