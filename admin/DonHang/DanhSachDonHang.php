<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách đơn hàng</title>
        <script>
            function check(ma,tt)
            {
                if (tt == 0) {
                    if (confirm('Bạn có chắc chắn muốn đặt lại trạng thái của đơn hàng này ?') == true)
                    {
                        window.location = "index.php?page=xl_dh&ma=" + ma;
                    }

                }
            }
        </script>
    </head>
    <body>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách đơn hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tài khoản đặt hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ghi chú</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //2. Truy van
                        $sql = "SELECT id_don_hang,ten_dang_nhap,sdt,email,ghi_chu,tong_tien,ngay,trang_thai FROM don_hang NATURAL JOIN tai_khoan";

                        //3. Thuc thi
                        $rows = $db->query($sql);


                        //4. Lay du lieu
                        foreach ($rows as $r) {
                            $tt = "Chưa xử lý";
                            if ($r[7] == 1) {
                                $tt = "Đã xử lý";
                            }
                            echo "<tr>"
                            . "<td>$r[0]</td>"
                            . "<td>$r[1]</td>"
                            . "<td>$r[2]</td>"
                            . "<td>$r[3]</td>"
                            . "<td>$r[4]</td>"
                            . "<td>".number_format($r[5])."</td>"
                            . "<td>$r[6]</td>"
                            . "<td>$tt</td>"
                            . "<td>"
                            . "<a href='index.php?page=dh_ct&ma=$r[0]'><i class='fa fa-info-circle' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                            . "<a href='#' onclick='check($r[0],$r[7])'><i class='fa fa-check-circle' aria-hidden='true'></i></a>"
                            . "</td>"
                            . "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>