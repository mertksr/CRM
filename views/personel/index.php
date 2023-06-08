<?php include '../../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Miscellaneous DataTables | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../../public/src/assets/img/favicon.ico" />
    <link href="../../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../../public/layouts/horizontal-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="../../public/src/fontawesome/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <style>
        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding-right: 12px;
        }

        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {

            padding: 10px 15px;
        }

        .modal-content {
            background: whitesmoke;
        }

        .contact-modal {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
        }

        .table>tbody>tr>td {
            font-size: 14px;
            border: none;
            padding: 0;
            padding: 5px 10px;
            color: #515365;
            letter-spacing: 1px;
            white-space: nowrap;
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
                        <h4>Bugünün Randevuları</h4>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                            <div class="statbox widget box box-shadow">

                                <div class="widget-content widget-content-area">
                                    <table id="islemler" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Müşteri Ad Soyad</th>
                                                <th>Bölge</th>
                                                <th>Hizmet Türü</th>
                                                <th>Randevu Tarihi</th>
                                                <th>Notlar</th>
                                                <th style="max-width:20px;text-align:left;">Durum</th>
                                                <th style="max-width:20px;text-align:center;">Detaylar</th>
                                                <th style="max-width:20px;text-align:center;">Kapat</th>



                                            </tr>
                                        </thead>
                                        <?php
                                        $bugun = date("Y-m-d");
                                        $randevusor = $db->prepare("SELECT * from randevular WHERE rTarih = :tarih ORDER BY rDurum DESC");
                                        $randevusor->execute(array('tarih' => $bugun));
                                        $say = 0;
                                        while ($randevucek = $randevusor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
                                            $modalId = "modal" . $randevucek["rNo"];
                                            $musteriid = $randevucek['rMID'];
                                            $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  $musteriid");
                                            $musterisor->execute();
                                            $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
                                            $islemno = $mustericek["mMusteriNo"];
                                            $islemsor = $db->prepare("SELECT * FROM islemler WHERE islemMusteriNo = :islemMusteriNo ORDER BY islemTarihi DESC LIMIT 1");
                                            $islemsor->execute(array('islemMusteriNo' => $islemno));
                                            $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                        ?>

                                            <tr>
                                                <td><?= $say; ?></td>
                                                <td><?= $mustericek['mAdSoyad'] ?></td>
                                                <td><?= $mustericek['mBolge'] ?></td>

                                                <td><?= $randevucek['rHizmetTuru']; ?></td>
                                                <td><?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?></td>
                                                <td><?= $randevucek['rNot']; ?></td>

                                                <td style="padding:0;text-align:center;max-width:100px;"><?php
                                                                                                            if ($randevucek['rDurum'] == 0) {
                                                                                                                echo "<span class='badge badge-success me-4'>Yapıldı</span>";
                                                                                                            } elseif ($randevucek['rDurum'] == 1) {
                                                                                                                echo "<span class='badge badge-danger me-4'>Bekliyor</span>";
                                                                                                            }


                                                                                                            ?> </td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-ozel mr-2" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                        </button>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="color:crimson;"><?= $mustericek['mAdSoyad']; ?></h4>


                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <?php
                                                                    $iletisimsor = $db->prepare("SELECT * from iletisim where iletisimMusteriNo = $musteriid");
                                                                    $iletisimsor->execute();
                                                                    while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {
                                                                        $iletisimbilgisi =  $iletisimcek["İletisimBilgisi"]
                                                                    ?>
                                                                        <div class="col-6">
                                                                            <p><?php if ($iletisimcek['iletisimTuru'] == "Tel" || $iletisimcek['iletisimTuru'] == "Mobil") {
                                                                                    echo "<a href='https://google.com/$iletisimbilgisi'><i class='fa-solid fa-phone fa-2xl'></i></a>";
                                                                                } else if ($iletisimcek['iletisimTuru'] == "WhatsApp") {
                                                                                    echo "<a href='https://wa.me/$iletisimbilgisi'><i class='fa-brands fa-whatsapp fa-2xl'></i></a>";
                                                                                }
                                                                                ?> : <?php echo $iletisimcek['İletisimBilgisi'];

                                                                                        ?>

                                                                            </p>
                                                                        </div>
                                                                    <?php }   ?>

                                                                    <div class="row g-1">

                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Ad Soyad </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mAdSoyad']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Bölge </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mBolge']; ?>">
                                                                        </div>

                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Adres</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <a href="" class="btn btn-light">Konumu Aç</a>
                                                                        </div>

                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Randevu Tarihi </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Randevu Notları</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rNot']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Son Bakım Tarihi</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php if (!empty($islemcek['islemTarihi'])) {
                                                                                                                                                                                    echo date("d.m.Y", strtotime($islemcek['islemTarihi']));
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo "Bakım Kaydı Yok";
                                                                                                                                                                                } ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Son Bakımı Yapan Kişi</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php if (!empty($islemcek['islemYapanKisi'])) {
                                                                                                                                                                                    echo $islemcek['islemYapanKisi'];
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo "Bakım Kaydı Yok";
                                                                                                                                                                                } ?>">
                                                                        </div>

                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar</label>
                                                                            <textarea readonly class="form-control contact-modal" style="min-height:70px;">
