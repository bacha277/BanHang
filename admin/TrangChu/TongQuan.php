<?php
    $don_hang_query='SELECT COUNT(*) FROM don_hang WHERE trang_thai=0';
    $lien_he_query='SELECT COUNT(*) FROM lien_he WHERE trang_thai=0';
    $tai_khoan_query='SELECT COUNT(*) FROM tai_khoan WHERE quyen=1';
    $san_pham_query='SELECT COUNT(*) FROM san_pham';
    
    $don_hang = $db->query($don_hang_query)->fetch()[0];
    $lien_he = $db->query($lien_he_query)->fetch()[0];
    $tai_khoan = $db->query($tai_khoan_query)->fetch()[0];
    $san_pham = $db->query($san_pham_query)->fetch()[0];
?>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $don_hang;?></h3>

                    <p>Đơn hàng chưa xử lý</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $lien_he;?></sup></h3>

                    <p>Liên hệ chưa xem</p>
                </div>
                <div class="icon">
                    <i class="ion ion-email"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $tai_khoan;?></h3>

                    <p>Tài khoản người dùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $san_pham;?></h3>

                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-monitor"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>