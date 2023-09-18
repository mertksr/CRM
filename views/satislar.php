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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <script src="../public/src/fontawesome/all.js"></script>
    <style>
        .contact-modal {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
        }

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
                        if (isset($_GET['no'])) {
                            $msor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = :mno");
                            $msor->execute(array(
                                'mno' => $_GET['no']
                            ));
                            $mcek = $msor->fetch(PDO::FETCH_ASSOC);
                        }

                        ?>
                        <?php if (isset($_GET['no'])) { ?> <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="statbox widget box box-shadow">

                                    <h4 style="float:left;"><?= $mcek['mAdSoyad'] . ' / ' . $mcek['mBolge']; ?></h4>
                                    <button type="button" class="btn special1 mb-2" style="color:#EFF5F5;margin:0 0 10px 10px;" name="satiseklemodalbtn" id="satiseklemodalbtn" data-bs-toggle="modal" data-bs-target="#satiseklemodal" class="btn btn-warning">Satış Ekle</button>

                                    <div class="widget-content widget-content-area">

                                        <table id="islemler" class="table dt-table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Müşteri Ad Soyad</th>
                                                    <th>Bölge</th>
                                                    <th>Ürün</th>
                                                    <th>Satış Tarihi</th>
                                                    <th style="max-width:40px;">Garanti</th>
                                                    <th>Garanti Bitiş</th>

                                                    <th>İşlemler</th>


                                                </tr>
                                            </thead>
                                            <?php
                                            $satissor = $db->prepare("SELECT * from satislar where sMID=:id");
                                            $satissor->execute(array('id' => $_GET['no']));
                                            $say = 0;
                                            while ($satiscek = $satissor->fetch(PDO::FETCH_ASSOC)) {
                                                $say++;
                                                $msor = $db->prepare("SELECT * from musteriler where mMusteriNo=:id");
                                                $msor->execute(array('id' => $satiscek['sMID']));
                                                $mcek = $msor->fetch(PDO::FETCH_ASSOC);
                                                $urunsor = $db->prepare("SELECT * FROM urunler");
                                                $urunsor->execute();
                                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
                                                $islemurun = [];
                                                $kullanilanurun = unserialize($satiscek['sUrun']);
                                                foreach ($kullanilanurun as $urunid) {
                                                    foreach ($urunler as $urun) {
                                                        if ($urunid == $urun['urunid']) {
                                                            array_push($islemurun, $urun['urunAd']);
                                                        }
                                                    }
                                                }
                                            ?>

                                                <tr>
                                                    <td><?= $say; ?></td>
                                                    <td><?= $mcek['mAdSoyad']; ?></td>
                                                    <td><?= $mcek['mBolge']; ?></td>
                                                    <td><?= implode(", ", $islemurun) ?></td>
                                                    <td><?= date("d.m.Y", strtotime($satiscek['sTarih'])); ?></td>
                                                    <td><?= $satiscek['sGarantiSuresi']; ?> Yıl</td>
                                                    <td><?= date("d.m.Y", strtotime($satiscek['sGarantiBitis'])); ?></td>




                                                    <td style="max-width:20px;">
                                                        <div class="text-center">
                                                            <button type="button" name="detay" value="detay" data-adsoyad="<?= $mcek['mAdSoyad']; ?>" id="<?php echo $satiscek["sNo"]; ?>" class="btn btn-ozel mr-2 detay">
                                                                <i class="fa-solid fa-address-book"></i>
                                                            </button>
                                                        </div>

                                                    </td>


                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <h4 style="float:left;">Tüm Satışlar</h4>
                            <div class="statbox widget box box-shadow">

                                <div class="widget-content widget-content-area">

                                    <table id="islemler" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Müşteri Ad Soyad</th>
                                                <th>Bölge</th>
                                                <th>Ürün</th>
                                                <th>Satış Tarihi</th>
                                                <th style="max-width:40px;">Garanti </th>
                                                <th>Garanti Bitiş</th>


                                                <th>İşlemler</th>


                                            </tr>
                                        </thead>
                                        <?php
                                        $satissor = $db->prepare("SELECT * from satislar ORDER BY sTarih DESC");
                                        $satissor->execute();
                                        $say = 0;
                                        while ($satiscek = $satissor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
                                            $msor = $db->prepare("SELECT * from musteriler where mMusteriNo=:id");
                                            $msor->execute(array('id' => $satiscek['sMID']));
                                            $mcek = $msor->fetch(PDO::FETCH_ASSOC);

                                            $urunsor = $db->prepare("SELECT * FROM urunler");
                                            $urunsor->execute();
                                            $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
                                            $islemurun = [];
                                            $kullanilanurun = unserialize($satiscek['sUrun']);
                                            foreach ($kullanilanurun as $urunid) {
                                                foreach ($urunler as $urun) {
                                                    if ($urunid == $urun['urunid']) {
                                                        array_push($islemurun, $urun['urunAd']);
                                                    }
                                                }
                                            }
                                        ?>

                                            <tr>
                                                <td><?= $say; ?></td>
                                                <td><?= $mcek['mAdSoyad']; ?></td>
                                                <td><?= $mcek['mBolge']; ?></td>
                                                <td><?= implode(", ", $islemurun) ?></td>
                                                <td><?= date("d.m.Y", strtotime($satiscek['sTarih'])); ?></td>
                                                <td style="max-width:30px;"><?= $satiscek['sGarantiSuresi']; ?> Yıl</td>
                                                <td><?= date("d.m.Y", strtotime($satiscek['sGarantiBitis'])); ?></td>



                                                <td style="max-width:20px;">
                                                    <div class="text-center">
                                                        <button type="button" name="detay" value="detay" data-adsoyad="<?= $mcek['mAdSoyad']; ?>" id="<?php echo $satiscek["sNo"]; ?>" class="btn btn-ozel mr-2 detay">
                                                            <i class="fa-solid fa-address-book"></i>
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



        <div id="satiseklemodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:#E21818; margin:auto;text-transform:uppercase;">Satış Ekle</h4>
                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id="satisekleform" action="../netting/satisislem.php" enctype="multipart/form-data">
                        <div class="modal-body row g-1" id="musterieklebody">


                            <div class="col-lg-12 col-md-12">
                                <label for="defaultInputState" class="form-label ">Satılan
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
                                <label for="inputAddress" class="form-label">Ücret</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" id="islemtutari" name="islemucreti" style="color:#505463;">
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

                            <div class="col-6">
                                <label for="defaultInputState" class="form-label ">Garanti Süresi</label>
                                <select id="defaultInputState" form="satisekleform" name="garanti" class="form-select">
                                    <option selected="">Seç</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="Yok">Yok</option>

                                </select>
                            </div>

                            <div class="col-6">
                                <label for="defaultInputState" class="form-label ">Referans</label>
                                <select id="defaultInputState" form="satisekleform" name="referans" class="form-select">
                                    <option selected="">Seç</option>
                                    <option value="Bedirhan">Bedirhan</option>
                                    <option value="Kadir">Kadir</option>
                                    <option value="Mehmet">Mehmet</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Notlar</label>
                                <input type="text" form="satisekleform" name="notlar" style="text-transform:uppercase;" class="form-control">

                            </div>
                            <input type="hidden" name="musterino" form="satisekleform" value="<?= $mcek['mMusteriNo']; ?>">


                        </div>

                        <input type="hidden" form="satisekleform" name="stamfiyat" id="tamfiyat">
                        <input type="hidden" form="satisekleform" name="sindirimlifiyat" id="indirimtutari">

                        <div class="modal-footer">
                            <button type="submit" name="satisekle" class="btn btn-success " style="color:#EFF5F5;">Kaydet</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div id="satisDetayModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;">Satış Bilgisi</h4>
                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row" id="musteridetaybody"></div>
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
        $(document).ready(function() {

            $(document).on('click', '.detay', function() {
                var sno = $(this).attr("id");
                if (sno != '') {
                    $.ajax({
                        url: "../netting/satisgetir.php",
                        method: "POST",
                        data: {
                            sno: sno
                        },
                        success: function(data) {
                            $('#musteridetaybody').html(data);
                            $('#satisDetayModal').modal('show');
                        }
                    });
                }
            });
        });

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
        
        const islemUcretiInput = document.getElementById('islemtutari');
        const tahsilatInput = document.getElementById('tahsilat');
        islemUcretiInput.addEventListener('input', function() {
            // Ücreti alın ve tahsilat inputuna yazın
            tahsilatInput.value = islemUcretiInput.value;
        });


        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true
            // searchResultLimit: 5,
            // renderChoiceLimit: 8
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
                var veresiyeMiktarı = costval - tahsilatMiktarı;
                document.getElementById('veresiye').value = veresiyeMiktarı;
            }
        }
    </script>
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