<?php

                                            if (isset($islemcek['islemNo'])) {
                                                $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);

                                                $islemurun = [];
                                                $urunsor = $db->prepare("SELECT * FROM urunler");
                                                $urunsor->execute();
                                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($kullanilanurun as $urunid) {
                                                    foreach ($urunler as $urun) {
                                                        if ($urunid == $urun['urunid']) {
                                                            array_push($islemurun, $urun['urunAd']);
                                                        }
                                                    }
                                                }
                                            }
                                            if (!empty($islemurun)) {
                                                $kullanilanurunler = implode(", ", $islemurun);
                                            } else {
                                                $kullanilanurunler = "Bakım Kaydı Yok";
                                            }
                                            echo ($kullanilanurunler);

?> </textarea>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-dark" data-bs-dismiss="modal">Kapat</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>


                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" <?php if ($randevucek['rDurum'] == "0") {
                                                                                        echo "style='pointer-events: none;background-color:#c4c4c4;'";
                                                                                    }  ?> data-bs-toggle="modal" data-bs-target="#onayla<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-check"></i> </a>
                                                </td>





                                            </tr>



                                            <div class="modal fade" id="onayla<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="../../netting/randevuislem.php" method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body row">

                                                            <div class="row g-1">
                                                                

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

                                        <div class="col-12">
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


                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">İşlem Ücreti</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cost<?= $randevucek['rNo'] ?>" name="islemucreti" readonly style="color:#505463;">
                                                <button class="btn btn-outline-primary" style="z-index:0;" type="button" id="makediscount">İndirim Uygula</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Notlar</label>
                                            <input type="text" class="form-control" name="islemnotlari" id="inputAddress2">
                                        </div>
                                        <input type="hidden" name="musterino" value="<?= $mustericek['mMusteriNo'] ?>">
                                        <input class="form-control file-upload-input" type="file" name="resimler[]" multiple accept="image/*">

                                        <div class="col-12">
                                        </div>
                                        <input type="hidden" form="islemekleform" name="rno" id="rno" value="<?= $randevucek['rNo']; ?>">

                                        <input type="hidden" form="islemekleform" name="tamfiyat" id="tamfiyat">
                                        <input type="hidden"  form="islemekleform" name="indirimlifiyat" id="indirimtutari">
                                        <h4 id="test" value=""></h4>    
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="randevukapat" type="submit">Randevuyu Onayla</button>
                                                        </div>
 </form>
                                                    </div>
                                                </div>
                                            </div>




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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
    <script>
        /*Multi select get data and sum */
        $("#choices-multiple-remove-button").on("change", function() {
            var selectedValues = $("#choices-multiple-remove-button").val();
            var selectedString = selectedValues.join(",");
            var costinput = ('#test') /*"#cost" + $("#rno").val()*/;
       
            $.ajax({
                url: "../../netting/urunlericagir.php",
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
                costinput.val(total);
                $("#tamfiyat").val(total);
                $("#indirimtutari").val("0");
            });

        });


        $(document).ready(function() {

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
       
 });

            $("#makediscount").click(function() {
                var fiyat = $("#cost").val();
                if (fiyat == "0" || fiyat == "" || fiyat == null) {
                    alert("Ürün seçmeden indirim yapamazsınız!");
                    return false;
                } else {
                    // $("#makediscount").off("click"); 
                    $("#makediscount").removeClass('btn-outline-primary');
                    $("#makediscount").addClass('btn-outline-danger');

                    $.ajax({
                        url: "../../netting/ayarcek.php",
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var fiyat = parseFloat($("#cost").val());
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

                            $("#cost").val(roundedPrice);
                            $("#indirimtutari").val(roundedPrice);
                        }

                    });

                }
            });
   
    </script>

    <script src="../../public/src/fontawesome/all.js"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../public/src/plugins/src/global/vendors.min.js"></script>
    <script src="../../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../../public/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../../public/src/plugins/src/table/datatable/datatables.js"></script>
    <script src="../../public/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../../public/src/plugins/src/table/datatable/button-ext/jszip.min.js"></script>
    <script src="../../public/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../../public/src/plugins/src/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="../../public/src/plugins/src/table/datatable/custom_miscellaneous.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>