<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Pınar Su Arıtma</title>    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
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

            {
            text-transform: uppercase !important;
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

        td:last-child {
            text-align: center;
        }

        tr:hover {
            background-color: #E4F1FF !important;
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
                            <h4>MÜŞTERİLER</h4>
                            <div style="display:flex;justify-content:right;">
                                <button type="button" class="btn special1 mr-2" style="color:#EFF5F5;" name="musterieklemodalbtn" id="musterieklemodalbtn" data-bs-toggle="modal" data-bs-target="#musterieklemodal" class="btn btn-warning">YENİ KAYIT</button>

                            </div>

                            <div class="widget-content widget-content-area">
                                <table id="musteriler" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>


                                            <th style="max-width:50px;"><input type="text" class="form-control" id="specialsearch" placeholder="Ad Soyad"></th>

                                            <th style="max-width:30px;"><input type="text" class="form-control" id="specialsearch" placeholder="Bölge"></th>
                                            <th style="max-width:10px;text-align:center;">Önceki Bakım</th>
                                            <th style="max-width:65px;text-align:center;"><input type="text" class="form-control" id="specialsearch" placeholder="Bakım"></th>
                                            <th style="max-width:10px;text-align:center;"><input type="text" class="form-control" id="specialsearch" placeholder="Sonraki Bakım"></th>
                                            <th style="max-width:25px;text-align:center;">İletişim</th>
                                            <th style="max-width:25px;text-align:center;">Randevu</th>
                                            <th style="max-width:25px;text-align:center;">Servis</th>
                                            <th style="max-width:25px;text-align:center;">Satış</th>

                                            <th style="max-width:20px;text-align:center;">İşlemler</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- Modal -->
        <div id="detayModal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="detaymodaladsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;"></h4>
                        <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row" id="musteridetaybody">
                        <div class="col-6" id="telefon">
                            <p>
                            <div class="p-2" style="font-size:17px;"><a id="tel1Link" target="_blank"></a></div>
                            </p>
                            <p id="tel2">
                            <div class="p-2" style="font-size:17px;"><a id="tel2Link" target="_blank"></a></div>
                            </p>
                        </div>
                        <div class="col-6" id="whatsapp">
                            <p>
                            <div class="p-2" style="font-size:17px;"><a id="whatsapp1Link" target="_blank"></a></div>
                            </p>
                            <p id="wp2">
                            <div class="p-2" style="font-size:17px;"><a id="whatsapp2Link" target="_blank"></a></div>
                            </p>
                        </div>
                        <br><br>
                        <div class="row g-1">
                            <input type="hidden" data-adsoyad="" id="madsoyad">
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Adres</label>
                                <textarea type="text" readonly style="height:60px;text-transform:uppercase;" class="form-control contact-modal" id="adresField"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlInput1">Bölge</label>
                            </div>
                            <div class="input-group col-6">
                                <input type="text" readonly class="form-control contact-modal" id="bolgeField">
                                <a style="padding-top:11px;" class="btn btn-outline-success" id="haritaLink" target="_blank"></a>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Cihaz</label>
                                <input type="text" readonly class="form-control contact-modal" id="cihazField">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlInput1">Bakım Periyodu</label>
                                <input type="text" readonly class="form-control contact-modal" id="periyotField">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlInput1">Son Bakım Tarihi</label>
                                <input type="text" readonly class="form-control contact-modal" id="bakimTarihiField">
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar</label>
                                <textarea readonly class="form-control contact-modal" id="parcalarField"></textarea>
                            </div>
                            <input type="hidden" id="kullanilanuruninput">
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Notlar</label>
                                <input type="text" readonly style="text-transform:uppercase;" class="form-control contact-modal" id="notlarField">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>

    </div>

    <div class="modal fade randevumodal" id="randevueklemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="adsoyad" style="color:#E21818; margin:auto;text-transform:uppercase;"></h4>
                    <button type="button" class="btn-close" style="margin:0;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <form id="formRandevu" method="POST">
                        <div class="row g-1">
                            <div class="col-6">
                                <label for="defaultInputState" class="form-label">Hizmet Türü</label>
                                <select id="defaultInputState" name="hizmetturu" class="form-select">
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
                                <label for="defaultInputState" class="form-label">Teknisyen</label>
                                <select id="defaultInputState" name="teknisyen" class="form-select">
                                    <option selected="">Seç</option>
                                    <option value="Kadir">Kadir</option>
                                    <option value="Mehmet">Mehmet</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="defaultInputState" class="form-label">Randevu Tarih</label>
                                <input type="date" name="randevutarihi" style="text-transform:uppercase;" class="form-control" value="<?= date("Y-m-d", strtotime("+1 day")); ?>">
                            </div>
                            <div class="form-group col-8">
                                <label for="exampleFormControlInput1">Notlar</label>
                                <input type="text" name="notlar" style="text-transform:uppercase;" class="form-control">
                            </div>
                            <input type="hidden" name="musterino" id="musterino">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>
                        </div>
                    </form>
                </div>
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
                            <button class="btn btn-outline-success" type="button" onclick="goLocation()" id="goLocationBtn">HARİTADA AÇ</button>
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
                                $cihazsor = $db->prepare("SELECT * FROM urunler WHERE urunCinsi = 1 OR urunCinsi = 3 ORDER BY urunSiralama ASC");
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
    <div class="modal fade" id="ertele" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body row">

                    <div class="row g-1">
                        <h5 style="color:red;">SONRAKİ BAKIM ERTELE</h5>
                        <form method="POST" id="formErtele">

                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">Kaç Ay </label>
                                <input type="text" name="erteleay" class="form-control contact-modal" id="exampleFormControlInput1">
                            </div>
                            <!-- <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Hangi Tarih</label>
                                                                        <input type="date" name="erteletarih" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                    </div> -->
                            <input type="hidden" name="sonrakibakimtarihi" id="ertelesonrakibakim">

                            <input type="hidden" name="musterino" id="ertelemusterino">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" name="bakimertele" type="submit">Ertele</button>
                </div>
                </form>
            </div>
        </div>
    </div>iv>

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
    <?php
    $urunsor = $db->prepare("SELECT * FROM urunler");
    $urunsor->execute();
    $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

    // Ürün verilerini JSON formatına dönüştürün
    $urunlerJSON = json_encode($urunler);
    ?>

    <script>
        $(document).ready(function() {
            var urunlerData = <?php echo $urunlerJSON; ?>;

            $('#musteriler').on('click', '.detay', function(event) {
                var table = $('#musteriler').DataTable();
                var id = $(this).attr('id');
                $('#detayModal').modal('show');

                $.ajax({
                    url: "../netting/musteridetaycek.php",
                    data: {
                        id: id
                    },
                    type: 'post',
                    success: function(data) {
                        var json = JSON.parse(data);
                        $('#detaymodaladsoyad').text(json.mAdSoyad);

                        // Telefon bağlantıları
                        $('#tel1Link')
                            .attr('href', 'tel:0' + json.mTel1)
                            .html('<i class="fa-solid fa-phone fa-2xl"></i> 0' + json.mTel1);

                        $('#whatsapp1Link')
                            .attr('href', 'https://wa.me/0' + json.mTel1)
                            .html('<i class="fa-brands fa-whatsapp fa-2xl"></i> 0' + json.mTel1);

                        if (json.mTel2 != null) {
                            $('#tel2Link')
                                .attr('href', 'tel:0' + json.mTel2)
                                .html('<i class="fa-solid fa-phone fa-2xl"></i> 0' + json.mTel2);

                            $('#whatsapp2Link')
                                .attr('href', 'https://wa.me/0' + json.mTel2)
                                .html('<i class="fa-brands fa-whatsapp fa-2xl"></i> 0' + json.mTel2);
                        } else {
                            
                            $('#tel2Link').html('');
                            $('#whatsapp2Link').html('');
            
                        }

                        // Diğer bilgiler
                        $('#adresField').text(json.mAdres);
                        $('#bolgeField').val(json.mBolge);

                        if (json.mKonum != null) {
                            $('#haritaLink')
                                .attr('href', 'https://maps.google.com/?q=' + json.mKonum)
                                .html("HARİTADA AÇ")
                                .removeClass('btn-outline-danger')
                                .addClass('btn-outline-success');
                        } else {
                            $('#haritaLink')
                                
                                .html("KONUM YOK")
                                .removeClass('btn-outline-success')
                                .addClass('btn-outline-danger');
                        }

                        $('#cihazField').val(json.mCihaz);
                        $('#periyotField').val(json.mPeriyot + ' Ay');
                        $('#bakimTarihiField').val(json.mSonIslem ? new Date(json.mSonIslem).toLocaleDateString() : 'Bakım Bilgisi Yok');
                        $('#kullanilanuruninput').text(json.mKullanilanUrun || 'Bakım Bilgisi Yok');
                        $('#notlarField').val(json.mNot);
                        if(json.mKullanilanUrun!=null){
                        var islemurun = [];
                        // Kullanılan ürünlerin ID'lerini içeren bir dizi oluşturun (örneğin, [1, 2, 3])
                        var kullanilanurun = JSON.parse(json.mKullanilanUrun); // Bu veriyi PHP'den alabilirsiniz
                        // Kullanılan ürünleri bulmak için bir döngü oluşturun
                        for (var i = 0; i < kullanilanurun.length; i++) {
                            var urunID = kullanilanurun[i];

                            // Ürünleri arayın ve eşleşen ürünü bulun
                            var urun = urunlerData.find(function(urun) {
                                return urun.urunid === urunID;
                            });

                            // Eşleşen ürünü islemurun dizisine ekleyin
                            if (urun) {
                                islemurun.push(urun.urunAd);
                            }
                        }
                        $('#parcalarField').val(islemurun);
                    } else{
                        $('#parcalarField').val("Bakım Bilgisi Yok");
                }
                }
                });
            });

            // Şimdi islemurun dizisinde kullanılan ürünlerin listesine sahipsiniz

            $(document).on('submit', '#formErtele', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: "sonrakibakimertele.php", // Randevu ekleme işlemini yapacak PHP dosyasının yolunu belirtin
                    type: "POST",
                    data: form.serialize(),
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            // Başarılı işlem sonrası yapılacak işlemleri buraya ekleyin
                            alert('Kayıt Başarılı');
                            // $('#ertele').modal('hide');
                            $("form[id^='formErtele'] input[type='text']").val('');

                        } else {
                            alert('Randevu eklenirken bir hata oluştu.');
                        }
                    }
                });
            });
            $(document).on('click', '#ertelemodalbtn', function() {
                $ertelemusterino = $(this).attr('data-musterino');
                $('#ertelemusterino').val($ertelemusterino);
                $ertelesonrakibakim = $(this).attr('data-bakimtarihi');
                $('#ertelesonrakibakim').val($ertelesonrakibakim);
            });

            $(document).on('submit', '#formRandevu', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: "randevuekle.php", // Randevu ekleme işlemini yapacak PHP dosyasının yolunu belirtin
                    type: "POST",
                    data: form.serialize(),
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            // Başarılı işlem sonrası yapılacak işlemleri buraya ekleyin
                            alert('Kayıt Başarılı');
                            $("form[id^='formRandevu'] input[type='text'], form[id^='formRandevu'] select").val('');

                        } else {
                            alert('Randevu eklenirken bir hata oluştu.');
                        }
                    }
                });
            });

            $(document).on('click', '#randevueklemodalbtn', function() {
                $musterino = $(this).attr('data-musterino');
                $('#musterino').val($musterino);
            });



        });

        // $("form[id^='formRandevu']").submit(function(e) {
        //     e.preventDefault();
        //     var formData = $(this).serialize(); // Form verilerini toplar ve string halinde döndürür
        //     $.ajax({
        //         type: "POST",
        //         url: "../netting/randevuekle.php", // Verilerin kaydedileceği PHP dosyasının URL'si
        //         data: formData,
        //         success: function(response) {
        //             // AJAX isteği başarılıysa burada yapılacak işlemler
        //             alert("Veriler başarıyla kaydedildi.");
        //             $("form[id^='formRandevu'] input[type='text'], form[id^='formRandevu'] select").val('');
        //         },
        //         error: function() {
        //             // AJAX isteği başarısız olduğunda burada yapılacak işlemler
        //             alert("Veriler kaydedilirken bir hata oluştu.");
        //         }
        //     });
        // });

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