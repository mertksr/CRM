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
        .list-unstyled {
            background-color: #16213E;
        }

        .btn-ozel {
            background-color: #394867 !important;
            color: white;

        }

        .modal-content {
            background: whitesmoke;
        }

        .contact-modal {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
        }

        .page-item.active .page-link {
            background-color: #394867;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #14274E !important;
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
                                <div  style="display:flex;justify-content:right;">                                                
                                <a class="btn btn-lg special1 mb-3" style="color:#EFF5F5;" href="musteriekle.php">Yeni Müşteri</a>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>


                                                <th style="max-width:10px;padding-right:0;">No</th>
                                                <th style="max-width:50px;">Ad Soyad</th>

                                                <th style="max-width:30px;">Bölge</th>
                                                <th style="max-width:10px;text-align:center;">Sonraki Bakım</th>
                                                <th style="max-width:10px;text-align:center;">Bakıma Kalan Süre</th>
                                                <th style="max-width:20px;text-align:center;">İletişim</th>
                                                <th style="max-width:20px;text-align:center;">İşlemler</th>

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
                                            $mahalle = $mustericek['mBolge'];
                                            $mahallesor = $db->prepare("SELECT * from neighborhood where NeighborhoodID =  $mahalle");
                                            $mahallesor->execute();
                                            $mahallecek = $mahallesor->fetch(PDO::FETCH_ASSOC);

                                        ?>


                                            <tr>

                                                <td style="max-width:5px;"><?php echo $say ?></td>
                                                <td><?= $mustericek['mAdSoyad']; ?></td>
                                                <td><?php echo $mahallecek['NeighborhoodName']; ?></td>

                                                <td style="text-align:center;"><?php echo $yeni_tarih; ?>
                                                <td style="text-align:center;"><?php

                                                                                $query = "SELECT * FROM islemler WHERE islemMusteriNo = :customer_id ORDER BY islemTarihi DESC LIMIT 1";
                                                                                $islemsor = $db->prepare($query);
                                                                                $islemsor->bindParam(':customer_id', $mustericek['mMusteriNo']);


                                                                                $islemsor->execute();
                                                                                $count = $islemsor->rowCount();

                                                                                $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                                                                $tarih = $islemcek['islemTarihi'];
                                                                                $tarih = date('Y-m-d', strtotime($tarih));
                                                                                // Tarihi DateTime nesnesine dönüştürelim:
                                                                                $datetime_tarih = new DateTime($tarih);

                                                                                // Bugünün tarihini DateTime nesnesine dönüştürelim:
                                                                                $datetime_bugun = new DateTime();

                                                                                // İki tarih arasındaki farkı bulalım:
                                                                                $fark = $datetime_tarih->diff($datetime_bugun);

                                                                                // Farkı gün olarak alalım:
                                                                                $gun_farki = $fark->format("%a");

                                                                                // Eğer kalan gün sayısı 30 veya daha az ise, kırmızı renkte bir metin yazdıralım:
                                                                                if ($count > 0) {
                                                                                    if ($gun_farki <= 14) {
                                                                                        echo "<span class='badge badge-danger me-4'>$gun_farki Gün</span>";
                                                                                    }
                                                                                    // Değilse, turuncu renkte bir metin yazdıralım:
                                                                                    else if ($gun_farki <= 30) {
                                                                                        echo "<span class='badge badge-warning me-4'>$gun_farki Gün</span>";
                                                                                    } else {
                                                                                        echo "<span class='badge badge-primary me-4'>$gun_farki Gün</span>";
                                                                                    }
                                                                                } else {
                                                                                    echo "<span class='badge badge-dark me-4'>Bakım Bilgisi Yok</span>";
                                                                                }
                                                                                ?>
                                                </td>

                                                <td style="max-width:20px;">
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

                                                                    <h5 class="modal-title" id="exampleModalLabel"><span style="color:#E21818;"><?php echo $mustericek['mAdSoyad']; ?></span> İletişim Bilgileri</h5>

                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                </div>
                                                                <div class="modal-body row">

                                                                    <?php
                                                                    $iletisimsor = $db->prepare("SELECT * from iletisim where iletisimMusteriNo = $musterino");
                                                                    $iletisimsor->execute();
                                                                    while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {
                                                                        $iletisimbilgisi =  $iletisimcek["İletisimBilgisi"]
                                                                    ?>
                                                                        <div class="col-6">
                                                                            <p><?php if ($iletisimcek['iletisimTuru'] == "Tel" || $iletisimcek['iletisimTuru'] == "Mobil") {
                                                                                    echo "<a href='https://google.com/$iletisimbilgisi'><i class='fa-solid fa-phone fa-2xl'></i></a>";
                                                                                }

                                                                                ?> : <?php echo $iletisimcek['İletisimBilgisi']; ?>

                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p>
                                                                        <?php
                                                                        if ($iletisimcek['iletisimTuru'] == "Tel" || $iletisimcek['iletisimTuru'] == "Mobil" && $iletisimcek['iletisimWp'] == "1") {
                                                                            echo "<a href='https://wa.me/$iletisimbilgisi'><i class='fa-brands fa-whatsapp fa-2xl'></i></a>";
                                                                        }
                                                                        ?> : <?php echo $iletisimcek['İletisimBilgisi'];

                                                                                        ?>

                                                                        </p>
                                                                </div>
                                                            <?php }   ?>
                                                            <br><br>
                                                            <div class="row g-1">
                                                                <div class="form-group col-12">
                                                                    <label for="exampleFormControlInput1">Adres</label>
                                                                    <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlInput1">Bölge </label>
                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mahallecek['NeighborhoodName']; ?>">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlInput1">Son Bakım Tarihi</label>
                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($mustericek['mSonIslem'])); ?>">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlInput1">Notlar</label>
                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mNot']; ?>">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlInput1">Bakım Periyodu</label>
                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mPeriyot'] . ' Ay'; ?>">
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar??</label>
                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="">
                                                                </div>


                                                            </div>


                                                            </div>

                                                            <div class="modal-footer">
                                                                <a class="btn special1 m-3" style="color:#EFF5F5;" href="randevuekle.php?no=<?= $mustericek['mMusteriNo']; ?>"> <i class="fa-solid fa-calendar-plus"></i></a>

                                                                <button class="btn btn-dark" data-bs-dismiss="modal">Kapat</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                </div>

                                </td>


                                <td style="text-align:center;">
                                    <div class="btn-group">
                                        <a class="btn btn-dark btn-sm btn-ozel" href='musteridetay.php?no=<?= $mustericek['mMusteriNo']; ?>'>Düzenle</a>
                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split btn-ozel" id="dropdownMenuReference2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference2">
                                            <a class="dropdown-item" href='islemler.php?no=<?= $mustericek['mMusteriNo']; ?>'>Servis Kayıtları</a>
                                            <a class="dropdown-item" href='mrandevular.php?no=<?= $mustericek['mMusteriNo']; ?>'>Randevular</a>
                                            <a class="dropdown-item" href='satislar.php?no=<?= $mustericek['mMusteriNo']; ?>'>Satışlar</a>


                                            <?php if ($mustericek['mKonum'] != "") {
                                                echo ' <a class="dropdown-item" target="_Blank" href="https://maps.google.com/?q= ' . $mustericek["mKonum"] . ' ">Konum Aç</a> ';
                                            } ?>
                                            <a class="dropdown-item" href="#">Ertele</a>

                                        </div>
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