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
        .multi-select-container {
            display: inline-block;
            position: relative;
        }

        @media only screen and (max-width: 600px) {
            .ms-container {
                width: 320px;
            }
        }

        @media screen and (max-width: 900px) and (min-width: 600px) {
            .ms-container {
                width: 320px;
            }
        }
        .islemkaydet{
      background-color: #394867 !important;
      border:none !important;
      box-shadow:none !important;
    color:#fff;
    }
    .islemkaydet{
      background-color: #6B728E !important;

    }
    
        .multi-select-menu {
            position: absolute;
            left: 0;
            top: 0.8em;
            float: left;
            min-width: 100%;
            background: #fff;
            margin: 1em 0;
            padding: 0.4em 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            display: none;
        }

        .multi-select-menu input {
            margin-right: 0.3em;
            vertical-align: 0.1em;
        }

        .multi-select-button {
            display: inline-block;
            font-size: 0.875em;
            padding: 0.2em 0.6em;
            max-width: 20em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: -0.5em;
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            cursor: default;
        }

        .multi-select-button:after {
            content: "";
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0.4em 0.4em 0 0.4em;
            border-color: #999 transparent transparent transparent;
            margin-left: 0.4em;
            vertical-align: 0.1em;
        }

        .multi-select-container--open .multi-select-menu {
            display: block;
        }

        .multi-select-container--open .multi-select-button:after {
            border-width: 0 0.4em 0.4em 0.4em;
            border-color: transparent transparent #999 transparent;
        }

        .choices[data-type*=select-multiple] .choices__inner,
        .choices[data-type*=text] .choices__inner {
            cursor: pointer;
        }


        .choices__inner,
        .choices__input,
        .choices__list {
            background-color: white;
        }

        .choices__item {
            color: #505463;
        }
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
                                                     <?php 
                                $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
                                $musterisor->execute(array($_GET['no']));
                                $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);

                                $rsor = $db->prepare("SELECT * from randevular where rNo =  ?");
                                $rsor->execute(array($_GET['rno']));
                                $rcek = $rsor->fetch(PDO::FETCH_ASSOC);
                                ?>   
                        <div id="flLoginForm" class="col-lg-12  layout-spacing">
                        <a class="btn btn-warning mb-3" href="mrandevular.php?no=<?= $mustericek['mMusteriNo'];?>">Geri Dön</a>
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Randevu Ekle</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content widget-content-area">
                                    <form class="row g-2" method="POST" id="randevuekleform" action="../netting/randevuislem.php">
                                     
                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">Müşteri Adı Soyadı</label>
                                            <input type="text" readonly value="<?= $mustericek['mAdSoyad'] ?>" class="form-control info-input" id="inputAddress">
                                        </div>

                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">Görüşme Tarihi</label>
                                            <input type="date" name="gorusmetarihi" value="<?= date('Y-m-d', strtotime($rcek['rGorusmeTarihi']));?>" class="form-control" id="inputAddress">
                                        </div>

                                        <div class="col-6">
                                            <label for="defaultInputState" class="form-label ">Hizmet Türü</label>
                                            <select form="randevuekleform" id="defaultInputState" name="hizmetturu" class="form-select">
                                                <option selected="">Seç</option>
                                                <option name="Periyodik Bakım" <?php echo ($rcek['rHizmetTuru'] == "Periyodik Bakım") ? "selected" : ""; ?>>Periyodik Bakım</option>
<option name="Teknik Servis" <?php echo ($rcek['rHizmetTuru'] == "Teknik Servis") ? "selected" : ""; ?>>Teknik Servis</option>
<option name="Cihaz Satışı" <?php echo ($rcek['rHizmetTuru'] == "Cihaz Satışı") ? "selected" : ""; ?>>Cihaz Satışı</option>
<option name="Ürün Satışı" <?php echo ($rcek['rHizmetTuru'] == "Ürün Satışı") ? "selected" : ""; ?>>Ürün Satışı</option>

                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">Randevu Tarihi</label>
                                            <input type="date" name="randevutarihi" value="<?= date('Y-m-d', strtotime($rcek['rTarih']));?>" class="form-control" id="inputAddress">
                                        </div>
                                        <div class="col-6">
                                            <label for="defaultInputState" class="form-label ">Temsilci</label>
                                            <select form="randevuekleform" id="defaultInputState" name="temsilci" class="form-select">
                                                <option>Seç</option>
                                                <option name="Mehmet" <?php echo ($rcek['rTemsilci'] == "Mehmet") ? "selected" : ""; ?>>Mehmet</option>
                                                <option name="Cihan" <?php echo ($rcek['rTemsilci'] == "Cihan") ? "selected" : ""; ?>>Cihan</option>
                                                <option name="Bedirhan" <?php echo ($rcek['rTemsilci'] == "Bedirhan") ? "selected" : ""; ?>>Bedirhan</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">Teklif</label>
                                            <input type="text"  value="<?= $rcek['rTeklif'];?>" name="teklif" class="form-control" id="inputAddress">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Notlar</label>
                                            <input type="text"  value="<?= $rcek['rNot'];?>" name="notlar" class="form-control" id="inputAddress">
                                        </div>



<input type="hidden" name="musterino" value="<?= $_GET['no'] ?>">
                                        <div class="col-12">
                                            <button type="submit" name="randevuduzenle" class="btn islemkaydet">Kaydet</button>
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