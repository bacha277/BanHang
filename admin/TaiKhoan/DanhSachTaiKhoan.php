<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách tài khoản</title>
    </head>
    <body>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Số đơn hàng đã đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //2. Truy van
                        $sql = "select id_tai_khoan,ten_dang_nhap,ho_ten,email,sdt,dia_chi,COUNT(*) FROM tai_khoan NATURAL JOIN don_hang where quyen=1 GROUP BY id_tai_khoan";

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
                            . "<td>$r[6]</td>"
                            . "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>