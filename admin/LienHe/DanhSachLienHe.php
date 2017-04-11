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
        <script>
            function check(ma,tt)
            {
                if (tt==0) {
                    if (confirm('Bạn có chắc chắn muốn đặt lại trạng thái của liên hệ này ?') == true)
                    {
                        window.location = "index.php?page=xem_lh&ma=" + ma;
                    }
    
                }
            }
        </script>
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
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            <?php
            //2. Truy van
            $sql = "SELECT id_lien_he,ho_ten,email,sdt,tieu_de,noi_dung,trang_thai FROM lien_he";

            //3. Thuc thi
            $rows = $db->query($sql);
               
            $tt;
            //4. Lay du lieu
            foreach ($rows as $r) {
                $tt='Chưa xem';
                if ($r[6]==1) {
                    $tt='Đã xem';
                }
                echo "<tr>"
                . "<td>$r[0]</td>"
                . "<td>$r[1]</td>"
                . "<td>$r[2]</td>"
                . "<td>$r[3]</td>"
                . "<td>$r[4]</td>"
                . "<td>$r[5]</td>"
                . "<td>$tt</td>"
                . "<td>"
                . "<a href='#' onclick='check($r[0],$r[6])'><i class='fa fa-eye' aria-hidden='true'></i></a>"
                . "</td>"
                . "</tr>";
            }
            ?>
        </table>
    </body>
</html>