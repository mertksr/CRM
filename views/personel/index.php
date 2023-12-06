<?php include '../../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php 
if (empty($_SESSION['kullanici'])) {
    header("Location:../../../../index.php?erisim=izinsiz");
}
?>
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
    <script src="../../public/src/plugins/src/choices/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">,

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

                    <div class="statbox widget box box-shadow">
                        <h4>BUGÜNÜN RANDEVULARI</h4>
                        <br>
                        <div class="row">


                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="statbox widget box box-shadow">

                                    <div class="widget-content widget-content-area">

                                        <table id="islemler" class="table dt-table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">No</th>
                                                    <th style="text-align:center;">Müşteri Ad Soyad</th>
                                                    <th style="text-align:center;">Bölge</th>
                                                    <th style="text-align:center;">Hizmet Türü</th>
                                                    <th style="text-align:center;">Randevu Tarihi</th>
                                                    <th style="text-align:center;">Notlar</th>
                                                    <th style="max-width:20px;text-align:center;">Durum</th>
                                                    <th style="max-width:20px;text-align:center;">Detay</th>
                                                    <th style="max-width:20px;text-align:center;">Konum</th>
                                                    <th style="max-width:20px;text-align:center;">Kapat</th>




                                                </tr>
                                            </thead>
                                            <?php
                                            $bugun = date("Y-m-d");
                                            $randevusor = $db->prepare("SELECT * from randevular WHERE rTarih = :tarih AND rTeknisyen = :personel AND rDurum = :durum ORDER BY rDurum ASC");
                                            $randevusor->execute(array(
                                                'tarih' => $bugun,
                                                'personel' => $_SESSION['personel'],
                                                'durum' => "1"

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
                                                $islemsor = $db->prepare("SELECT * FROM islemler WHERE islemMusteriNo = :islemMusteriNo AND islemTuru LIKE '%Bakım%' ORDER BY islemTarihi DESC LIMIT 1");
                                                $islemsor->execute(array('islemMusteriNo' => $islemno));
                                                $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                                $islemturu = unserialize($islemcek['islemTuru']);

                                                $urunsor = $db->prepare("SELECT *   FROM urunler ORDER BY urunSiralama ASC");
                                                $urunsor->execute();
                                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                                $islemurun = [];
                                                if (isset($islemcek) && isset($islemcek['islemKullanilanUrun'])) {
                                                    $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);

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
                                            ?>

                                                <tr>
                                                    <td style="text-align:center;"><?= $say; ?></td>
                                                    <td style="text-align:center;"><?= $mustericek['mAdSoyad'] ?></td>
                                                    <td style="text-align:center;"><?= $mustericek['mBolge'] ?></td>

                                                    <td style="text-align:center;"><?= $randevucek['rHizmetTuru']; ?></td>
                                                    <td style="text-align:center;"><?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?></td>
                                                    <td><?= $randevucek['rNot']; ?></td>

                                                    <td style="padding:0;text-align:center;max-width:100px;"><?php
                                                                                                                if ($randevucek['rDurum'] == 2 || $randevucek['rDurum'] == 3) {
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
                                                                        <div class="col-6">
                                                                            <p>
                                                                                <?php if (!empty($mustericek['mTel1'])) { ?>
                                                                            <div class="p-2" style="font-size:17px;"><a href="tel:<?= $mustericek['mTel1']; ?>"><i class="fa-solid fa-phone fa-2xl"></i></a><?= $mustericek['mTel1']; ?></div>
                                                                        <?php  }
                                                                                if (!empty($mustericek['mTel2'])) { ?>
                                                                            <div class="p-2" style="font-size:17px;"><a href="tel:<?= $mustericek['mTel2']; ?>"><i class="fa-solid fa-phone fa-2xl"></i></a><?= $mustericek['mTel2']; ?></div>
                                                                        <?php } ?>


                                                                        </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p>
                                                                                <?php if (!empty($mustericek['mTel1'])) { ?>
                                                                            <div class="p-2" style="font-size:17px;"><a href="https://wa.me/<?= $mustericek['mTel1']; ?>"><i class="fa-brands fa-whatsapp fa-2xl"></i></a><?= $mustericek['mTel1']; ?></div>
                                                                        <?php  }
                                                                                if (!empty($mustericek['mTel2'])) { ?>
                                                                            <div class="p-2" style="font-size:17px;"><a href="https://wa.me/<?= $mustericek['mTel2']; ?>"><i class="fa-brands fa-whatsapp fa-2xl"></i></a><?= $mustericek['mTel2']; ?></div>
                                                                        <?php } ?>


                                                                        </p>
                                                                        </div>

                                                                        <div class="row g-0">
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Bölge </label>
                                                                            </div>
                                                                            <div class="input-group col-6">


                                                                                <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $mustericek['mBolge']; ?>">


                                                                                <?php if (!empty($mustericek['mKonum'])) { ?>
                                                                                    <a style="padding-top:11px;" class="btn btn-outline-success" href="https://maps.google.com/?q=<?= $mustericek['mKonum']; ?> " target="_Blank">Haritada
                                                                                        Aç</a><?php } else { ?> <a style="padding-top:11px;" class="btn btn-outline-danger">Konum Yok</a> <?php } ?>
                                                                            </div>



                                                                            <div class="form-group col-12">
                                                                                <label for="exampleFormControlInput1">Adres</label>
                                                                                <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Cihaz </label>
                                                                                <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mCihaz']; ?>">
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Randevu Tarihi </label>
                                                                                <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?>">
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Randevu Türü</label>
                                                                                <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevucek['rHizmetTuru'];  ?>">
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Son İşlem Yapan</label>
                                                                                <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rTeknisyen']; ?>">
                                                                            </div>


                                                                            <div class="form-group col-12">
                                                                                <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar</label>
                                                                                <textarea readonly class="form-control contact-modal" style="min-height:70px;">
<?php

                                                echo $kullanilanurunler;

?> </textarea>
                                                                            </div>

                                                                            <?php if ($randevucek['rDurum'] == "2") {

                                                                                $randevuislemno = $randevucek['rNo'];
                                                                                $randevuislemsor = $db->prepare("SELECT * FROM islemler WHERE islemRandevu = :randevu");
                                                                                $randevuislemsor->bindParam(':randevu', $randevuislemno);
                                                                                $randevuislemsor->execute();
                                                                                $randevuislemcek = $randevuislemsor->fetch(PDO::FETCH_ASSOC);
                                                                                $islemturu = unserialize($randevuislemcek['islemTuru']);



                                                                                $randevukullanilanurun = unserialize($randevuislemcek['islemKullanilanUrun']);

                                                                                $yapilanislemurun = [];
                                                                                $urunsor = $db->prepare("SELECT *  FROM urunler ORDER BY urunSiralama ASC");
                                                                                $urunsor->execute();
                                                                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($randevukullanilanurun as $urunid) {
                                                                                    foreach ($urunler as $urun) {
                                                                                        if ($urunid == $urun['urunid']) {
                                                                                            array_push($yapilanislemurun, $urun['urunAd']);
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                                <div class="form-group col-6">
                                                                                    <label for="exampleFormControlInput1">Servis Tarihi </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevuislemcek['islemTarihi'])); ?>">
                                                                                </div>
                                                                                <div class="form-group col-6">
                                                                                    <label for="exampleFormControlInput1">Servis Türü</label>
                                                                                    <textarea type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $islemturu); ?></textarea>
                                                                                </div>
                                                                                <div class="form-group col-12">
                                                                                    <label for="exampleFormControlInput1">Kullanılan Ürünler</label>
                                                                                    <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $yapilanislemurun); ?></textarea>
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Tutar</label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevuislemcek['islemUcret']; ?>TL">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Yapılan İndirim </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="-<?= $randevuislemcek['islemUcret'] - $randevuislemcek['islemIndirimliFiyat']; ?>TL">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Ücret </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevuislemcek['islemIndirimliFiyat']; ?>TL">
                                                                                </div>


                                                                            <?php } elseif ($randevucek['rDurum'] == "3") {
                                                                                $randevusatisno = $randevucek['rNo'];
                                                                                $randevusatissor = $db->prepare("SELECT * FROM satislar WHERE sRandevu = :randevu");
                                                                                $randevusatissor->bindParam(':randevu', $randevusatisno);
                                                                                $randevusatissor->execute();
                                                                                $randevusatiscek = $randevusatissor->fetch(PDO::FETCH_ASSOC);

                                                                                $randevusatilanurun = unserialize($randevusatiscek['sUrun']);

                                                                                $satilanurun = [];
                                                                                $urunsor = $db->prepare("SELECT *  FROM urunler ORDER BY urunSiralama ASC");
                                                                                $urunsor->execute();
                                                                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                                                                foreach ($randevusatilanurun as $urunid) {
                                                                                    foreach ($urunler as $urun) {
                                                                                        if ($urunid == $urun['urunid']) {
                                                                                            array_push($satilanurun, $urun['urunAd']);
                                                                                        }
                                                                                    }
                                                                                }
                                                                            ?>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Satış Tarihi </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevusatiscek['sTarih'])); ?>">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Garanti Süresi</label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevusatiscek['sGarantiSuresi']; ?> Yıl">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Garanti Bitiş Tarihi </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevusatiscek['sGarantiBitis']));  ?>">
                                                                                </div>
                                                                                <div class="form-group col-12">
                                                                                    <label for="exampleFormControlInput1">Satılan Ürünler</label>
                                                                                    <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $satilanurun); ?></textarea>
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Satış Tutarı</label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sTutar']; ?>TL">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Yapılan İndirim </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="-<?= $randevusatiscek['sTutar'] - $randevusatiscek['sIndirimliTutar']; ?>TL">
                                                                                </div>
                                                                                <div class="form-group col-4">
                                                                                    <label for="exampleFormControlInput1">Ücret </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sIndirimliTutar']; ?>TL">
                                                                                </div>
                                                                                <div class="form-group col-6">
                                                                                    <label for="exampleFormControlInput1">Referans </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sReferans']; ?>">
                                                                                </div>
                                                                                <div class="form-group col-6">
                                                                                    <label for="exampleFormControlInput1">Tahsilat Şekli </label>
                                                                                    <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sTahsilatSekli']; ?>">
                                                                                </div>

                                                                            <?php } ?>
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
                                                        <a class="btn btn-ozel mr-2" data-bs-toggle="modal" data-bs-target="#konumduzenle<?php echo $modalId; ?>">
                                                            <i class="fa-solid fa-pen"></i> </a>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel mr-2" <?php if ($randevucek['rDurum'] == "2"|| $randevucek['rDurum'] == "3") {
                                                                                            echo "style='pointer-events: none;background-color:#c4c4c4;'";
                                                                                        }  ?> data-bs-toggle="modal" data-bs-target="#onayla<?php echo $modalId; ?>">
                                                            <i class="fa-solid fa-check"></i> </a>
                                                    </td>




                                                </tr>
                                                <div class="modal fade" id="konumduzenle<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">
                                                                <h4 style="color:red;text-align:center;">Konum Düzenle</h4>
                                                                <div class="row g-1">
                                                                    <form method="POST" id="konumduzenleform" action="../../netting/musteriislem.php">
                                                                        <div class="modal-body row g-1">
                                                                            <div class="col-12 ">
                                                                                <label for="inputAddress" class="form-label">Konum</label>

                                                                                <div class="input-group col-12 col-lg-6 col-md-6">
                                                                                    <input type="text" value="<?= $mustericek['mKonum']; ?>" class="form-control" name="konum" id="konuminput<?= $randevucek['rNo']; ?>" readonly placeholder="Konum Bul">
                                                                                    <button class="btn btn-outline-primary get-location-btn" type="button" id="konum<?= $randevucek['rNo']; ?>" data-modalid="<?= $randevucek['rNo']; ?>">Konum
                                                                                        Bul</button>
                                                                                    <input type="hidden" id="konum<?= $randevucek['rNo']; ?>">
                                                                                    <button class="btn btn-outline-success goLocationBtn" type="button" data-modalid="<?= $randevucek['rNo']; ?>" id="goLocationBtn<?= $randevucek['rNo']; ?>">Haritada
                                                                                        Aç</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-success" data-bs-dismiss="modal" name="konumduzenle">Kaydet</button>
                                                                        </div>
                                                                        <input type="hidden" value="<?= $mustericek['mMusteriNo']; ?>" name="musterino">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 style="color:crimson;"><?= $mustericek['mAdSoyad']; ?></h4>


                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-6">
                                                                    <p>
                                                                        <?php if (!empty($mustericek['mTel1'])) { ?>
                                                                    <div class="p-2" style="font-size:17px;"><a href="tel:0<?= $mustericek['mTel1']; ?>"><i class="fa-solid fa-phone fa-2xl"></i></a>0<?= $mustericek['mTel1']; ?></div>
                                                                <?php  }
                                                                        if (!empty($mustericek['mTel2'])) { ?>
                                                                    <div class="p-2" style="font-size:17px;"><a href="tel:0<?= $mustericek['mTel2']; ?>"><i class="fa-solid fa-phone fa-2xl"></i></a>0<?= $mustericek['mTel2']; ?></div>
                                                                <?php } ?>


                                                                </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>
                                                                        <?php if (!empty($mustericek['mTel1'])) { ?>
                                                                    <div class="p-2" style="font-size:17px;"><a href="https://wa.me/0<?= $mustericek['mTel1']; ?>"><i class="fa-brands fa-whatsapp fa-2xl"></i></a>0<?= $mustericek['mTel1']; ?></div>
                                                                <?php  }
                                                                        if (!empty($mustericek['mTel2'])) { ?>
                                                                    <div class="p-2" style="font-size:17px;"><a href="https://wa.me/0<?= $mustericek['mTel2']; ?>"><i class="fa-brands fa-whatsapp fa-2xl"></i></a>0<?= $mustericek['mTel2']; ?></div>
                                                                <?php } ?>


                                                                </p>
                                                                </div>

                                                                <div class="row g-0">
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Bölge </label>
                                                                    </div>
                                                                    <div class="input-group col-6">


                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $mustericek['mBolge']; ?>">


                                                                        <?php if (!empty($mustericek['mKonum'])) { ?>
                                                                            <a style="padding-top:11px;" class="btn btn-outline-success" href="https://maps.google.com/?q=<?= $mustericek['mKonum']; ?> " target="_Blank">Haritada
                                                                                Aç</a><?php } else { ?> <a style="padding-top:11px;" class="btn btn-outline-danger">Konum Yok</a> <?php } ?>
                                                                    </div>



                                                                    <div class="form-group col-12">
                                                                        <label for="exampleFormControlInput1">Adres</label>
                                                                        <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Cihaz </label>
                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mCihaz']; ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Randevu Tarihi </label>
                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Randevu Türü</label>
                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevucek['rHizmetTuru'];  ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Son İşlem Yapan</label>
                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rTeknisyen']; ?>">
                                                                    </div>


                                                                    <div class="form-group col-12">
                                                                        <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar</label>
                                                                        <textarea readonly class="form-control contact-modal" style="min-height:70px;">
