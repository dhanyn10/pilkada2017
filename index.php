<html>
    <head>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/jquery.js"></script>
    </head>
    <body>
<?php
    $data   = file_get_contents('https://pilkada2017.kpu.go.id/api/hasil.json');
    $decode = json_decode($data, true);
?>
        <table class="table">
            <?php
            $rekamWilayah   = "";
            $countpasangan  = 0;
            for($a = 1; $a < count($decode); $a++):
                $wilayah = $decode[$a]['namaWilayah'];
                if($rekamWilayah != $wilayah) :
                    $rekamWilayah = $wilayah;
            ?>
            <tr>
                <th>Wilayah</th>
                <td colpan="3"><?php echo $rekamWilayah; ?></td>
            </tr>
            <?php
                endif;
            ?>
            <tr>
                <th>Nama Ketua</th>
                <td><?php echo $decode[$a]['namaKd']?></td>
                <th>Nama Wakil</th>
                <td><?php echo $decode[$a]['namaWkd']?></td>
                <th>Jumlah Suara</th>
                <td><?php echo $decode[$a]['jumlahSuara']?></td>
            </tr>
            <?php
            endfor;
            ?>
        </table>
    </body>
</html>