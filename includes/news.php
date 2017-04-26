<div class="center_content">
    <div class="center_title_bar">Tin tức</div>
    <table width="100%">
        <tbody>
            <?php
            //2. Truy van
            $sql = "SELECT id_tin_tuc,tieu_de,anh FROM tin_tuc";

            //3. Thuc thi
            $rows = $db->query($sql);


            //4. Lay du lieu
            foreach ($rows as $r) {
                echo "<tr>"
                . "<td><img src='img/$r[2]' width='96px' height='60px'/></td>"
                . "<td><a href='index.php?page=news_detail&id=$r[0]'>$r[1]</a></td>"
                . "</td>"
                . "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>