<?php

                                                echo $kullanilanurunler;

?> </textarea>
                                                                    </div>
                                                                    <div class="form-group col-12">
                                                                        <label for="exampleFormControlInput1">Müşteri Notu</label>
                                                                        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mNot']; ?>">
                                                                    </div>


                                                                    <?php if ($randevucek['rDurum'] == "2") {

                                                                        $randevuislemno = $randevucek['rNo'];
                                                                        $randevuislemsor = $db->prepare("SELECT * FROM islemler WHERE islemRandevu = :randevu");
                                                                        $randevuislemsor->bindParam(':randevu', $randevuislemno);
                                                                        $randevuislemsor->execute();
                                                                        $randevuislemcek = $randevuislemsor->fetch(PDO::FETCH_ASSOC);
                                                                        $islemturu = unserialize($randevuislemcek['islemTuru']);



                                                                        $randevukullanilanurun = unserialize($randevuislemcek['islemKullanilanUrun']);

                                                                        $yapilanislemurun = [];
                                                                        $urunsor = $db->prepare("SELECT *  FROM urunler ORDER BY urunSiralama ASC");
                                                                        $urunsor->execute();
                                                                        $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($randevukullanilanurun as $urunid) {
                                                                            foreach ($urunler as $urun) {
                                                                                if ($urunid == $urun['urunid']) {
                                                                                    array_push($yapilanislemurun, $urun['urunAd']);
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Servis Tarihi </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevuislemcek['islemTarihi'])); ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Servis Türü</label>
                                                                            <textarea type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $islemturu); ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Kullanılan Ürünler</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $yapilanislemurun); ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Tutar</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevuislemcek['islemUcret']; ?>TL">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Yapılan İndirim </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="-<?= $randevuislemcek['islemUcret'] - $randevuislemcek['islemIndirimliFiyat']; ?>TL">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Ücret </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevuislemcek['islemIndirimliFiyat']; ?>TL">
                                                                        </div>


                                                                    <?php } elseif ($randevucek['rDurum'] == "3") {
                                                                        $randevusatisno = $randevucek['rNo'];
                                                                        $randevusatissor = $db->prepare("SELECT * FROM satislar WHERE sRandevu = :randevu");
                                                                        $randevusatissor->bindParam(':randevu', $randevusatisno);
                                                                        $randevusatissor->execute();
                                                                        $randevusatiscek = $randevusatissor->fetch(PDO::FETCH_ASSOC);

                                                                        $randevusatilanurun = unserialize($randevusatiscek['sUrun']);

                                                                        $satilanurun = [];
                                                                        $urunsor = $db->prepare("SELECT *  FROM urunler ORDER BY urunSiralama ASC");
                                                                        $urunsor->execute();
                                                                        $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                                                        foreach ($randevusatilanurun as $urunid) {
                                                                            foreach ($urunler as $urun) {
                                                                                if ($urunid == $urun['urunid']) {
                                                                                    array_push($satilanurun, $urun['urunAd']);
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Satış Tarihi </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevusatiscek['sTarih'])); ?>">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Garanti Süresi</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevusatiscek['sGarantiSuresi']; ?> Yıl">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Garanti Bitiş Tarihi </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo date("d.m.Y", strtotime($randevusatiscek['sGarantiBitis']));  ?>">
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Satılan Ürünler</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $satilanurun); ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Satış Tutarı</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sTutar']; ?>TL">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Yapılan İndirim </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="-<?= $randevusatiscek['sTutar'] - $randevusatiscek['sIndirimliTutar']; ?>TL">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Ücret </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sIndirimliTutar']; ?>TL">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Referans </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sReferans']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Tahsilat Şekli </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= $randevusatiscek['sTahsilatSekli']; ?>">
                                                                        </div>

                                                                    <?php } ?>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-dark" data-bs-dismiss="modal">Kapat</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </td>





                                                </tr>





                                                <div class="modal fade" id="onayla<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">
                                                                <h4 style="color:red;text-align:center;">Kayıt Türü</h4>
                                                                <div class="row g-1">



                                                                    <div class="form-check col-6">
                                                                        <input class="btn-check" type="radio" value="Gerçek Kişi" name="kayitturu" id="flexRadioDefault1" checked>
                                                                        <label style="width:100%;" class="btn btn-primary" for="flexRadioDefault1">
                                                                            Servis Ekle
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check form-check-danger col-6">
                                                                        <input class="btn-check" type="radio" value="Tüzel Kişi" name="kayitturu" id="flexRadioDefault2">
                                                                        <label style="width:100%;" class="btn btn-success" for="flexRadioDefault2">
                                                                            Satış Ekle
                                                                        </label>
                                                                    </div>
                                                                    <form method="POST" id="islemekleform<?= $randevucek['rNo']; ?>" action="../../netting/randevuislem.php" enctype="multipart/form-data">

                                                                        <div class="row g-1 boxx" id="satisekleform">

                                                                            <div class="modal-body row g-1" id="musterieklebody">


                                                                                <div class="col-12">
                                                                                    <label for="defaultInputState" class="form-label ">Hizmet Türü</label>
                                                                                    <select id="hizmetler-<?= $randevucek['rNo']; ?>" name="hizmetler[]" data-id="<?= $randevucek['rNo'];  ?>" placeholder="Ürün Seçiniz" multiple>
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
                                                                                    <select id="choices-multiple-remove-button-<?= $randevucek['rNo']; ?>" data-id="<?= $randevucek['rNo']; ?>" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
                                                                                        <?php

                                                                                        $urunsor = $db->prepare("SELECT *  FROM urunler WHERE urunCinsi = 1  || urunCinsi = 2 || urunCinsi = 4|| urunCinsi = 5 ORDER BY urunSiralama ASC");
                                                                                        $urunsor->execute();
                                                                                        while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {

                                                                                            if(!empty($uruncek['urunFiyat'])){
                                                                                                $urunfiyat= "{" .$uruncek['urunFiyat']. "TL}";
                                                                                            }else{
                                                                                                $urunfiyat="";
                                                                                            }
                                                                                        ?>
                                                                                            <option value="<?= $uruncek['urunid']; ?>"><?= $uruncek['urunAd'] . $urunfiyat; ?></option>
                                                                                        <?php  } ?>

                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-12 col-lg-12 col-md-12">
                                                                                    <label for="inputAddress" class="form-label">İşlem Ücreti</label>

                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" id="cost<?= $randevucek['rNo']; ?>" name="islemucreti" readonly style="color:#505463;">
                                                                                        <button class="btn btn-outline-primary makediscount" data-randevuid="<?= $randevucek['rNo'] ?>" style="z-index:0;" type="button" id="makediscount<?= $randevucek['rNo']; ?>">UYGULA</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="inputAddress2" class="form-label">Tahsilat</label>
                                                                                    <input type="text" class="form-control" name="tahsilat" oninput="veresiyeHesapla(<?= $randevucek['rNo']; ?>)" id="tahsilat<?= $randevucek['rNo']; ?>">
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label for="inputAddress2" class="form-label">Veresiye</label>
                                                                                    <input type="text" class="form-control" name="veresiye" readonly style="color:crimson;" id="veresiye<?= $randevucek['rNo']; ?>">
                                                                                </div>


                                                                                <div class="col-12">
                                                                                    <label for="inputAddress2" class="form-label">Veresiye Notu</label>
                                                                                    <input type="text" class="form-control" name="notlar" id="inputAddress2">
                                                                                </div>

                                                                                <!-- <div class="col-12">
                                                                                    <label for="inputAddress2" class="form-label">Fotoğraf Ekle</label>
                                                                                    <input type="hidden" name="musterino" value=" /* $_GET['no'] */">

                                                                                    <input class="form-control file-upload-input" type="file" name="resimler[]" multiple accept="image/*">
                                                                                </div> -->

                                                                                <input type="hidden" name="periyot" value="<?= $mustericek['mPeriyot']; ?>">
                                                                                <input type="hidden" name="tamfiyat" id="itamfiyat<?= $randevucek['rNo']; ?>">
                                                                                <input type="hidden" name="indirimlifiyat" id="iindirimtutari<?= $randevucek['rNo']; ?>">
                                                                                <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                                                <input type="hidden" name="musterino" value="<?= $mustericek['mMusteriNo']; ?>">

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="islemeklepersonel" class="btn btn-primary " style="color:#EFF5F5;">Kaydet</button>
                                                                            </div>

                                                                            <input type="hidden" form="islemekleform<?= $randevucek['rNo']; ?>" name="hizmetler" id="hizmetlerinput<?= $randevucek['rNo']; ?>" value="">
                                                                            <input type="hidden" form="islemekleform<?= $randevucek['rNo']; ?>" name="urunler" id="urunlerinput<?= $randevucek['rNo']; ?>" value="">
                                                                            <input type="hidden" form="satisekleform<?= $randevucek['rNo']; ?>" name="satisurunler" id="satisurunlerinput<?= $randevucek['rNo']; ?>" value="">

                                                                    </form>


                                                                </div>
                                                                <div class="row g-1 boxx2" id="satisekleform">
                                                                    <form method="POST" id="satisekleform<?= $randevucek['rNo']; ?>" action="../../netting/randevuislem.php" enctype="multipart/form-data">
                                                                        <div class="modal-body row g-1" id="musterieklebody">


                                                                            <div class="col-lg-12 col-md-12">
                                                                                <label for="defaultInputState" class="form-label ">Satılan
                                                                                    Ürünler</label>
                                                                                <select id="choices-multiple-remove-button" class="satilanurunler-<?= $randevucek['rNo']; ?>" data-id="<?= $randevucek['rNo']; ?>" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
                                                                                    <?php

                                                                                    $urunsor = $db->prepare("SELECT *  FROM urunler WHERE  urunCinsi = 3  ORDER BY urunSiralama ASC");
                                                                                    $urunsor->execute();
                                                                                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {

                                                                                        if(!empty($uruncek['urunFiyat'])){
                                                                                            $urunfiyat= "{" .$uruncek['urunFiyat']. "TL}";
                                                                                        }else{
                                                                                            $urunfiyat="";
                                                                                        }
                                                                                    ?>
                                                                                        <option value="<?= $uruncek['urunid']; ?>"><?= $uruncek['urunAd'] . $urunfiyat; ?></option>
                                                                                    <?php  } ?>

                                                                                </select>
                                                                            </div>


                                                                            <div class="col-12 col-lg-12 col-md-12">
                                                                                <label for="inputAddress" class="form-label">Ücret</label>

                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" id="satistutari<?= $randevucek['rNo']; ?>" name="satistutari" readonly style="color:#505463;">
                                                                                    <button class="btn btn-outline-primary" data-randevuid="<?= $randevucek['rNo'] ?>" style="z-index:0;" type="button" id="satismakediscount">Uygula</button>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <label for="defaultInputState" class="form-label ">Garanti Süresi</label>
                                                                                <select id="defaultInputState" name="garanti" class="form-select">
                                                                                    <option selected="">Seç</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="Yok">Yok</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <label for="defaultInputState" class="form-label ">Referans</label>
                                                                                <select id="defaultInputState" name="referans" class="form-select">
                                                                                    <option selected="">Seç</option>
                                                                                    <option value="Kadir">Kadir</option>
                                                                                    <option value="Mehmet">Mehmet</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-12">
                                                                                <label for="exampleFormControlInput1">Veresiye Notu</label>
                                                                                <input type="text" name="notlar" style="text-transform:uppercase;" class="form-control">

                                                                            </div>
                                                                            <input type="hidden" name="musterino" value="<?= $mustericek['mMusteriNo']; ?>">
                                                                            <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">


                                                                        </div>

                                                                        <input type="hidden" name="stamfiyat" id="stamfiyat<?= $randevucek['rNo']; ?>">
                                                                        <input type="hidden" name="sindirimlifiyat" id="sindirimtutari<?= $randevucek['rNo']; ?>">

                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="satiseklepersonel" class="btn btn-success " style="color:#EFF5F5;">Kaydet</button>
                                                                        </div>


                                                                    </form>



                                                                    <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                                </div>

                                                                <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                            </div>

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

                <!--  END CONTENT AREA  -->
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © Mert Keser</p>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
        <script>
            function getLocation(locationInput, mapButton, modalId) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        showPosition(position, modalId);
                    }, function(error) {
                        locationInput.value = "Konum alınamadı: " + error.message;
                    });
                } else {
                    locationInput.value = "Geolocation bu tarayıcıda desteklenmiyor.";
                }

                // Haritada Aç düğmesini etkinleştir
                mapButton.disabled = false;
            }

            function showPosition(position, modalId) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Konumu input alanına yerleştir
                const locationShowInput = document.getElementById("konuminput" + modalId);
                locationShowInput.value = latitude + "," + longitude;
            }


            const getLocationButtons = document.querySelectorAll(".get-location-btn");

            getLocationButtons.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    const modalId = this.getAttribute("data-modalid");
                    const locationInput = document.getElementById("konuminput" + modalId);
                    const mapButton = document.getElementById("goLocationBtn" + modalId);
                    getLocation(locationInput, mapButton, modalId);
                });
            });

            const goLocationButtons = document.querySelectorAll(".goLocationBtn");

            goLocationButtons.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    const modalId = this.getAttribute("data-modalid");
                    const locationInput = document.getElementById("konuminput" + modalId);
                    const locationValue = locationInput.value;

                    if (locationValue === "") {
                        alert("Önce Konumunuzu Bulmalısınız");
                    } else {
                        window.open('https://maps.google.com/?q=' + locationValue, '_blank');
                    }
                });
            });


            $(document).ready(function() {

                $("[id^='choices-multiple-remove-button']").on("change", function() {

                    var selectedValues = $(this).val(); // Seçili verileri al
                    var selectedString = selectedValues.join(",");

                    var that = this; // this'i bir değişkende saklayın
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


                        // Toplam fiyatı ve diğer değerleri güncelleyin
                        var randevuid = $(that).attr("data-id");
                        var indiriminput = "cost" + randevuid;
                        var urunlerinput = "urunlerinput" + randevuid;
                        var itamfiyat = "itamfiyat" + randevuid;
                        var iindirimtutari = "iindirimtutari" + randevuid;
                        var tahsilat = "tahsilat" + randevuid;
                        $("#" + tahsilat).val(total);
                        $("#" + urunlerinput).val(selectedString);
                        $("#" + indiriminput).val(total);
                        $("#" + itamfiyat).val(total);
                        $("#" + iindirimtutari).val("0");

                    });
                });

                $("[class^='satilanurunler']").on("change", function() {
                    var selectedValues = $(this).val(); // Seçili verileri al
                    var selectedString = selectedValues.join(",");

                    var that = this; // this'i bir değişkende saklayın
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


                        // Toplam fiyatı ve diğer değerleri güncelleyin
                        var randevuid = $(that).attr("data-id");
                        var indiriminput = "satistutari" + randevuid;
                        var satisurunlerinput = "satisurunlerinput" + randevuid;
                        var stamfiyat = "stamfiyat" + randevuid;


                        $("#" + satisurunlerinput).val(selectedString);
                        $("#" + indiriminput).val(total);
                        $("#" + stamfiyat).val(total);
                    });
                });

                var multipleCancelButton = new Choices("[id^='choices-multiple-remove-button']", {
                    removeItemButton: true
                    // searchResultLimit: 5,
                    // renderChoiceLimit: 8
                });

                $("[id^='hizmetler']").on("change", function() {
                    var selectedValues = $(this).val();
                    var selectedString = selectedValues.join(",");
                    var randevuid = $(this).attr("data-id");

                    var hizmetlerinput = "hizmetlerinput" + randevuid;
                    $("#" + hizmetlerinput).val(selectedString);
                });

                var multipleCancelButton = new Choices("[id^='hizmetler']", {
                    removeItemButton: true
                });

            });

            $("[id^='makediscount']").click(function() {
                var randevuid = $(this).attr("data-randevuid");
                var costid = "cost" + randevuid;
                var fiyat = $("#" + costid).val();
                var tahsilat = "tahsilat" + randevuid;

                if (fiyat == "0" || fiyat == "" || fiyat == null) {
                    alert("Ürün seçmeden indirim yapamazsınız!");
                    return false;
                } else {


                    $.ajax({
                        url: "../../netting/ayarcek.php",
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var fiyat = parseFloat($("#" + costid).val());
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

                            $("#" + costid).val(roundedPrice);
                            $("#" + tahsilat).val(roundedPrice);
                            var iindirimtutari = "iindirimtutari" + randevuid;
                            $("#" + iindirimtutari).val(roundedPrice);
                            /* Butona tıklandığında tekrar tıklanmasını enegelleme */
                            var makediscount = "makediscount" + randevuid;
                            var button = document.querySelector("#" + makediscount);
                            button.disabled = true;                     
                            $("#" + makediscount).removeClass('btn-outline-primary');
                            $("#" + makediscount).addClass('btn-outline-danger');
                        }

                    });

                }
            });
            $("[id^='satismakediscount']").click(function() {
                var randevuid = $(this).attr("data-randevuid");
                var scostid = "satistutari" + randevuid;
                var fiyat = $("#" + scostid).val();
                if (fiyat == "0" || fiyat == "" || fiyat == null) {
                    alert("Ürün seçmeden indirim yapamazsınız!");
                    return false;
                } else {
                    // $("#makediscount").off("click"); 
                    $("#satismakediscount").removeClass('btn-outline-primary');
                    $("#satismakediscount").addClass('btn-outline-danger');

                    $.ajax({
                        url: "../../netting/ayarcek.php",
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            var fiyat = parseFloat($("#" + scostid).val());
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

                            $("#" + scostid).val(roundedPrice);
                            //$("#sindirimtutari").val(roundedPrice);
                            var sindirimtutari = "sindirimtutari" + randevuid;
                            $("#" + sindirimtutari).val(roundedPrice);
                        }

                    });

                }
            });

            function veresiyeHesapla(randevuid) {
                // Tahsilat miktarını al
                var costid = "cost" + randevuid;
                var costval = document.getElementById(costid).value;

                var tahsilatMiktarı = parseFloat(document.getElementById('tahsilat' + randevuid).value);

                // Eğer tahsilat miktarı bir sayı değilse veya boşsa, borcu sıfırla
                if (isNaN(tahsilatMiktarı) || tahsilatMiktarı === "") {
                    document.getElementById('veresiye' + randevuid).value = 0;
                } else {
                    // Tahsilat miktarını değiştirip borcu hesapla
                    var veresiyeMiktarı = costval - tahsilatMiktarı;
                    document.getElementById('veresiye' + randevuid).value = veresiyeMiktarı;
                }
            }
            $(document).ready(function() {

                const box = $(".boxx");
                const box2 = $(".boxx2");
                box2.hide();

                function handleRadioClick() {
                    if ($('#flexRadioDefault1').prop('checked')) {
                        box.show();
                        box2.hide();
                    } else {
                        box.hide();
                        box2.show();
                    }
                }

                const radioButtons = $('input[name="kayitturu"]');
                radioButtons.on('click', handleRadioClick);
            });
        </script>
        <script src="../../public/src/jquery/jquery-3.6.4.min.js"></script>

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