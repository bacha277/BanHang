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
            function check(ma, tt)
            {
                if (tt == 0) {
                    if (confirm('Bạn có chắc chắn muốn đặt lại trạng thái của liên hệ này ?') == true)
                    {
                        window.location = "index.php?page=xem_lh&ma=" + ma;
                    }

                }
            }
        </script>
    </head>
    <body>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách liên hệ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //2. Truy van
                        $sql = "SELECT id_lien_he,ho_ten,email,sdt,tieu_de,noi_dung,trang_thai FROM lien_he";

                        //3. Thuc thi
                        $rows = $db->query($sql);

                        $tt;
                        //4. Lay du lieu
                        foreach ($rows as $r) {
                            $tt = 'Chưa xem';
                            if ($r[6] == 1) {
                                $tt = 'Đã xem';
                            }
                            echo "<tr>"
                            . "<td>$r[0]</td>"
                            . "<td>$r[1]</td>"
                            . "<td>$r[2]</td>"
                            . "<td>$r[3]</td>"
                            . "<td>
                                <div class='box box-info' style='margin-top:-10px'>
                                        <div class='box-header'>
                                            <h3 class='box-title'>Tiêu đề : $r[4]</h3>
                                            <div class='pull-right box-tools'>
                                                <button type='button' class='btn btn-info btn-sm' data-widget='collapse'>
                                                    <i class='fa fa-minus'></i></button>
                                                <button type='button' class='btn btn-info btn-sm' data-widget='remove'>
                                                    <i class='fa fa-times'></i></button>
                                            </div>
                                        </div>
                                        <div class='box-body pad'  style='display: none;'>
                                            <textarea id='editor1' rows='10' cols='30' class='ckeditor' readonly>$r[5]</textarea>
                                        </div>
                                    </div>
                               </td>"
                            . "<td>$tt</td>"
                            . "<td>"
                            . "<a href='#' onclick='check($r[0],$r[6])'><i class='fa fa-eye' aria-hidden='true'></i></a>"
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