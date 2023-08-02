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
                    <div class="statbox widget box box-shadow">
                        <button type="button" class="btn special1 mr-2" style="color:#EFF5F5;" name="musterieklemodalbtn" id="musterieklemodalbtn" data-bs-toggle="modal" data-bs-target="#musterieklemodal" class="btn btn-warning">Yeni Müşteri</button>

                        <div class="row">
                            <h4>Bugünün Randevuları</h4>
                           <p> <?=   $_SESSION['personel']; ?></p>

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
                                            $randevusor = $db->prepare("SELECT * from randevular WHERE rTarih = :tarih AND rTeknisyen = :personel ORDER BY rDurum DESC");
                                            $randevusor->execute(array(
                                                'tarih' => $bugun,
                                                'personel' => $_SESSION['personel']
                                            ));
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
                                                                                <a href="https://www.google.com/maps?q=<?= $mustericek['mKonum']; ?>" class="btn btn-dark btn-sm">Konumu Aç</a>
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
                                                                                        }  ?> href="islemekle.php?no=<?= $mustericek['mMusteriNo'] ?>&rno=<?= $randevucek['rNo'] ?>">
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
                                                                            <select id="choices-multiple-remove-button" data-rno="<?= $randevucek['rNo']; ?>" class="multiurun<?= $randevucek['rNo']; ?>" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
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
                                                                                <input type="text" class="form-control cost<?= $randevucek['rNo']; ?>" id="cost<?= $randevucek['rNo'] ?>" name="islemucreti" readonly style="color:#505463;">
                                                                                <button class="btn btn-outline-primary makediscount" data-rno="<?= $randevucek['rNo']; ?>" style="z-index:0;" type="button" id="makediscount<?= $randevucek['rNo']; ?>">İndirim Uygula</button>
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
                                                                        <input type="hidden" form="islemekleform" name="indirimlifiyat" id="indirimtutari">
                                                                        <input id="test<?= $randevucek['rNo']; ?>"></input>
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
                        <button type="submit" name="personelmusteriekle" class="btn btn-success" style="color:#EFF5F5;">Kaydet</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
                <!--  BEGIN FOOTER  -->

                <!--  END CONTENT AREA  -->
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
        <script>
            $(document).ready(function() {
                /*Multi select get data and sum */

                $("#choices-multiple-remove-button").on("change", function() {
                    // Mevcut satırın rno değerini alın
                    var rno = $(this).data("rno");


                    var selectedValues = $(".multiurun" + rno).val();
                    var selectedString = selectedValues.join(",");

                    var costinput = $("#cost" + rno);

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

                $(".makediscount").click(function() {
                    var rno = $(this).data("rno");

                    var fiyat = $(".cost" + rno).val();
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
                                var fiyat = parseFloat($(".cost" + rno).val());
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

                                $(".cost" + rno).val(roundedPrice);
                                $("#indirimtutari").val(roundedPrice);
                            }

                        });

                    }
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