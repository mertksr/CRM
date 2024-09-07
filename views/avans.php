<?php
include '../netting/connect.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<?php
if (empty($_SESSION['kullanici'])) {
    header("Location:../../../index.php?erisim=izinsiz");
}
?>

<head>
    <?php include 'partials/header.php' ?>
    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../public/layouts/horizontal-light-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />

    <style>
        .row>* {
            padding: 0 3px;
        }
        #maasform,
        #primform,
        #avansform {
            margin: 20px 0;
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #F7F7F8;
            display: flex;
            justify-content: center;

        }

        @media screen and (max-width: 768px) {

            #maasform,
            #avansform {
                flex-direction: column;

            }

            .form-group>input,
            select,
            button {
                margin: 3px 0;
            }
            .dateInput{
            width: auto;
        }

        }

        .tables {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        table{
            margin: 0 10px;
            border: 2px solid #ccc;
        }
        @media screen and (min-width: 768px) {
        .dateInput{
            width: 150px;
        }
    }
    th{
        background-color: #d9d9da !important;
    }
    td{
        border: 1px solid #ddd !important;
        max-height: 40px !important;
    }
    </style>
</head>

<body class="layout-boxed enable-secondaryNav">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN TOPBAR  -->
    <?php include 'partials/topbar.php' ?>
    <!--  END TOPBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <?php include 'partials/navbar.php' ?>


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <form method="POST" action="../netting/personelislem.php">
                                <div class="form-group" id="avansform">
                                    <input type="text" name="avansmiktar" class="form-control" placeholder="Avans">
                                    <select name="avanspersonel" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <input type="date" name="avanstarih" class="form-control dateInput" value="<?= date("Y-m-d"); ?>">

                                    <button class="btn btn-primary" name="avanskaydet">Kaydet</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <form method="POST"  action="../netting/personelislem.php">
                                <div class="form-group" id="primform">
                                    <input type="text" name="primmiktar" class="form-control" placeholder="Prim">
                                    <select name="primpersonel" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <input type="date" name="primtarih" class="form-control dateInput" value="<?= date("Y-m-d"); ?>">

                                    <button class="btn btn-primary" name="primkaydet">Kaydet</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <form method="POST"  action="../netting/personelislem.php">
                                <div class="form-group" id="maasform">
                                    <input type="text" name="maasmiktar" class="form-control" placeholder="Maaş Girin">
                                    <select name="maaspersonel" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <button class="btn btn-primary"  name="maaskaydet">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tables">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
    // Sadece bu ay içerisindeki avansları çekmek için sorgu
    $avanssor = $db->prepare("SELECT * FROM personelavans WHERE avansPersonel = :personel AND YEAR(avansTarih) = YEAR(CURDATE()) AND MONTH(avansTarih) = MONTH(CURDATE())");
    
    $avanssor->execute(
        array(
            'personel' => 'Tuğba'
        )
    );
    
    while ($avanscek = $avanssor->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?= $avanscek["avansTarih"] ?></td>
            <td><?= $avanscek["avansMiktar"] ?></td>
            <td><?= $avanscek["avansPrimMiktar"] ?></td>
        </tr>
<?php } ?>

  
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
    $avanssor = $db->prepare("SELECT * FROM personelavans WHERE avansPersonel = :personel AND YEAR(avansTarih) = YEAR(CURDATE()) AND MONTH(avansTarih) = MONTH(CURDATE())");
    
    $avanssor->execute(
        array(
            'personel' => 'Kadir'
        )
    );
    
    while ($avanscek = $avanssor->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?= $avanscek["avansTarih"] ?></td>
            <td><?= $avanscek["avansMiktar"] ?></td>
            <td><?= $avanscek["avansPrimMiktar"] ?></td>
        </tr>
<?php } ?>


                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
    $avanssor = $db->prepare("SELECT * FROM personelavans WHERE avansPersonel = :personel AND YEAR(avansTarih) = YEAR(CURDATE()) AND MONTH(avansTarih) = MONTH(CURDATE())");
    
    $avanssor->execute(
        array(
            'personel' => 'Orkun'
        )
    );
    
    while ($avanscek = $avanssor->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?= $avanscek["avansTarih"] ?></td>
            <td><?= $avanscek["avansMiktar"] ?></td>
            <td><?= $avanscek["avansPrimMiktar"] ?></td>
        </tr>
<?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <!--  BEGIN FOOTER  -->
            <?php include 'partials/footer.php' ?>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script> -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script src="../public/src/plugins/src/apex/apexcharts.min.js"></script> -->
    <!-- <script src="../public/src/assets/js/dashboard/dash_1.js"></script> -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

</html>