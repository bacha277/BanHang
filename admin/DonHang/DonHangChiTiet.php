<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đơn hàng chi tiết</title>
    </head>
    <body>
        <?php

        //Lay gia tri tham so
        if (isset($_REQUEST['ma'])) {
            $ma = $_REQUEST['ma'];
        }
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Chi tiết đơn hàng <?php echo $ma;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //2. Truy van
                        $sql = "SELECT ten_san_pham,anh_san_pham,so_luong,don_gia FROM san_pham NATURAL JOIN don_hang_ct where id_don_hang=$ma";

                        //3. Thuc thi
                        $rows = $db->query($sql);

                        //4. Lay du lieu
                        foreach ($rows as $r) {
                            echo "<tr>"
                            . "<td>$r[0]</td>"
                            . "<td><img src='../img/$r[1]' width='100px'/></td>"
                            . "<td>$r[2]</td>"
                            . "<td>".number_format($r[3])."</td>"
                            . "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>