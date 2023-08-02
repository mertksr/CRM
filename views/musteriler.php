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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <script src="../public/src/fontawesome/all.js"></script>
    <script src="../public/src/jquery/jquery-3.6.4.min.js"></script>
    
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

        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc:after {
            display: none !important;
        }
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="statbox widget box box-shadow"></div>
                            <div style="display:flex;justify-content:right;">
                                <button type="button" class="btn special1 mr-2" style="color:#EFF5F5;" name="musterieklemodalbtn" id="musterieklemodalbtn" data-bs-toggle="modal" data-bs-target="#musterieklemodal" class="btn btn-warning">Yeni Müşteri</button>

                            </div>

                            <div class="widget-content widget-content-area">
                                <table id="musteriler" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>


                                            <th style="max-width:50px;"><input type="text" class="form-control" id="specialsearch" placeholder="Ad Soyad"></th>

                                            <th style="max-width:30px;"><input type="text" class="form-control" id="specialsearch" placeholder="Bölge"></th>
                                            <th style="max-width:10px;text-align:center;">Önceki Bakım</th>
                                            <th style="max-width:10px;text-align:center;"><input type="text" class="form-control" id="specialsearch" placeholder="Bakım"></th>
                                            <th style="max-width:10px;text-align:center;"><input type="text" class="form-control" id="specialsearch" placeholder="Sonraki Bakım"></th>
                                            <th style="max-width:20px;text-align:center;">İletişim</th>
                                            <th style="max-width:20px;text-align:center;">Randevu</th>
                                            <th style="max-width:20px;text-align:center;">Servis</th>
                                            <th style="max-width:20px;text-align:center;">Satış</th>

                                            <th style="max-width:20px;text-align:center;">İşlemler</th>

                                        </tr>
                                    </thead>
                                    <tbody id="musterilerbody">
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


                                            $query = "SELECT * FROM islemler WHERE islemMusteriNo = :customer_id AND islemTuru LIKE '%Bakım%' ORDER BY islemTarihi DESC LIMIT 1";
                                            $islemsor = $db->prepare($query);
                                            $islemsor->bindParam(':customer_id', $mustericek['mMusteriNo']);


                                            $islemsor->execute();
                                            $count = $islemsor->rowCount();
                                            $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                            // $islemturu = unserialize($islemcek['islemTuru']);
                                            // if (in_array('Periyodik Bakım', $array)) {
                                            //     echo "Periyodik Bakım bulundu!";
                                            // }
                                            if ($count == 1) {
                                                setlocale(LC_TIME, "tr_TR"); // Türkçe yerel ayarlarını kullan
                                                $tarih = date('d.m.Y', strtotime($islemcek['islemTarihi']));
                                                $sonrakibakim = date('d.m.Y', strtotime('+' . $mustericek['mPeriyot'] . ' months', strtotime($islemcek['islemTarihi'])));
                                                $sonrakibakim = strftime("%B %Y", strtotime($sonrakibakim));
                                                $sonrakibakim = iconv('ISO-8859-9', 'UTF-8', $sonrakibakim);
                                            } else {
                                                $tarih = "BAKIM BİLGİSİ YOK";
                                                $sonrakibakim = date('d.m.Y', strtotime($mustericek['mSonrakiBakim']));
                                                $sonrakibakim = strftime("%B %Y", strtotime($sonrakibakim));
                                                $sonrakibakim = iconv('ISO-8859-9', 'UTF-8', $sonrakibakim);
                                            }
                                            


                                            


                                        ?>


                                            <tr>

                                                <td style="text-transform:uppercase;"><?= $mustericek['mAdSoyad']; ?></td>
                                                <td><?php echo $mustericek['mBolge']; ?></td>

                                                <td style="text-align:center;"><?php echo $tarih; ?></td>
                                                <td style="text-align:center;text-transform:uppercase;"><?php

                                                                                                        echo $mustericek['mPeriyot'] . " Ay";
                                                                                                        ?>
                                                </td>
                                                <td style="text-align:center;text-transform:uppercase;"><?php echo $sonrakibakim; ?>

                                                <td style="max-width:20px;">
                                                    <div class="text-center">
                                                        <button type="button" name="detay" value="detay" data-adsoyad="<?= $mustericek['mAdSoyad']; ?>" id="<?php echo $mustericek["mMusteriNo"]; ?>" class="btn btn-ozel mr-2 detay">
                                                            <i class="fa-solid fa-address-book"></i>
                                                        </button>
                                                    </div>

                                                </td>




                                                <td style="max-width:20px;">
                                                    <div class="text-center">
                                                        <button type="button" class="btn special1 mr-2" style="color:#EFF5F5;" data-bs-toggle="modal" data-bs-target="#randevu<?php echo $modalId; ?>">
                                                            <i class="fa-solid fa-calendar-plus"></i>
                                                        </button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade randevumodal" id="randevu<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <h4 class="modal-title" id="exampleModalLabel" style="color:#E21818; margin:auto;text-transform:uppercase;"><?php echo $mustericek['mAdSoyad']; ?></h4>

                                                                    <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                </div>
                                                                <div class="modal-body row">

                                                                    <form id="formRandevu-<?= $say; ?>" method="POST">
                                                                        <div class="row g-1">

                                                                            <div class="col-6">
                                                                                <label for="defaultInputState" class="form-label ">Hizmet Türü</label>
                                                                                <select id="defaultInputState" form="formRandevu-<?= $say; ?>" name="hizmetturu" class="form-select">
                                                                                    <option selected="">Seç</option>
                                                                                    <?php

                                                                                    $hizmetsor = $db->prepare("SELECT * FROM hizmetler");
                                                                                    $hizmetsor->execute();
                                                                                    while ($hizmetcek = $hizmetsor->fetch(PDO::FETCH_ASSOC)) {
                                                                                      


                                                                                    ?>
                                                                                            <option value="<?= $hizmetcek['HizmetTuru'] ?>"><?= $hizmetcek['HizmetTuru'] ?></option>

                                                                                    <?php 
                                                                                    } ?>

                                                                                </select>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <label for="defaultInputState" class="form-label ">Teknisyen</label>
                                                                                <select id="defaultInputState" form="formRandevu-<?= $say; ?>" name="teknisyen" class="form-select">
                                                                                    <option selected="">Seç</option>
                                                                                    <option value="Bedirhan">Bedirhan</option>
                                                                                    <option value="Kadir">Kadir</option>
                                                                                    <option value="Mehmet">Mehmet</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label for="defaultInputState" class="form-label ">Randevu Tarih</label>
                                                                                <input type="date" form="formRandevu-<?= $say; ?>" name="randevutarihi" style="text-transform:uppercase;" class="form-control" value="<?= date("Y-m-d", strtotime("+1 day")); ?>">

                                                                            </div>
                                                                            <div class="form-group col-8">
                                                                                <label for="exampleFormControlInput1">Notlar</label>
                                                                                <input type="text" form="formRandevu-<?= $say; ?>" name="notlar" style="text-transform:uppercase;" class="form-control">

                                                                            </div>
                                                                            <input type="hidden" name="musterino" form="formRandevu-<?= $say; ?>" value="<?= $mustericek['mMusteriNo']; ?>">

                                                                            <input type="hidden" id="modalid" name="modalid" form="formRandevu-<?= $say; ?>" value="<?php echo $modalId; ?>">

                                                                        </div>


                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit" form="formRandevu-<?= $say; ?>" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>


                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td style="max-width:20px;">
                                                    <div class="text-center">

                                                        <a class="btn btn-ozel mr-2 musteriduzenlebtn" href='islemler.php?no=<?= $mustericek['mMusteriNo']; ?>'>
                                                            <i class="fa-solid fa-gears"></i>
                                                        </a>
                                                    </div>

                                                </td>
                                                

                                                <td style="max-width:20px;">
                                                    <div class="text-center">
                                                        <a  class="btn btn-ozel mr-2" style="color:#EFF5F5;" href="satislar.php?no=<?= $mustericek['mMusteriNo']; ?>">
                                                        <i class="fas fa-sack-dollar"></i>
                                                        </a>
                                                    </div>
                                                    <!-- Modal -->


                                                <td style="text-align:center;">
                                                    <div class="btn-group ">
                                                        <a class="btn btn-dark btn-sm btn-ozel" href='musteriduzenle.php?no=<?= $mustericek['mMusteriNo']; ?>'>Düzenle</a>
                                                                                                    
                                                    <a class="btn btn-sm btn-ozel btn-outline" data-bs-toggle="modal" data-bs-target="#ertele<?php echo $modalId; ?>">
                                                    Ertele
                                                    </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="ertele<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body row">

                                                            <div class="row g-1">
                                                                <h5 style="color:red;">SADECE BİRİNİ SEÇİN</h5>
                                                                <form action="../netting/musteriislem.php" method="POST" id="erteleform">

                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Kaç Ay </label>
                                                                        <input type="text" name="erteleay" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Hangi Tarih</label>
                                                                        <input type="date" name="erteletarih" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                    </div>
                                                                    <input type="hidden" name="sonrakibakimtarihi" value="<?= $mustericek['mSonrakiBakim']; ?>">

                                                                    <input type="hidden" name="musterino" value="<?= $mustericek['mMusteriNo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="bakimertele" type="submit">Ertele</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- <div id="detayModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Employee Details</h4>
                    </div>
                    <div class="modal-body" id="musteridetaybody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
    </div>
    <div id="detayModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;"><?php echo $mustericek['mAdSoyad']; ?></h4>
                    <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row" id="musteridetaybody"></div>
            </div>
        </div>
    </div>
    <div id="musterieklemodal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;">Müşteri Ekle</h4>
                    <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="musteriekleform" type="POST" action="../netting/musteriislem.php">
                    <div class="modal-body row g-1" id="musteridetaybody">


                        <div class="form-group col-12">
                            <label for="exampleFormControlInput1" class="mb-1">Ad Soyad</label>
                            <input type="text" class="form-control" name="adsoyad" id="adsoyad">
                        </div>

                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="mb-1">Tel1</label>
                            <input type="text" class="form-control" name="tel1" id="tel1">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1" class="mb-1">Tel2</label>
                            <input type="text" class="form-control" name="tel2" id="tel2">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="defaultInputState" class="form-label mb-1">Bölge</label>
                            <select id="bolge" name="bolge" class="form-select">
                                <option>Seçim yapın</option>
                                <?php

                                $bolgesor = $db->prepare("SELECT * FROM neighborhood WHERE DistrictID = 335 ORDER BY NeighborhoodName ASC");
                                $bolgesor->execute();
                                while ($bolgecek = $bolgesor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?= $bolgecek['NeighborhoodName']; ?>"><?= $bolgecek['NeighborhoodName']; ?></option>
                                <?php  } ?>

                            </select>
                        </div>
                        <div class="input-group col-6">

                            <input type="text" form="musteriekleform" class="form-control" name="konum" id="konum" readonly placeholder="Konum Bul">
                            <button class="btn btn-outline-primary" type="button" onclick="getLocation()">Konum
                                Bul</button>
                            <button class="btn btn-outline-success" type="button" onclick="goLocation()" id="goLocationBtn">Haritada
                                Aç</button>
                        </div>

                        <div class="form-group col-12">
                            <label for="exampleFormControlInput1" class="mb-1">Adres</label>
                            <input type="text" class="form-control" name="adres" id="adres">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleFormControlInput1" class="mb-1">Notlar</label>
                            <input type="text" class="form-control" name="notlar" id="notlar">
                        </div>
                        <div class=" col-12">
                            <label for=" defaultInputState" class="form-label ">Cihaz</label>
                            <select id="defaultInputState" name="cihaz" class="form-select select">
                                <option value="">Seçim yapın</option>

                           <?php 
                                $cihazsor = $db->prepare("SELECT * FROM urunler WHERE urunCinsi = 1 || urunCinsi = 2 || urunCinsi = 3 ORDER BY urunAd ASC");
                                $cihazsor->execute();
                                while ($cihazcek = $cihazsor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?= $cihazcek['urunAd']; ?>"><?= $cihazcek['urunAd']; ?></option>
                                <?php  } ?>

                            </select>
                        </div>
                        <div class=" col-12">
                            <label for=" defaultInputState" class="form-label ">Bakım Periyodu</label>
                            <select id="defaultInputState" name="periyot" class="form-select select">
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="3">3</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="musteriekle" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>
                    </div>


                </form>
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
        $(document).ready(function() {


            $(document).on('click', '.detay', function() {
                var adsoyad = $(this).attr("data-adsoyad");
                var mMusteriNo = $(this).attr("id");
                if (mMusteriNo != '') {
                    $.ajax({
                        url: "../netting/musteridetaygetir.php",
                        method: "POST",
                        data: {
                            mMusteriNo: mMusteriNo
                        },
                        success: function(data) {
                            $('#detaymodaladsoyad').html(adsoyad);
                            $('#musteridetaybody').html(data);
                            $('#detayModal').modal('show');
                        }
                    });
                }
            });
        });

        $("form[id^='formRandevu']").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize(); // Form verilerini toplar ve string halinde döndürür
            $.ajax({
                type: "POST",
                url: "../netting/randevuekle.php", // Verilerin kaydedileceği PHP dosyasının URL'si
                data: formData,
                success: function(response) {
                    // AJAX isteği başarılıysa burada yapılacak işlemler
                    alert("Veriler başarıyla kaydedildi.");
                    $("form[id^='formRandevu'] input[type='text'], form[id^='formRandevu'] select").val('');
                },
                error: function() {
                    // AJAX isteği başarısız olduğunda burada yapılacak işlemler
                    alert("Veriler kaydedilirken bir hata oluştu.");
                }
            });
        });

        $("form[id^='formSatis']").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize(); // Form verilerini toplar ve string halinde döndürür
            $.ajax({
                type: "POST",
                url: "../netting/satisekle.php", // Verilerin kaydedileceği PHP dosyasının URL'si
                data: formData,
                success: function(response) {
                    // AJAX isteği başarılıysa burada yapılacak işlemler
                    alert("Veriler başarıyla kaydedildi.");
                    $("form[id^='formSatis'] input[type='text'], form[id^='formSatis'] select").val('');

                },
                error: function() {
                    // AJAX isteği başarısız olduğunda burada yapılacak işlemler
                    alert("Veriler kaydedilirken bir hata oluştu.");
                }
            });
        });

        var locationInput = document.getElementById("konum");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                locationInput.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            locationInput.value = position.coords.latitude + "," + position.coords.longitude;
        }

        const goLocationBtn = document.getElementById("goLocationBtn");

        function goLocation() {
            if (locationInput.value == "") {
                alert("Önce Konumunuzu Bulmalısınız")
            } else {
                window.open('https://maps.google.com/?q=' + locationInput.value, '_blank');
                // goLocationBtn.target= '_blank';
                // window.location.href = "https://maps.google.com/?q=" + locationInput.value;
            }

        }
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