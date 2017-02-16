<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo_pilkada.png"/>
        <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="tether/css/tether.min.css" rel="stylesheet"/>
        <link href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <script src="js/jquery.js"></script>
        <script src="tether/js/tether.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <title>Pilkada 2017</title>
    </head>
    <body>
<?php
    $data   = file_get_contents('https://pilkada2017.kpu.go.id/api/hasil.json');
    $decode = json_decode($data, true);
?>
        <nav class="navbar sticky-top navbar-toggleable-md navbar-inverse bg-inverse">
            <a class="navbar-brand" href="#">
                <img src="img/logo_pilkada.png" width="30" height="30" alt=""> Pilkada 2017
            </a>
            <a class="btn-btn-secondary ml-auto" href="https://github.com/dhanyn10/pilkada2017" target="_blank">Fork <i class="fa fa-fork"></i></a>
        </nav>
        <div class="container">
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
        </div>
        <script src="js/jscript.js"></script>
    </body>
</html>