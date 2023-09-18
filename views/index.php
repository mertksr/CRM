<?php
include '../netting/connect.php'; ?>
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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../public/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../public/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../public/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
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

                    <!--  BEGIN BREADCRUMBS  -->
                    <div class="secondary-nav">
                        <div class="breadcrumbs-container" data-page-heading="Analytics">
                            <header class="header navbar navbar-expand-sm">
                                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </a>
                                <div class="d-flex breadcrumb-content">
                                    <div class="page-header">

                                        <div class="page-title">
                                            <h3>Merhaba, <?= $_SESSION['kullanici'] ?></h3>
                                        </div>
                                        <br>
                                        <a href="../netting/kullaniciislem.php?s=out" class="btn btn-dark">Çıkış Yap</a>

                                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                                            </ol>
                                        </nav>

                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                    <!--  END BREADCRUMBS  -->

                    <div class="row layout-top-spacing">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Müşteri Sayısı</h6>
                                        </div>

                                    </div>

                                    <div class="w-content">
                                        <?php
                                        $musterisayisor = $db->prepare("SELECT * FROM musteriler");
                                        $musterisayisor->execute();
                                        $musterisayicek = $musterisayisor->fetch(PDO::FETCH_ASSOC);
                                        $musteriSayisi = $musterisayisor->rowCount();
                                        ?>
                                        <div class="w-info">
                                            <p class="value"><?= $musteriSayisi; ?></p>
                                        </div>

                                    </div>

                                    <div class="w-progress-stats">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <?php
                                        $buAyBaslangic = date("Y-m-01"); // Bu ayın başlangıcı
                                        $buAyBitis = date("Y-m-t"); // Bu ayın sonu

                                        // SQL sorgusunu hazırlayın ve çalıştırın
                                        $sql = "SELECT * FROM musteriler WHERE mSonrakiBakim BETWEEN :baslangic AND :bitis";
                                        $bakimsayisisor = $db->prepare($sql);
                                        $bakimsayisisor->bindParam(":baslangic", $buAyBaslangic);
                                        $bakimsayisisor->bindParam(":bitis", $buAyBitis);
                                        $bakimsayisisor->execute();
                                        $bakimSayisi =  $bakimsayisisor->rowCount();
                                        ?>
                                        <div class="w-info">
                                            <h6 class="value">Bu Ay Yapılacak Bakım Sayısı</h6>
                                        </div>

                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><?= $bakimSayisi; ?></p>
                                        </div>

                                    </div>

                                    <div class="w-progress-stats">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Bu Ay Yapılan Bakım Sayısı</h6>
                                        </div>

                                    </div>
                                    <?php
                                        $buAyBaslangic = date("Y-m-01"); // Bu ayın başlangıcı
                                        $buAyBitis = date("Y-m-t"); // Bu ayın sonu

                                        // SQL sorgusunu hazırlayın ve çalıştırın
                                        $sql = "SELECT * FROM musteriler WHERE mSonrakiBakim BETWEEN :baslangic AND :bitis AND  islemTuru LIKE '%Bakım%'";
                                        $islemsor = $db->prepare($sql);
                                        $islemsor->bindParam(":baslangic", $buAyBaslangic);
                                        $islemsor->bindParam(":bitis", $buAyBitis);
                                        $islemsor->execute();
                                        $islemSayisi =  $islemsor->rowCount();
                                        ?>
                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><?= $islemSayisi;?></p>
                                        </div>

                                    </div>

                                    <div class="w-progress-stats">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Bu Ay Satılan Cihaz Sayısı</h6>
                                        </div>

                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value">14</p>
                                        </div>

                                    </div>

                                    <div class="w-progress-stats">


                                    </div>
                                </div>
                            </div>
                        </div>





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
    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../public/src/plugins/src/apex/apexcharts.min.js"></script>
    <script src="../public/src/assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

</html>