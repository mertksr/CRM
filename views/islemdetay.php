<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/header.php' ?>
    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../public/layouts/horizontal-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- Mültiselect -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/stepper/bsStepper.min.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/light/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/stepper/custom-bsStepper.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/dark/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/stepper/custom-bsStepper.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style>

        .info-input {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
        }
    </style>
</head>

<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">

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
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'partials/navbar.php' ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container" style="margin: 0 auto;">
                    <div class="row layout-top-spacing" id="cancel-row">
                        <div id="flLoginForm" class="col-lg-12  layout-spacing">

                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>İşlem Detayları</h4>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
                                $musterisor->execute(array($_GET['no']));
                                $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
                           
                                $urunsor = $db->prepare("SELECT * FROM urunler");
                                $urunsor->execute();
                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
                                
                                $islemno = $_GET['islemno'];
                                $islemsor = $db->prepare("SELECT * FROM islemler WHERE islemNo = :islemNo");
                                $islemsor->execute(array('islemNo' => $islemno));
                                $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                $islemturu = unserialize($islemcek['islemTuru']);
                                $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);
                                $islemurun = [];
                                
                                foreach ($kullanilanurun as $urunid) {
                                    foreach ($urunler as $urun) {
                                        if ($urunid == $urun['urunid']) {
                                            array_push($islemurun, $urun['urunAd']);
                                        }
                                    }
                                }
                                ?>
                                <div class="widget-content widget-content-area">
                                    <form class="row g-2" method="POST" id="islemekleform" action="../netting/islemislem.php" enctype="multipart/form-data">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <label for="inputAddress" class="form-label">Müşteri Adı Soyadı</label>
                                            <input type="text" readonly value="<?= $mustericek['mAdSoyad'] ?>" class="form-control info-input" id="inputAddress">
                                        </div>


                                        <div class="col-6">
                                            <label for="inputAddress2" class="form-label">Hizmet Türü</label>
                                            <input type="text" value="<?=  implode(", ", $islemturu);  ?>" readonly class="form-control info-input" name="islemnotlari" id="inputAddress2">
                                        </div>


                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Kulanılan Ürünler</label>
<textarea  readonly class="form-control info-input">
<?=  implode(", ", $islemurun);  ?>
</textarea>
                                        </div>


                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">İşlem Ücreti</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control info-input" value="<?= $islemcek['islemUcret']; ?>" id="cost" name="islemucreti" readonly style="color:#505463;">                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="inputAddress2" class="form-label">İşlem Yapan</label>
                                            <input type="text" readonly class="form-control info-input" value="<?= $islemcek['islemYapanKisi']; ?>" name="islemnotlari" id="inputAddress2">
                                        </div>


                                        <div class="col-6">
                                            <label for="inputAddress2" class="form-label">Periyot</label>
                                            <input type="text" readonly class="form-control info-input" value="<?= $islemcek['islemPeriyot']; ?>" name="islemnotlari" id="inputAddress2">
                                        </div>

                                        <div class="col-6">
                                            <label for="inputAddress2" class="form-label">Notlar</label>
                                            <input type="text" readonly class="form-control info-input" value="<?= $islemcek['islemNot']; ?>" name="islemnotlari" id="inputAddress2">
                                        </div>
                               


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php include 'partials/footer.php' ?>


    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>

   
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../public/src/plugins/src/highlight/highlight.pack.js"></script>
    <script src="../public/src/assets/js/scrollspyNav.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../public/src/plugins/src/stepper/bsStepper.min.js"></script>
    <script src="../public/src/plugins/src/stepper/custom-bsStepper.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>