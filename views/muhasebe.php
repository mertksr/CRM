<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MK</title>
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


    </style>

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
                        <?php
                        $servisToplam = 0;
                        $satisToplam = 0;
                        $indirimToplam = 0;
                        $tutarToplam = 0;
                        $veresiyeToplam = 0;
                        $kadirToplam = 0;
                        $bedirhanToplam = 0;
                        $mehmetToplam = 0;

                        $bugun = date('Y-m-d');
                        $servismuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTuru LIKE '%Bakım%'");
                        $servismuhasebesor->execute(array('tarih' => $bugun));
                        while ($servismuhasebecek = $servismuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $servismuhasebecek['sTutar'];
                            $servisToplam += $ucret;
                        }
                        $satismuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sTuru LIKE '%Cihaz Satışı%'");
                        $satismuhasebesor->execute(array('tarih' => $bugun));
                        while ($satismuhasebecek = $satismuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $satismuhasebecek['sTutar'];
                            $satisToplam += $ucret;
                        }
                        $indirimmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih");
                        $indirimmuhasebesor->execute(array('tarih' => $bugun));
                        while ($indirimmuhasebecek = $indirimmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $indirimmuhasebecek['sIndirim'];
                            $indirimToplam += $ucret;
                        }
                        $indirimmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih");
                        $indirimmuhasebesor->execute(array('tarih' => $bugun));
                        while ($indirimmuhasebecek = $indirimmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $indirimmuhasebecek['sTutar'];
                            $tutarToplam += $ucret;
                        }
                        $veresiyemuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih");
                        $veresiyemuhasebesor->execute(array('tarih' => $bugun));
                        while ($veresiyemuhasebecek = $veresiyemuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $veresiyemuhasebecek['sVeresiye'];
                            $veresiyeToplam += $ucret;
                        }
                        $kadirmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $kadirmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'kadir'));
                    
                        while ($kadirmuhasebecek = $kadirmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $kadirmuhasebecek['sTutar'];
                            $kadirToplam += $ucret;
                        }
                        $bedirhanmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $bedirhanmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'bedirhan'));
                        while ($bedirhanmuhasebecek = $bedirhanmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $bedirhanmuhasebecek['sTutar'];
                            $bedirhanToplam += $ucret;
                        }
                        $mehmetmuhasebesor = $db->prepare("SELECT * FROM servismuhasebe WHERE sTarih = :tarih AND sPersonel = :personel");
                        $mehmetmuhasebesor->execute(array('tarih' => $bugun, 'personel' => 'mehmet'));
                    
                        while ($mehmetmuhasebecek = $mehmetmuhasebesor->fetch(PDO::FETCH_ASSOC)) {
                            // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                            $ucret = $mehmetmuhasebecek['sTutar'];
                            $mehmetToplam += $ucret;
                        }
                        ?>


                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Servis Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $servisToplam; ?> TL</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Satış Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $satisToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Yapılan İndirim</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:crimson;"><?= $tutarToplam - $indirimToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Veresiye</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:crimson;"><?= $veresiyeToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Bedirhan'ın Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $bedirhanToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Kadir'in Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $kadirToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Mehmet'in Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;"><?= $mehmetToplam; ?> TL </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Şirket Borcu</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:burlywood;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="widget-content widget-content-area col-6">

                            <div class="table-responsive">
                                <h4>Günlük Özet</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
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
    try {
        $db = new PDO("mysql:host=localhost;dbname=pnr;charset=utf8", "root", "");
       } catch (PDOException $e) {
        print $e->getMessage();
       }
    $bugun = date("Y-m-d"); // Bugünkü tarihi alın
    $sonYediGunTarihi = date("Y-m-d", strtotime("-7 days")); // Bugünden 7 gün önceki tarihi alın
    
    // Her gün için ayrı satırlar oluşturmak için döngü kullanın
    $currentDate = strtotime($sonYediGunTarihi);
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
        $sql = "SELECT sTarih, sTutar, sIndirim, sVeresiye FROM servismuhasebe WHERE sTarih = :tarih";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tarih", $currentDateStr);
        $stmt->execute();
        
        // Günlük kazanç, indirim ve veresiye miktarlarını hesaplayın
        $gunlukKazanc = 0;
        $gunlukIndirim = 0;
        $gunlukVeresiye = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tutar = $row['sTutar'];
            $indirim = $row['sIndirim'];
            $veresiye = $row['sVeresiye'];
            
            $gunlukKazanc = is_numeric($tutar) ? $tutar : 0;
            $indirim = is_numeric($indirim) ? $indirim : 0;
            $gunlukIndirim = $gunlukKazanc - $indirim;
            $gunlukVeresiye = is_numeric($veresiye) ? $veresiye : 0;
        }
        
        // Günlük verileri tablo içinde gösterin

        echo "<tr>";
        echo "<td class='text-center'>" . strftime('%d.%m.%Y', strtotime($currentDateStr)) . "</td>";
        echo "<td class='text-center' style='color:limegreen;'>" . number_format($gunlukKazanc, 2, ',', '.') . " TL</td>";
        echo "<td class='text-center' style='color:crimson;'>" . number_format($gunlukIndirim, 2, ',', '.') . " TL</td>";
        echo "<td class='text-center' style='color:crimson;'>" . number_format($gunlukVeresiye, 2, ',', '.') . " TL</td>";
        echo "</tr>";
    }
    
    // Veritabanı bağlantısını kapatın
    $db = null;
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area col-6">

