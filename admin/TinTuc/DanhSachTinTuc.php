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
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách tin tức</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Ngày đăng</th>
                            <th>Hiển thị</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //2. Truy van
                        $sql = "SELECT id_tin_tuc,tieu_de,anh,chi_tiet,ngay_dang,hien_thi FROM tin_tuc";

                        //3. Thuc thi
                        $rows = $db->query($sql);


                        //4. Lay du lieu
                        foreach ($rows as $r) {
                            $ht = "Ẩn";
                            if ($r[5] == 1) {
                                $ht = "Hiện";
                            }
                            $link_anh = "../img/$r[2]";
                            echo "<tr>"
                            . "<td>$r[0]</td>"
                            . "<td>$r[1]</td>"
                            . "<td><img src='$link_anh' width='100px'/></td>"
                            . "<td>$r[4]</td>"
                            . "<td>$ht</td>"
                            . "<td>"
                            . "<a href='#' onclick='check($r[0],\"$link_anh\")'><i class='fa fa-trash-o' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                            . "<a href='index.php?page=sua_tt&ma=$r[0]'><i class='fa fa-pencil' aria-hidden='true'></i></a>"
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