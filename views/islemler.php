<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Miscellaneous DataTables | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../public/src/assets/img/favicon.ico" />
    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../public/layouts/horizontal-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <!-- END PAGE LEVEL STYLES -->
</head>

<body class="layout-boxed">
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
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <?php include 'partials/navbar.php' ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0 mt-4">

                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <?php
                                        $msor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = :mno");
                                        $msor->execute(array(
                                            'mno' => $_GET['no']
                                        ));                                   
                                       $mcek = $msor->fetch(PDO::FETCH_ASSOC);
                                       $mahalle = $mcek['mBolge'];
                                       $mahallesor = $db->prepare("SELECT * from neighborhood where NeighborhoodID =  $mahalle");
                                       $mahallesor->execute();
                                       $mahallecek = $mahallesor->fetch(PDO::FETCH_ASSOC);
                                       ?>
                            <div class="statbox widget box box-shadow">
                               
                                    <h5><?= $mcek['mAdSoyad'] . ' / ' . $mahallecek['NeighborhoodName'] ?></h5>
                                    <div  style="display:flex;justify-content:right;">  
                                     <a class="btn btn-lg special1 mb-3" style="color:#EFF5F5;" href="islemekle.php?no=<?= $_GET['no']; ?>">Servis Kaydı Ekle</a>
                                    </div>
                                <div class="widget-content widget-content-area">

                                    <table id="islemler" class="table dt-table-hover display nowrap" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>Yapan Kişi</th>
                                                <th>İşlem Zamanı</th>
                                                <th>İşlem Türü</th>
                                                <th>Ücret</th>
                                                <th>Not</th>
                                                <th>Detay</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $islemsor = $db->prepare("SELECT * from islemler WHERE islemMusteriNo = :islemMusteriNo");
                                        $islemsor->execute(array(
                                            'islemMusteriNo' => $_GET['no']
                                        ));
                                        $say = 0;
                                        while ($islemcek = $islemsor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
$islemturu = unserialize($islemcek['islemTuru']);
$alınanucret = $islemcek['islemUcret'] - $islemcek['islemIndirimliFiyat'];
$alınanucretfrmt = number_format($alınanucret, 2, ',', '.');          ?>

                                            <tr>
                                                <td><?= $say; ?></td>
                                                <td><?= $islemcek['islemYapanKisi']; ?></td>
                                                <td><?= date("d.m.Y H:i", strtotime($islemcek['islemTarihi'])); ?></td>
                                                <td><?=  implode(", ", $islemturu);  ?></td>

                                                <td><?= $alınanucretfrmt; ?> TL</td>

                                                <td><?= $islemcek['islemNot']; ?> </td>
                                                <td style="text-align:center;">
                                                    <div class="btn-group">
                                                        <a href="islemdetay.php?no=<?= $_GET['no']; ?>&islemno=<?= $islemcek['islemNo']?>" class="btn btn-dark btn-sm"><i class="fa-solid fa-circle-info"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg></p>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <script src="../public/src/fontawesome/all.js"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../public/src/plugins/src/global/vendors.min.js"></script>
    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../public/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../public/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="../public/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../public/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>
    <script src="../public/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../public/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="../public/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>