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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <!-- END PAGE LEVEL STYLES -->
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

                        <?php if (isset($_GET['no'])) { ?> <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <?php
                                $msor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = :mno");
                                $msor->execute(array(
                                    'mno' => $_GET['no']
                                ));
                                $mcek = $msor->fetch(PDO::FETCH_ASSOC);



                                ?>
                                <h4 style='color:red'>Bütün işlemler gösteriliyor </h4>


                                <!-- <div class="statbox widget box box-shadow"> <a href="musteriler.php" class="btn btn-dark">Geri Dön</a><br><br> -->
                                <div>

                                    <h4 style="float:left;"><?= $mcek['mAdSoyad'] . ' / ' . $mcek['mBolge']; ?></h4>



                                    <button type="button" class="btn special1 mb-2" style="color:#EFF5F5;margin:0 0 10px 10px;" name="islemeklemodalbtn" id="islemeklemodalbtn" data-bs-toggle="modal" data-bs-target="#islemeklemodal" class="btn btn-warning">İşlem Ekle</button>

                                </div>

                                <div class="widget-content widget-content-area">

                                    <table id="islemler" class="table dt-table-hover display nowrap" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>Yapan Kişi</th>
                                                <th>İşlem Zamanı</th>
                                                <th>İşlem Türü</th>
                                                <th>Tam Fiyat</th>
                                                <th>Not</th>
                                                <th>Detay</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $islemsor = $db->prepare("SELECT * from islemler WHERE islemMusteriNo = :islemMusteriNo ORDER BY islemTarihi DESC");

                                        $islemsor->execute(array(
                                            'islemMusteriNo' => $_GET['no']
                                        ));
                                        $say = 0;
                                        while ($islemcek = $islemsor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
                                            $islemturu = unserialize($islemcek['islemTuru']);
                                            if ($islemcek['islemIndirimliFiyat'] != 0) {
                                                $alınanucret = $islemcek['islemIndirimliFiyat'];
                                            } else {
                                                $alınanucret = $islemcek['islemUcret'];
                                            }
                                            $alınanucretfrmt = number_format($alınanucret, 2, ',', '.');          ?>

                                            <tr>
                                                <td><?= $say; ?></td>
                                                <td><?= $islemcek['islemYapanKisi']; ?></td>
                                                <td><?= date("d.m.Y H:i", strtotime($islemcek['islemTarihi'])); ?></td>
                                                <td><?= implode(", ", $islemturu);  ?></td>

                                                <td><?= $alınanucretfrmt; ?> TL</td>

                                                <td><?= $islemcek['islemNot']; ?> </td>

                                                <td style="max-width:20px;">
                                                    <div class="text-center">
                                                        <button type="button" name="detay" value="detay" data-adsoyad="<?= $mcek['mAdSoyad']; ?>" id="<?php echo $islemcek["islemId"]; ?>" class="btn btn-ozel mr-2 detay">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                    </div>

                <?php } else {
                            /*********  Randevu zamanı değişkenini değiştiren kod altta olunca çalışmadığı için burası yukarıda ********/
                            $islemsor = $db->prepare("SELECT * from islemler ORDER BY islemTarihi DESC");
                            $randevuzamani = "<h4 style='color:red'>Bugün yapılan işlemler gösteriliyor </h4>";
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['buton'])) {
                                    if ($_POST['buton'] == 'butunservis') {
                                        $islemsor = $db->prepare("SELECT * from islemler ORDER BY islemTarihi DESC");
                                        $randevuzamani = "<h4 style='color:red'></h4>";
                                    } elseif ($_POST['buton'] == 'bugununservisi') {
                                        $bugun = date("Y-m-d");
                                        $islemsor = $db->prepare("SELECT * from islemler WHERE DATE(islemTarihi) ='$bugun'ORDER BY islemTarihi DESC");

                                        $randevuzamani = "<h4 style='color:red'>Bugün yapılan işlemler gösteriliyor </h4>";
                                    }
                                }
                            }
                            /***********************************/
                ?>
                    <?php
                            echo $randevuzamani; ?>
                    <form method='POST'>
                        <button class="btn btn-primary" type="submit" name="buton" value="bugununservisi">Bugün Yapılan İşlemler</button>
                        <button class="btn btn-primary" type="submit" name="buton" value="butunservis">Bütün İşlemler</button>


                    </form>
                    <br><br>
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


                        <div class="statbox widget box box-shadow">
                            <!-- <div style="display:flex;justify-content:space-between;">
                                        <a href="musteriler.php" class="btn special1" style="color:#EFF5F5;float:left;max-height:37px;">Geri Dön</a><br><br>
                                    </div> -->

                            <div class="widget-content widget-content-area">

                                <table id="islemler" class="table dt-table-hover display nowrap" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Müşteri</th>
                                            <th>Bölge</th>
                                            <th>Yapan Kişi</th>
                                            <th>İşlem Zamanı</th>
                                            <th>İşlem Türü</th>
                                            <th>Tam Fiyat</th>
                                            <th>Not</th>
                                            <th>Detay</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $islemsor->execute();
                                    $say = 0;
                                    while ($islemcek = $islemsor->fetch(PDO::FETCH_ASSOC)) {
                                        $say++;
                                        $islemturu = unserialize($islemcek['islemTuru']);
                                        if ($islemcek['islemIndirimliFiyat'] != 0) {
                                            $alınanucret = $islemcek['islemIndirimliFiyat'];
                                        } else {
                                            $alınanucret = $islemcek['islemUcret'];
                                        }
                                        $alınanucretfrmt = number_format($alınanucret, 2, ',', '.');
                                        $msor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = :mMusteriNo");
                                        $msor->execute(array(
                                            'mMusteriNo' => $islemcek['islemMusteriNo']
                                        ));
                                        $mcek = $msor->fetch(PDO::FETCH_ASSOC)
                                    ?>

                                        <tr>
                                            <td style="width:10px;"><?= $say; ?></td>
                                            <td><?= $mcek['mAdSoyad']; ?></td>
                                            <td><?= $mcek['mBolge']; ?></td>
                                            <td><?= $islemcek['islemYapanKisi']; ?></td>
                                            <td><?= date("d.m.Y H:i", strtotime($islemcek['islemTarihi'])); ?></td>
                                            <td><?= implode(", ", $islemturu);  ?></td>

                                            <td><?= $alınanucretfrmt; ?> TL</td>

                                            <td><?= $islemcek['islemNot']; ?> </td>

                                            <td style="max-width:20px;">
                                                <div class="text-center">
                                                    <button type="button" name="detay" value="detay" data-adsoyad="İşlem Ekle" id="<?php echo $islemcek["islemId"]; ?>" class="btn btn-ozel mr-2 detay">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                </div>


            </div>

        </div>
        <div id="detayModal" class="modal fade contact-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;">İşlem Detayları</h4>
                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row g-1" id="musteridetaybody"></div>
                </div>
            </div>
        </div>

        <div id="islemeklemodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:#E21818; margin:auto;text-transform:uppercase;">İşlem Ekle</h4>
                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id="islemekleform" action="../netting/islemislem.php" enctype="multipart/form-data">
                        <div class="modal-body row g-1" id="musterieklebody">


                            <div class="col-12">
                                <label for="defaultInputState" class="form-label ">Hizmet Türü</label>
                                <select id="hizmetler" name="hizmetler[]" placeholder="Ürün Seçiniz" multiple>
                                    <?php

                                    $hizmetsor = $db->prepare("SELECT * FROM hizmetler");
                                    $hizmetsor->execute();
                                    while ($hizmetcek = $hizmetsor->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?= $hizmetcek['HizmetTuru'] ?>"><?= $hizmetcek['HizmetTuru'] ?></option>

                                    <?php  } ?>
                                </select>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <label for="defaultInputState" class="form-label ">Kullanılan
                                    Ürünler</label>
                                <select id="choices-multiple-remove-button" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
                                    <?php

                                    $urunsor = $db->prepare("SELECT * FROM urunler");
                                    $urunsor->execute();
                                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?= $uruncek['urunid']; ?>"><?= $uruncek['urunAd']; ?></option>
                                    <?php  } ?>

                                </select>
                            </div>


                            <div class="col-12 col-lg-12 col-md-12">
                                <label for="inputAddress" class="form-label">İşlem Ücreti</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" id="islemtutari" name="islemucreti" readonly style="color:#505463;">
                                    <button class="btn btn-outline-primary" style="z-index:0;" type="button" id="makediscount">İndirim Uygula</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Tahsilat</label>
                                <input type="text" class="form-control" name="tahsilat" oninput="veresiyeHesapla()" id="tahsilat">
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Veresiye</label>
                                <input type="text" class="form-control" name="veresiye" readonly style="color:crimson;" id="veresiye">
                            </div>

                            <div class="col-12">
                                <label for="defaultInputState" class="form-label ">Tahsilat Tipi</label>
                                <select id="defaultInputState" name="tahsilattipi" class="form-select">
                                    <option selected="">Seç</option>
                                    <option value="nakit">Nakit</option>
                                    <option value="kredikarti">Kredi Kartı Pos</option>
                                    <option value="eft">EFT</option>
                                    <option value="mailorder">Mail Order</option>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="defaultInputState" class="form-label ">İşlemi Yapan</label>
                                <select form="islemekleform" id="defaultInputState" name="islemyapan" class="form-select">
                                    <option value="">Seç</option>
                                    <option name="Mehmet">Mehmet</option>
                                    <option name="Bedirhan">Bedirhan</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Notlar</label>
                                <input type="text" class="form-control" name="islemnotlari" id="inputAddress2">
                            </div>


                            <input type="hidden" form="islemekleform" name="periyot" value="<?= $mcek['mPeriyot']; ?>">
                            <input type="hidden" form="islemekleform" name="tamfiyat" id="tamfiyat">
                            <input type="hidden" form="islemekleform" name="indirimlifiyat" id="indirimtutari">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="islemekle" class="btn btn-success " style="color:#EFF5F5;">Kaydet</button>
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
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <script>
        
        $(document).ready(function() {

            $("#choices-multiple-remove-button").on("change", function() {
                var selectedValues = $("#choices-multiple-remove-button").val();
                var selectedString = selectedValues.join(",");

                $.ajax({
                    url: "../netting/urunlericagir.php",
                    method: "POST",
                    data: {
                        products: selectedString
                    }
                }).done(function(response) {
                    // AJAX isteği tamamlandığında, fiyatları alın
                    var prices = JSON.parse(response);
                    // Toplam fiyatı hesaplayın
                    var total = 0;
                    for (var i = 0; i < prices.length; i++) {
                        total += parseFloat(prices[i]);
                    }

 
                    $("#tahsilat").val(total);
                    $("#tamfiyat").val(total);
                    $("#indirimtutari").val("0");
                    $("#islemtutari").val($("#tamfiyat").val());
                });

            });



            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true
                // searchResultLimit: 5,
                // renderChoiceLimit: 8
            });

            $("#hizmetler").on("change", function() {
                var selectedValues = $("#hizmetler").val();
                var selectedString = selectedValues.join(",");
            });

            var multipleCancelButton = new Choices('#hizmetler', {
                removeItemButton: true
            });



            $("#makediscount").click(function() {
                var fiyat = $("#islemtutari").val();
                if (fiyat == "0" || fiyat == "" || fiyat == null) {
                    alert("Ürün seçmeden indirim yapamazsınız!");
                    return false;
                } else {
                    // $("#makediscount").off("click"); 
                    $("#makediscount").removeClass('btn-outline-primary');
                    $("#makediscount").addClass('btn-outline-danger');

                    $.ajax({
                        url: "../netting/ayarcek.php",
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var fiyat = parseFloat($("#islemtutari").val());
                            var basamak = fiyat.toString().length;
                            var indirim_tutari = fiyat * 0.1;
                            var yeni_fiyat = fiyat - indirim_tutari;
                            var roundedPrice;
                            if (basamak == 4 || basamak == 5) {
                                roundedPrice = Math.floor(yeni_fiyat / 100) * 100;
                                if (yeni_fiyat - roundedPrice >= 50) {
                                    roundedPrice += 100;
                                }
                            } else if (basamak == 3 || basamak == 2) {
                                roundedPrice = Math.floor(yeni_fiyat / 10) * 10;
                            }
                            $("#tahsilat").val(roundedPrice);
                            $("#islemtutari").val(roundedPrice);
                            $("#indirimtutari").val(roundedPrice);
                        }

                    });

                }
            });


            $(document).on('click', '.detay', function() {
                var adsoyad = $(this).attr("data-adsoyad");
                var islemId = $(this).attr("id");

                if (islemId != '') {
                    $.ajax({
                        url: "../netting/islemdetaygetir.php",
                        method: "POST",
                        data: {
                            islemId: islemId
                        },
                        success: function(data) {

                            $('#musteridetaybody').html(data);
                            $('#detayModal').modal('show');

                        }
                    });
                }
            });

        });
        function veresiyeHesapla() {
            // Tahsilat miktarını al
            var costid = "islemtutari";
             var costval = document.getElementById(costid).value;
            var tahsilatMiktarı = parseFloat(document.getElementById('tahsilat').value);
            
            // Eğer tahsilat miktarı bir sayı değilse veya boşsa, borcu sıfırla
            if (isNaN(tahsilatMiktarı) || tahsilatMiktarı === "") {
                document.getElementById('veresiye').value = 0;
            } else {
                // Tahsilat miktarını değiştirip borcu hesapla
                var borcMiktarı = costval- tahsilatMiktarı;
                document.getElementById('veresiye').value = borcMiktarı;
            }
        }
    </script>

    <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
    <script src="../public/src/fontawesome/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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