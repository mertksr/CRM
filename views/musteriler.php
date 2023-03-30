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
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <style>
        .modal-content {
            background: whitesmoke;
        }
        .list-unstyled{
            background-color: #14274E;
        }
        .btn-ozel{
            background-color: #394867;
            color : white;
        
        }
    </style>
    <!-- END PAGE LEVEL STYLES -->
    <script src="../public/src/fontawesome/all.js"></script>
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
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>


                                                <th style="max-width:20px;">No</th>
                                                <th style="max-width:50px;">Ad Soyad</th>
                                                <th style="max-width:30px;">Bölge</th>
                                                <th style="max-width:40px;text-align:center;">Konum</th>
                                                <th style="max-width:10px;text-align:center;">Sonraki Bakım</th>
                                                <th style="max-width:20px;text-align:center;">İletişim</th>
                                                <th style="max-width:20px;text-align:center;">Detay</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $musterisor = $db->prepare("SELECT * from musteriler");
                                        $musterisor->execute();
                                        $say = 0;
                                        while ($mustericek = $musterisor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
                                            $tarih = $mustericek['mSonIslem'];
                                            $yeni_tarih = date('d.m.Y', strtotime($tarih . '+' . $mustericek['mPeriyot'] . ' months'));
                                            $musterino =  $mustericek["mMusteriNo"];
                                            $modalId = "modal" . $mustericek["mMusteriNo"];

                                        ?>

                                            <tbody>
                                                <tr>

                                                    <td><?php echo $say ?></td>
                                                    <td><?= $mustericek['mAdSoyad']; ?></td>
                                                    <td><?php echo $mustericek['mBolge']; ?></td>
                                                    <td style="text-align:center;max-width:10px"><a class="btn" href="https://maps.google.com/?q=<?= $mustericek['mKonum']; ?>" target="_Blank" type="button"><i class="fa-solid fa-paper-plane"></i></a></td>

                                                    <td style="text-align:center;"><?php echo $yeni_tarih; ?></td>
                                                    <td style="text-align:center;max-width:20px;">
                                                        <div class="text-center">
                                                            <button type="button" class="btn btn-ozel mr-2" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">
                                                            <i class="fa-solid fa-address-book"></i>
                                                            </button>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $mustericek['mAdSoyad']; ?> İletişim Bilgileri</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body row">

                                                                        <?php
                                                                        $iletisimsor = $db->prepare("SELECT * from iletisim where iletisimMusteriNo = $musterino");
                                                                        $iletisimsor->execute();
                                                                        while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {
                                                                            $iletisimbilgisi =  $iletisimcek["İletisimBilgisi"]
                                                                        ?>
                                                                            <div class="col-12">
                                                                                <p><?php echo $iletisimcek['iletisimTuru']; ?> : <?php echo $iletisimcek['İletisimBilgisi'];
                                                                                     if ($iletisimcek['iletisimTuru'] == "Tel" || $iletisimcek['iletisimTuru'] == "Mobil") {
                                                                                         echo "<a href='https://google.com/$iletisimbilgisi'><i class='fa-solid fa-phone fa-2xl'></i></a>";
                                                                                     } else if ($iletisimcek['iletisimTuru'] == "WhatsApp") {
                                                                                         echo "<a href='https://wa.me/$iletisimbilgisi'><i class='fa-brands fa-whatsapp fa-2xl'></i></a>";
                                                                                     }
                                                                                     ?>

                                                                                </p>
                                                                            </div>
                                                                        <?php }   ?>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-light-dark" data-bs-dismiss="modal">Kapat</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>

                                                    <td style="text-align:center;max-width:20px;">
                                                        <div class="btn-group">
                                                        <button type="button" class="btn btn-ozel btn-sm"><i class="fa-solid fa-pencil"></i></button>

                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
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
    <!-- END MAIN CONTAINER -->



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../public/src/plugins/src/global/vendors.min.js"></script>
    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../public/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

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