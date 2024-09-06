<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php
if (empty($_SESSION['kullanici'])) {
    header("Location:../../../index.php?erisim=izinsiz");
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Pınar Su Arıtma</title>
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


    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <script src="../public/src/fontawesome/all.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../public/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../public/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../public/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        .modal-content {
            background: whitesmoke;
        }

        .btn-ozel {
            background-color: #394867 !important;
            color: white;

        }

        .info-input {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
        }
    </style>

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
                        <?php
                        function tahsilatTipiTopla($tip)
                        {
                            global $db;
                            $bugun = date('Y-m-d');

                            $sor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = :tip AND sIslemNo IS NOT NULL AND sSatisNo IS NULL");
                            $sor->execute(array('tarih' => $bugun, 'tip' => $tip));

                            $toplam = 0;

                            while ($cek = $sor->fetch(PDO::FETCH_ASSOC)) {
                                $ucret = $cek['sTahsilat'];
                                $toplam += $ucret;
                            }

                            return $toplam;
                        }
                        function tahsilatTipiSorTopla($personel, $tip)
                        {
                            global $db;
                            $bugun = date('Y-m-d');

                            $sor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel AND sTahsilatTipi = :tip");
                            $sor->execute(array('tarih' => $bugun, 'personel' => $personel, 'tip' => $tip));

                            $toplam = 0;

                            while ($cek = $sor->fetch(PDO::FETCH_ASSOC)) {
                                $ucret = $cek['sTahsilat'];
                                $toplam += $ucret;
                            }

                            return $toplam;
                        }

                        function servisTahsilatTipiGoster($personel)
                        {
                            $toplamNakit = 0;
                            $toplamKart = 0;
                            $toplamIban = 0;
                            $toplamMailOrder = 0;

                         $toplamNakit = tahsilatTipiSorTopla($personel, 'Nakit');
                            $toplamKart = tahsilatTipiSorTopla($personel, 'Kart');
                            $toplamIban = tahsilatTipiSorTopla($personel, 'Iban');
                            $toplamMailOrder = tahsilatTipiSorTopla($personel, 'Mail Order');
                            $sonuc = array($toplamNakit, $toplamKart, $toplamIban, $toplamMailOrder);
                            return $sonuc;
                        }
                        $servisToplam = 0;
                        $satisToplam = 0;
                        $csatisToplam = 0;
                        $satisNakitToplam = 0;
                        $satisKartToplam = 0;
                        $satisMailOrderToplam = 0;
                        $satisIbanToplam = 0;
                        $veresiyeNakitToplam = 0;
                        $veresiyeKartToplam = 0;
                        $veresiyeMailOrderToplam = 0;
                        $veresiyeIbanToplam = 0;
                        $indirimToplam = 0;
                        $tutarToplam = 0;
                        $veresiyeToplam = 0;
                        $mehmetToplam = 0;
                        $kadirToplam = 0;
                        $kadirVeresiyeToplam = 0;
                        $kadirIndirimToplam = 0;
                        $tahsinToplam = 0;
                        $tahsinVeresiyeToplam = 0;
                        $tahsinIndirimToplam = 0;
                        $mehmetVeresiyeToplam = 0;
                        $mehmetIndirimToplam = 0;
                        $veresiyeTahsilatToplam = 0;
                        $veresiyeTumToplam = 0;
                        $toplamsirketborcu = 0;
                        $bugun = date('Y-m-d');
                        $servismuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND (sTuru LIKE '%Bakım%' OR sTuru LIKE '%Arız%' OR sTuru LIKE '%Montaj%' OR sTuru LIKE '%2. Montaj%' OR sTuru LIKE '%Nakil%')");
                        $servismuhasebesor->execute(array('tarih' => $bugun));
                        while ($servismuhasebecek = $servismuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $serviskazanc = $servismuhasebecek['sTahsilat'];
                            $servisToplam += $serviskazanc;
                        }
                        $satismuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sMusteriNo = :musterino AND sTuru LIKE '%Satış%'");
                        $satismuhasebesor->execute(array('tarih' => $bugun, 'musterino' => '0'));
                        while ($satismuhasebecek = $satismuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $satiskazanc = $satismuhasebecek['sTahsilat'];
                            $satisToplam += $satiskazanc;
                        }
                        $csatismuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = 'Nakit'");
                        $csatismuhasebesor->execute(array('tarih' => $bugun));
                        while ($csatismuhasebecek = $csatismuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $csatiskazanc = $csatismuhasebecek['sTahsilat'];
                            $csatisToplam += $csatiskazanc;
                        }
                        $satis1muhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = 'Nakit' AND sMusteriNo = '0' AND sTuru LIKE '%Satış%'");
                        $satis1muhasebesor->execute(array('tarih' => $bugun));
                        while ($satis1muhasebecek = $satis1muhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $satis1kazanc = $satis1muhasebecek['sTahsilat'];
                            $satisNakitToplam += $satis1kazanc;
                        }
                        $satis2muhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = 'Kart' AND sTuru LIKE '%Satış%'");
                        $satis2muhasebesor->execute(array('tarih' => $bugun));
                        while ($satis2muhasebecek = $satis2muhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $satis2kazanc = $satis2muhasebecek['sTahsilat'];
                            $satisKartToplam += $satis2kazanc;
                        }
                        $satis3muhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = 'Mail Order' AND sTuru LIKE '%Satış%'");
                        $satis3muhasebesor->execute(array('tarih' => $bugun));
                        while ($satis3muhasebecek = $satis3muhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $satis3kazanc = $satis3muhasebecek['sTahsilat'];
                            $satisMailOrderToplam += $satis3kazanc;
                        }
                        $satis4muhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTahsilatTipi = 'Iban' AND sTuru LIKE '%Satış%'");
                        $satis4muhasebesor->execute(array('tarih' => $bugun));
                        while ($satis4muhasebecek = $satis4muhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $satis4kazanc = $satis4muhasebecek['sTahsilat'];
                            $satisIbanToplam += $satis4kazanc;
                        }
                        $indirimmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih");
                        $indirimmuhasebesor->execute(array('tarih' => $bugun));
                        while ($indirimmuhasebecek = $indirimmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin

                            $indirimtoplam = $indirimmuhasebecek['sYapilanIndirim'];
                            $indirimToplam += $indirimtoplam;
                        }

                        $veresiyemuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih");
                        $veresiyemuhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiyemuhasebecek = $veresiyemuhasebesor->fetch(PDO::FETCH_ASSOC)) {

                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyeucretbugun = $veresiyemuhasebecek['sVeresiye'];
                            $veresiyeToplam += $veresiyeucretbugun;
                        }
                        $veresiye1muhasebesor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih AND vtTahsilatTipi = 'Nakit'");
                        $veresiye1muhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiye1muhasebecek = $veresiye1muhasebesor->fetch(PDO::FETCH_ASSOC)) {

                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyeucret1bugun = $veresiye1muhasebecek['vtTahsilat'];
                            $veresiyeNakitToplam += $veresiyeucret1bugun;
                        }
                        $veresiye2muhasebesor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih AND vtTahsilatTipi = 'Kart'");
                        $veresiye2muhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiye2muhasebecek = $veresiye2muhasebesor->fetch(PDO::FETCH_ASSOC)) {

                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyeucret2bugun = $veresiye2muhasebecek['vtTahsilat'];
                            $veresiyeKartToplam += $veresiyeucret2bugun;
                        }
                        $veresiye3muhasebesor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih AND vtTahsilatTipi = 'Mail Order'");
                        $veresiye3muhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiye3muhasebecek = $veresiye3muhasebesor->fetch(PDO::FETCH_ASSOC)) {

                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyeucret3bugun = $veresiye3muhasebecek['vtTahsilat'];
                            $veresiyeMailOrderToplam += $veresiyeucret3bugun;
                        }
                        $veresiye4muhasebesor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih AND vtTahsilatTipi = 'Iban'");
                        $veresiye4muhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiye4muhasebecek = $veresiye4muhasebesor->fetch(PDO::FETCH_ASSOC)) {

                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyeucret4bugun = $veresiye4muhasebecek['vtTahsilat'];
                            $veresiyeIbanToplam += $veresiyeucret4bugun;
                        }
                        $veresiyesor = $db->prepare("SELECT * FROM veresiye WHERE vDurum = 1");
                        $veresiyesor->execute();
                        while ($veresiyecek = $veresiyesor->fetch(PDO::FETCH_ASSOC)) {
                            if (isset($veresiyecek['vKalan']) && is_numeric($veresiyecek['vKalan'])) {
                                $veresiyeucret = (float)$veresiyecek['vKalan'];
                            } elseif (isset($veresiyecek['vTutar']) && is_numeric($veresiyecek['vTutar'])) {
                                $veresiyeucret = (float)$veresiyecek['vTutar'];
                            }
                            $veresiyeTumToplam += $veresiyeucret;
                        }

                        $veresiyetahsilatsor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih");
                        $veresiyetahsilatsor->execute(array('tarih' => $bugun));
                        while ($veresiyetahsilatcek = $veresiyetahsilatsor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $veresiyetahsilat = $veresiyetahsilatcek['vtTahsilat'];
                            $veresiyeTahsilatToplam += $veresiyetahsilat;
                        }
                        $kadirmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $kadirmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'kadir'));

                        while ($kadirmuhasebecek = $kadirmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $kadirucret = $kadirmuhasebecek['sTahsilat'];
                            $kadirToplam += $kadirucret;
                            $kadirIndirimToplam += $kadirmuhasebecek['sYapilanIndirim'];
                        }
                        $tahsinmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $tahsinmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'orkun'));

                        while ($tahsinmuhasebecek = $tahsinmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $tahsinucret = $tahsinmuhasebecek['sTahsilat'];
                            $tahsinToplam += $tahsinucret;
                            $tahsinIndirimToplam += $tahsinmuhasebecek['sYapilanIndirim'];
                        }
                        $mehmetmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $mehmetmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'mehmet'));

                        while ($mehmetmuhasebecek = $mehmetmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $mehmetucret = $mehmetmuhasebecek['sTahsilat'];
                            $mehmetToplam += $mehmetucret;
                            $mehmetIndirimToplam += $mehmetmuhasebecek['sYapilanIndirim'];
                        }

                        $mehmetveresiyesor = $db->prepare("SELECT * FROM veresiye WHERE DATE_FORMAT(vTarih, '%Y-%m-%d') = :tarih AND vYapan = :personel AND vDurum = 1");
                        $mehmetveresiyesor->execute(array('tarih' => $bugun, 'personel' => 'Mehmet'));
                        while ($mehmetveresiyecek = $mehmetveresiyesor->fetch(PDO::FETCH_ASSOC)) {
                            if (!isset($mehmetveresiyecek['vKalan']) && $mehmetveresiyecek['vKalan'] == null || $mehmetveresiyecek == "0") {
                                $mehmetveresiye = $mehmetveresiyecek['vTutar'];
                            } else {
                                $mehmetveresiye = $mehmetveresiyecek['vKalan'];
                            }
                            $mehmetVeresiyeToplam += $mehmetveresiye;
                        }
                        $kadirveresiyesor = $db->prepare("SELECT * FROM veresiye WHERE DATE_FORMAT(vTarih, '%Y-%m-%d') = :tarih AND vYapan = :personel AND vDurum = 1");
                        $kadirveresiyesor->execute(array('tarih' => $bugun, 'personel' => 'Kadir'));
                        while ($kadirveresiyecek = $kadirveresiyesor->fetch(PDO::FETCH_ASSOC)) {
                            if (!isset($kadirveresiyecek['vKalan']) && $kadirveresiyecek['vKalan'] == null || $kadirveresiyecek == "0") {
                                $kadirveresiye = $kadirveresiyecek['vTutar'];
                            } else {
                                $kadirveresiye = $kadirveresiyecek['vKalan'];
                            }
                            $kadirVeresiyeToplam += $kadirveresiye;
                        }

                        $tahsinveresiyesor = $db->prepare("SELECT * FROM veresiye WHERE DATE_FORMAT(vTarih, '%Y-%m-%d') = :tarih AND vYapan = :personel AND vDurum = 1");
                        $tahsinveresiyesor->execute(array('tarih' => $bugun, 'personel' => 'Orkun'));
                        while ($tahsinveresiyecek = $tahsinveresiyesor->fetch(PDO::FETCH_ASSOC)) {
                            if (!isset($tahsinveresiyecek['vKalan']) && $tahsinveresiyecek['vKalan'] == null || $tahsinveresiyecek == "0") {
                                $tahsinveresiye = $tahsinveresiyecek['vTutar'];
                            } else {
                                $tahsinveresiye = $tahsinveresiyecek['vKalan'];
                            }
                            $tahsinVeresiyeToplam += $tahsinveresiye;
                        }



                        $odenenborc = 0;
                        $odenenborcsor = $db->prepare("SELECT * FROM sirketborcu WHERE bTip =1");
                        $odenenborcsor->execute();
                        while ($odenenborccek = $odenenborcsor->fetch(PDO::FETCH_ASSOC)) {
                            $odenenborc += $odenenborccek['bMiktar'];
                        }

                        $eklenenborc = 0;
                        $eklenenborcsor = $db->prepare("SELECT * FROM sirketborcu WHERE bTip =0");
                        $eklenenborcsor->execute();
                        while ($eklenenborccek = $eklenenborcsor->fetch(PDO::FETCH_ASSOC)) {
                            $eklenenborc += $eklenenborccek['bMiktar'];
                        }
                        $toplamsirketborcu = $eklenenborc - $odenenborc;

                        ?>




                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-1">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value mb-2">Dükkan Malzeme Satış Kazancı</h6>
                                        </div>
                                    </div>
                                    <div style="display:flex;align-items:center;">
                                        <div class="w-info">
                                             <p style="color:orange;margin-right:5px;font-size:20px;">Nakit Kazanç <?= $csatisToplam; ?>TL </p>
                                           <!-- <p style="color:limegreen;margin-right:5px;font-size:20px;">Dış Satış: <?php //$satisToplam; ?>TL </p> -->


                                        </div>
                                        <div class="" style="margin:0px;font-weight: 400;">
                                            <p style="margin:0px;color:limegreen;font-size:medium;">Nakit:<?= $satisNakitToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:medium;">Kart:<?= $satisKartToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:medium;">Iban:<?= $satisIbanToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:medium;">M. Order:<?= $satisMailOrderToplam; ?>TL</p>
                                        </div>
                                        <button type="button" class="btn btn-success" style="color:#EFF5F5;margin:0 0 10px 10px;" name="borcekle" id="borcekle" data-bs-toggle="modal" data-bs-target="#satiseklemodal">Dış satış Ekle</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div id="satiseklemodal" class="modal fade">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;">Dış Satış Ekle</h4>
                                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" id="musteriekleform" type="POST" action="../netting/satisislem.php">
                                        <div class="modal-body row g-1" id="musteridetaybody">


                                            <div class="form-group col-6">
                                                <label for="exampleFormControlInput1" class="mb-1">Satış Tutarı</label>
                                                <input type="text" class="form-control" name="tutar">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleFormControlInput1" class="mb-1">Satış Tarihi</label>
                                                <input type="date" class="form-control" name="tarih">
                                            </div>
                                            <div class="col-12">
                                                <label for="defaultInputState" class="form-label ">Tahsilat Tipi</label>
                                                <select id="defaultInputState" name="tahsilattipi" required class="form-select">
                                                    <option>Seç</option>
                                                    <option value="Nakit">Nakit</option>
                                                    <option value="Kart">Kart</option>
                                                    <option value="Iban">Iban</option>
                                                    <option value="Mail Order">Mail Order</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="muhasebedissatisekle" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-2">

                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Veresiye Tahsilatı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $veresiyeTahsilatToplam; ?> TL </p>

                                        </div>
                                        <div style="margin:0px;font-weight: 400;float:right;">
                                            <p style="margin:0px;color:limegreen;font-size:small;font-weight:800;">Nakit:<?= $veresiyeNakitToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:small;font-weight:800;">Kart:<?= $veresiyeKartToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:small;font-weight:800;">Iban:<?= $veresiyeIbanToplam; ?>TL</p>
                                            <p style="margin:0px;color:limegreen;font-size:small;font-weight:800;">M. Order:<?= $veresiyeMailOrderToplam; ?>TL</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-2">

                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Toplam Veresiye</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:crimson;"><?= $veresiyeTumToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-2">

                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Şirket Borcu</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:burlywood;"><?= $toplamsirketborcu; ?> TL</p>
                                        </div>
                                        <button type="button" class="btn btn-warning mb-2" style="color:#EFF5F5;margin:0 0 10px 10px;" name="borcekle" id="borcekle" data-bs-toggle="modal" data-bs-target="#borceklemodal">Değiştir</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Kadir</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info" style="color:limegreen;">Kazanç
                                            <p class="value" style="color:limegreen;font-size:x-large;"><?= $kadirToplam; ?> TL </p>
                                            Nakit: <?php echo servisTahsilatTipiGoster('Kadir')[0]; ?> TL <br>
                                            Kart: <?php echo servisTahsilatTipiGoster('Kadir')[1]; ?> TL<br>
                                            <!-- Iban: <?php // echo servisTahsilatTipiGoster('Kadir')[2]; ?> TL<br> -->
                                            <!-- Mail Order: <?php //echo servisTahsilatTipiGoster('Kadir')[3]; ?> TL<br> -->

                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> İndirim
                                            <p class="value" style="font-size:x-large;"><?= $kadirIndirimToplam; ?> TL </p>
                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> Veresiye
                                            <p class="value" style="font-size:x-large;"><?= $kadirVeresiyeToplam; ?> TL </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Orkun</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info" style="color:limegreen;">Kazanç
                                            <p class="value" style="color:limegreen;font-size:x-large;"><?=  $tahsinToplam; ?> TL </p>
                                            Nakit: <?php echo servisTahsilatTipiGoster('Orkun')[0]; ?> TL <br>
                                            Kart: <?php echo servisTahsilatTipiGoster('Orkun')[1]; ?> TL<br>
                                            <!-- Iban: <?php //echo servisTahsilatTipiGoster('Tahsin')[2]; ?> TL<br> -->
                                            <!-- Mail Order: <?php //echo servisTahsilatTipiGoster('Tahsin')[3]; ?> TL<br> -->
                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> İndirim
                                            <p class="value" style="font-size:x-large;"><?= $tahsinIndirimToplam; ?> TL </p>
                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> Veresiye
                                            <p class="value" style="font-size:x-large;"><?= $tahsinVeresiyeToplam; ?> TL </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 p-2">

                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Toplam Servis Kazancı</h6>

                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info" style="color:limegreen;">
                                            <p class="value" style="color:limegreen;"><?= $servisToplam; ?> TL</p>
                                            Nakit: <?php echo tahsilatTipiTopla('Nakit'); ?> TL <br>
                                            Kart: <?php echo tahsilatTipiTopla('Kart'); ?> TL<br>
                                            <!-- Iban: <?php //echo tahsilatTipiTopla('Iban'); ?> TL<br>
                                            Mail Order: <?php //echo tahsilatTipiTopla('Mail Order'); ?> TL<br> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Cihaz Satışı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info" style="color:limegreen;">Kazanç
                                            <p class="value" style="color:limegreen;font-size:x-large;"><?= $mehmetToplam; ?> TL </p>
                                            Nakit: <?php echo servisTahsilatTipiGoster('Mehmet')[0]; ?> TL <br>
                                            Kart: <?php echo servisTahsilatTipiGoster('Mehmet')[1]; ?> TL<br>
                                            Iban: <?php echo servisTahsilatTipiGoster('Mehmet')[2]; ?> TL<br>
                                            Mail Order: <?php echo servisTahsilatTipiGoster('Mehmet')[3]; ?> TL<br>
                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> İndirim
                                            <p class="value" style="font-size:x-large;"><?= $mehmetIndirimToplam; ?> TL </p>
                                        </div>
                                        <div class="w-info" style="color:#e95f2b;"> Veresiye
                                            <p class="value" style="font-size:x-large;"><?= $mehmetVeresiyeToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="borceklemodal" class="modal fade">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;">ŞİRKET BORCU</h4>
                                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    $odenenborc = 0;
                                    $odenenborcsor = $db->prepare("SELECT * FROM sirketborcu WHERE bTip =1");
                                    $odenenborcsor->execute();
                                    while ($odenenborccek = $odenenborcsor->fetch(PDO::FETCH_ASSOC)) {
                                        $odenenborc += $odenenborccek['bMiktar'];
                                    }

                                    $eklenenborc = 0;
                                    $eklenenborcsor = $db->prepare("SELECT * FROM sirketborcu WHERE bTip =0");
                                    $eklenenborcsor->execute();
                                    while ($eklenenborccek = $eklenenborcsor->fetch(PDO::FETCH_ASSOC)) {
                                        $eklenenborc += $eklenenborccek['bMiktar'];
                                    }
                                    $toplamborc = $eklenenborc - $odenenborc;
                                    ?>
                                    <div style="margin:10px auto 0 auto;">
                                        <h4 style="color:#E21818;">GÜNCEL BORÇ: <?= $toplamborc; ?> TL</h4>
                                    </div>
                                    <form method="post" id="musteriekleform" type="POST" action="../netting/ayarislem.php">
                                        <div class="modal-body row g-1" id="musteridetaybody">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1" class="mb-1">Borç Öde</label>
                                                    <input type="text" class="form-control" name="borcdus">
                                                </div>


                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1" class="mb-1">Borç Ekle</label>
                                                    <input type="text" class="form-control" name="borcekle">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1" class="mb-1">Not</label>
                                                <input type="text" class="form-control" name="not">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="borcdegistir" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <?php
                                                    $borcsor = $db->prepare("SELECT * FROM sirketborcu ORDER BY bID DESC");
                                                    $borcsor->execute();
                                                    while ($borccek = $borcsor->fetch(PDO::FETCH_ASSOC)) {
                                                        $tarih = date("d.m.Y", strtotime($borccek['bTarih']));
                                                        if ($borccek['bTip'] == 0) {
                                                            $tip = "Eklendi";
                                                        } else {
                                                            $tip = "Ödendi";
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td <?= ($tip == "Eklendi") ? "style='color:red;'" : "style='color:green;'"; ?>><?= $borccek['bMiktar'] . " " . $tip; ?></td>
                                                            <td class="text-center"><?= $tarih; ?></td>
                                                            <td class="text-center"><?= $borccek['bNot']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="widget-content widget-content-area col-lg-6 col-12">

                            <div class="table-responsive">
                                <h4>Günlük Özet</h4>
                                <table class="table table-bordered ozet">
                                    <thead>
                                        <tr style="color:#fff;">
                                            <th class="text-center" scope="col">Tarih</th>
                                            <th class="text-center" scope="col">Kazanç</th>
                                            <th class="text-center" scope="col">Yapılan İndirim</th>
                                            <th class="text-center" scope="col">Veresiye</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil ayarını yapın

                                        try {
                                            $bugun = date("Y-m-d"); // Bugünkü tarihi alın
                                            $ayinBasindanBugune = date("Y-m-01"); // Ayın başlangıç tarihini alın

                                            // Her gün için ayrı satırlar oluşturmak için döngü kullanın
                                            $currentDate = strtotime($ayinBasindanBugune);
                                            $gunler = array();
                                            while ($currentDate <= strtotime($bugun)) {
                                                $currentDateStr = date("Y-m-d", $currentDate);
                                                $gunler[] = $currentDateStr; // Günlük tarihleri bir diziye ekleyin
                                                $currentDate = strtotime("+1 day", $currentDate);
                                            }

                                            // Tarihleri ters sıralayın
                                            $tersSiralamaGunler = array_reverse($gunler);

                                            // Her bir tarih için verileri çekin ve tabloya ekleyin
                                            foreach ($tersSiralamaGunler as $currentDateStr) {
                                                // Verileri çekmek için SQL sorgusu
                                                $sql = "SELECT sTarih, sTahsilat, sIndirim,sYapilanIndirim, sVeresiye FROM servismuhasebe WHERE sTarih = :tarih";
                                                $stmt = $db->prepare($sql);
                                                $stmt->bindParam(":tarih", $currentDateStr);
                                                $stmt->execute();






                                                $gunlukKazanc = 0;
                                                $gunlukVeresiye = 0;
                                                $gunlukIndirimMiktari = 0;
                                                $yapilanindirim = 0;

                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $tutar = $row['sTahsilat'];
                                                    $indirim = $row['sIndirim'];


                                                    $yapilanindirim = $row['sYapilanIndirim'];
                                                    if (isset($tutar) && is_numeric($tutar)) {
                                                        $gunlukKazanc += $tutar;
                                                    }


                                                    $gunlukIndirimMiktari += is_numeric($yapilanindirim) ? $yapilanindirim : 0;
                                                }
                                                $veresiyemuhasebesor = $db->prepare("SELECT * FROM veresiye WHERE DATE_FORMAT(vTarih, '%Y-%m-%d') = :tarih AND vDurum = 1");
                                                $veresiyemuhasebesor->execute(array('tarih' => $currentDateStr));
                                                $veresiyemuhasebecek = $veresiyemuhasebesor->fetch(PDO::FETCH_ASSOC);
                                                $veresiyemuhasebesor = $db->prepare("SELECT * FROM veresiye WHERE DATE_FORMAT(vTarih, '%Y-%m-%d') = :tarih AND vDurum = 1");
                                                $veresiyemuhasebesor->execute(array('tarih' => $currentDateStr));
                                                while ($veresiyemuhasebecek = $veresiyemuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                                                    if (!isset($veresiyemuhasebecek['vKalan']) && $veresiyemuhasebecek['vKalan'] == null || $veresiyemuhasebecek == "0") {
                                                        $veresiye = $veresiyemuhasebecek['vTutar'];
                                                    } else {
                                                        $veresiye = $veresiyemuhasebecek['vKalan'];
                                                    }

                                                    $gunlukVeresiye += is_numeric($veresiye) ? $veresiye : 0;
                                                }
                                                $veresiyeTahsilatToplam = 0;
                                                $bugun = date('Y-m-d');
                                                $veresiyetahsilatsor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih = :tarih");
                                                $veresiyetahsilatsor->execute(array('tarih' => $currentDateStr));
                                                while ($veresiyetahsilatcek = $veresiyetahsilatsor->fetch(PDO::FETCH_ASSOC)) {
                                                    // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                                                    $veresiyetahsilat = $veresiyetahsilatcek['vtTahsilat'];
                                                    $veresiyeTahsilatToplam += $veresiyetahsilat;
                                                }
                                                if ($gunlukKazanc != "0") {
                                                    $gunlukKazanc = $gunlukKazanc + $veresiyeTahsilatToplam;
                                                }
                                                // Günlük verileri tablo içinde gösterin
                                                echo "<tr>";
                                                echo "<td class='text-center'>" . strftime('%d.%m.%Y', strtotime($currentDateStr)) . "</td>";
                                                echo "<td class='text-center' style='color:#65B741;'>" . $gunlukKazanc . " TL</td>";
                                                echo "<td class='text-center' style='color:red;'>" . $gunlukIndirimMiktari . " TL</td>";
                                                echo "<td class='text-center' style='color:red;'>" . $gunlukVeresiye . " TL</td>";
                                                echo "</tr>";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hata: " . $e->getMessage();
                                        }


                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area col-lg-6 col-12">

                            <div class="table-responsive">
                                <h4>Aylık Özet</h4>
                                <table class="table table-bordered ozet">
                                    <thead>
                                        <tr style="color:#fff;">
                                            <th class="text-center" scope="col">Tarih</th>
                                            <th class="text-center" scope="col">Kazanç</th>
                                            <th class="text-center" scope="col">Yapılan İndirim</th>
                                            <th class="text-center" scope="col">Veresiye</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $suAnkiYil = date("Y");
                                        $yilbaslangici = "$suAnkiYil-01-01";

                                        try {
                                            $sql = "SELECT sTarih, sTutar, sTahsilat, sYapilanIndirim FROM servismuhasebe WHERE sTarih >= :yilbaslangici";
                                            $stmt = $db->prepare($sql);
                                            $stmt->bindParam(":yilbaslangici", $yilbaslangici);
                                            $stmt->execute();

                                            // Aylara göre kazançları, indirimleri ve veresiye miktarlarını toplamak için diziler oluşturun
                                            $aylik_kazanc = array();
                                            $aylik_indirim = array();
                                            $aylik_veresiye = array();
                                            $aylik_tahsilat = array();

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $tarih = $row['sTarih'];
                                                $tutar = $row['sTahsilat'];
                                                $indirim = $row['sYapilanIndirim'];

                                                // Ay ve yıl bilgisini al
                                                $ay = date("Y-m", strtotime($tarih));

                                                // Değişkenleri sayıya dönüştürün veya sıfır (0) olarak ayarlayın
                                                $tutar = is_numeric($tutar) ? $tutar : 0;
                                                $indirim = is_numeric($indirim) ? $indirim : 0;

                                                // Ayı anahtar olarak kullanarak kazancı, indirimi ve veresiye miktarını toplayın
                                                if (!isset($aylik_kazanc[$ay])) {
                                                    $aylik_kazanc[$ay] = 0;
                                                    $aylik_indirim[$ay] = 0;
                                                    $aylik_veresiye[$ay] = 0;
                                                    $aylik_tahsilat[$ay] = 0;
                                                }

                                                $aylik_kazanc[$ay] += $tutar;
                                                $aylik_indirim[$ay] += $indirim;
                                                $aylik_tahsilat[$ay] = 0;
                                            }

                                            // Veresiye miktarını ayrı olarak hesaplayarak ekleyin
                                            $veresiye_sorgu = $db->prepare("SELECT vTarih, vTutar, vKalan FROM veresiye WHERE vTarih >= :yilbaslangici AND vDurum = 1");
                                            $veresiye_sorgu->bindParam(":yilbaslangici", $yilbaslangici);
                                            $veresiye_sorgu->execute();

                                            while ($veresiye_row = $veresiye_sorgu->fetch(PDO::FETCH_ASSOC)) {
                                                $veresiye_tarih = $veresiye_row['vTarih'];
                                                $veresiye_tutar = $veresiye_row['vTutar'];

                                                if (!isset($veresiye_row['vKalan']) && $veresiye_row['vKalan'] == null || $veresiye_row == "0") {
                                                    $veresiye_tutar = $veresiye_row['vTutar'];
                                                } else {
                                                    $veresiye_tutar = $veresiye_row['vKalan'];
                                                }

                                                $veresiye_ay = date("Y-m", strtotime($veresiye_tarih));

                                                if (!isset($aylik_veresiye[$veresiye_ay])) {
                                                    $aylik_veresiye[$veresiye_ay] = 0;
                                                }

                                                $aylik_veresiye[$veresiye_ay] += is_numeric($veresiye_tutar) ? $veresiye_tutar : 0;
                                            }

                                            $veresiyeTahsilatToplam = 0;
                                            $veresiyetahsilatsor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtTarih >= :yilbaslangici");
                                            $veresiyetahsilatsor->execute(array('yilbaslangici' => $yilbaslangici));
                                            while ($veresiyetahsilatcek = $veresiyetahsilatsor->fetch(PDO::FETCH_ASSOC)) {
                                                // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                                                $tahsilat_tarih = $veresiyetahsilatcek['vtTarih'];
                                                $tahsilat_tutar = $veresiyetahsilatcek['vtTahsilat'];

                                                $tahsilat_ay = date("Y-m", strtotime($tahsilat_tarih));

                                                $aylik_tahsilat[$tahsilat_ay] += is_numeric($tahsilat_tutar) ? $tahsilat_tutar : 0;
                                            }
                                            // if ($gunlukKazanc != "0") {
                                            //     $gunlukKazanc = $gunlukKazanc + $veresiyeTahsilatToplam;
                                            // }

                                            $ay = strftime('%B', strtotime($tarih));

                                            // Ay ay kazançları, indirimleri ve veresiye miktarlarını yazdırın veya işleyin
                                            foreach ($aylik_kazanc as $ay => $kazanc) {
                                                $toplam_indirim = $aylik_indirim[$ay];
                                                $toplam_veresiye = isset($aylik_veresiye[$ay]) ? $aylik_veresiye[$ay] : 0;
                                                $toplam_tahsilat = $aylik_tahsilat[$ay];
                                                $aylikToplamKazanc = $kazanc + $toplam_tahsilat;
                                                echo "<tr><td class='text-center'>" . strftime('%B', strtotime($ay)) . "</td>";
                                                echo "<td class='text-center' style='color:#65B741;'>$aylikToplamKazanc TL</td>";
                                                echo "<td class='text-center' style='color:red;'>$toplam_indirim TL</td>";
                                                echo "<td class='text-center' style='color:red;'> $toplam_veresiye TL</td></tr>";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hata: " . $e->getMessage();
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © Mert Keser</p>
                </div>

            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <script>

    </script>
    <script src="../public/src/jquery/jquery-3.6.4.min.js"></script>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../public/src/plugins/src/global/vendors.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

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