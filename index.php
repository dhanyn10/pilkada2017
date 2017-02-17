<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo_pilkada.png"/>
        <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="tether/css/tether.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <script src="js/jquery.js"></script>
        <script src="tether/js/tether.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.table').DataTable();
            });
        </script>
        <title>Pilkada 2017</title>
    </head>
    <body>
<?php
    $data   = file_get_contents('https://pilkada2017.kpu.go.id/api/hasil.json');
    $decode = json_decode($data, true);
?>
        <nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="img/logo_pilkada.png" width="30" height="30" alt=""> Pilkada 2017
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="https://github.com/dhanyn10/pilkada2017" target="_blank">Fork <i class="fa fa-code-fork"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th>Wilayah</th>
                        <th>Nama Ketua</th>
                        <th>Nama Wakil</th>
                        <th>Jumlah Suara</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $rekamWilayah   = "";
                $countpasangan  = 0;
                for($a = 0; $a < count($decode); $a++):
                    $wilayah = $decode[$a]['namaWilayah'];
                    if($rekamWilayah != $wilayah) :
                        $rekamWilayah = $wilayah;
                ?>
                <?php
                    endif;
                ?>
                <tr>
                    <td><?php echo $rekamWilayah; ?></td>
                    <td><?php echo $decode[$a]['namaKd']?></td>
                    <td><?php echo $decode[$a]['namaWkd']?></td>
                    <td><?php echo $decode[$a]['jumlahSuara']?></td>
                </tr>
                <?php
                endfor;
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>