<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo_pilkada.png"/>
        <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/jquery.js"></script>
    </head>
    <body>
<?php
    $data   = file_get_contents('https://pilkada2017.kpu.go.id/api/hasil.json');
    $decode = json_decode($data, true);
?>
        <nav class="navbar navbar-toggleable sticky-top navbar-inverse bg-inverse">
            <button class="navbar-toggler navbar-toggler-right"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Pilkada 2017
                <img src="img/logo_pilkada.png" width="30" height="30" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <a class="btn-btn-secondary ml-auto">Fork <i class="fa fa-fork"></i></a>
            </div>
        </nav>
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