<div class="table-responsive">
    <h4>Aylık Özet</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
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
    try {
        $db = new PDO("mysql:host=localhost;dbname=pnr;charset=utf8", "root", "");
       } catch (PDOException $e) {
        print $e->getMessage();
       }
    $sql = "SELECT sTarih, sTutar, sIndirim, sVeresiye FROM servismuhasebe WHERE sTarih >= :yilbaslangici";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":yilbaslangici", $yilbaslangici);
    $stmt->execute();
    
    // Aylara göre kazançları, indirimleri ve veresiye miktarlarını toplamak için diziler oluşturun
    $aylik_kazanc = array();
    $aylik_indirim = array();
    $aylik_veresiye = array();
    


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tarih = $row['sTarih'];
        $tutar = $row['sTutar'];
        $indirim = $row['sIndirim'];
        $veresiye = $row['sVeresiye'];
        setlocale(LC_TIME, 'tr_TR.utf8');
        // Tarihten ayı ayıklayın
        $ay = date("Y-m", strtotime($tarih));
        $ay = strftime('%B', strtotime($tarih)); // Türkçe ay adı

        // Değişkenleri sayıya dönüştürün veya sıfır (0) olarak ayarlayın
        $tutar = is_numeric($tutar) ? $tutar : 0;
        $indirim = is_numeric($indirim) ? $indirim : 0;
        $veresiye = is_numeric($veresiye) ? $veresiye : 0;
    
        // Ayı anahtar olarak kullanarak kazancı, indirimi ve veresiye miktarını toplayın
        if (!isset($aylik_kazanc[$ay])) {
            $aylik_kazanc[$ay] = 0;
            $aylik_indirim[$ay] = 0;
            $aylik_veresiye[$ay] = 0;
        }
        $aylik_kazanc[$ay] += $tutar;
        $aylik_indirim[$ay] += $indirim;
        $aylik_veresiye[$ay] += $veresiye;
    }
    
    // Ay ay kazançları, indirimleri ve veresiye miktarlarını yazdırın veya işleyin
    foreach ($aylik_kazanc as $ay => $kazanc) {
        $indirim = $kazanc - $aylik_indirim[$ay];
        $toplam_indirim = $indirim;
        $toplam_veresiye = $aylik_veresiye[$ay];
        
        echo "<tr><td class='text-center'>$ay</td>";
        echo "<td class='text-center' style='color:limegreen;'>$kazanc TL</td>";
        echo "<td class='text-center' style='color:crimson;'>$toplam_indirim TL</td>";
        echo "<td class='text-center' style='color:crimson;'>$toplam_veresiye TL</td></tr>";
    }
    
    // Veritabanı bağlantısını kapatın
    $db = null;
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
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg></p>
                </div>
            </div>s
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