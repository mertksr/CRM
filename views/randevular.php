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
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
    <script src="../public/src/jquery/jquery-3.6.4.min.js"></script>
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

                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                            <div class="statbox widget box box-shadow">

                                <div class="widget-content widget-content-area">

                                    <table id="randevular" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th><input type="text" class="form-control" id="specialsearch" placeholder="Ad Soyad"></th>
                                                <th><input type="text" class="form-control" id="specialsearch" placeholder="Bölge"></th>
                                                <th><input type="text" class="form-control" id="specialsearch" placeholder="Teknisyen"></th>
                                                <th><input type="text" class="form-control" id="specialsearch" placeholder="Hizmet Türü"></th>
                                                <th><input type="text" class="form-control" id="specialsearch" placeholder="Randevu Tarihi"></th>
                                                <th>Notlar</th>
                                                <th style="max-width:20px;text-align:left;">Durum</th>
                                                <th style="max-width:20px;text-align:center;">Detaylar</th>
                                                <th style="max-width:20px;text-align:center;">Prsnl. Ata</th>
                                                <th style="max-width:20px;text-align:center;">Kapat</th>
                                                <th style="max-width:20px;text-align:center;">Ertele</th>



                                            </tr>
                                        </thead>
                                        <?php
                                        $randevusor = $db->prepare("SELECT * from randevular ORDER BY rDurum DESC");
                                        $randevusor->execute();
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

                                            $urunsor = $db->prepare("SELECT * FROM urunler");
                                            $urunsor->execute();
                                            $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);

                                            $islemurun = [];
                                            $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);
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
                                                <td><?= $mustericek['mAdSoyad'] ?></td>
                                                <td><?= $mustericek['mBolge'] ?></td>
                                                <td><?= $randevucek['rTeknisyen']; ?></td>
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
                                                                        $iletisimbilgisi =  $iletisimcek["İletisimBilgisi"];

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
                                                                            <label for="exampleFormControlInput1">Bölge </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mBolge']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Cihaz </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mustericek['mCihaz']; ?>">
                                                                        </div>

                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Adres</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Randevu Tarihi </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Teknisyen</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rTeknisyen']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Hizmet Türü</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= implode(", ", $islemturu);  ?>">
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Kullanılan Ürünler</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= implode(", ", $islemurun); ?></textarea>
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
                                                                                    }  ?> data-bs-toggle="modal" data-bs-target="#ata<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-user-plus"></i> </a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" <?php if ($randevucek['rDurum'] == "0") {
                                                                                        echo "style='pointer-events: none;background-color:#c4c4c4;'";
                                                                                    }  ?> data-bs-toggle="modal" data-bs-target="#onayla<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-check"></i> </a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" <?php if ($randevucek['rDurum'] == "0") {
                                                                                        echo "style='pointer-events: none;background-color:#c4c4c4;'";
                                                                                    }  ?> data-bs-toggle="modal" data-bs-target="#ertele<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-calendar-plus"></i>
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

                                                                <form action="../netting/randevuislem.php" method="POST">


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

                                                                    <div class="row g-1 boxx" id="satisekleform">
                                                                        <h5 style="color:red;">B1</h5>


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
                                                                                    <select id="choices-multiple-remove-button-<?= $randevucek['rNo'];?>" data-id="<?= $randevucek['rNo'];?>"" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
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
                                                                                <div class="col-12">
                                                                                    <label for="defaultInputState" class="form-label ">İşlemi Yapan</label>
                                                                                    <select form="islemekleform" id="defaultInputState" name="islemyapan" class="form-select">
                                                                                        <option value="">Seç</option>
                                                                                        <option name="Mehmet">Mehmet</option>
                                                                                        <option name="Bedirhan">Bedirhan</option>
                                                                                    </select>
                                                                                </div>

                                                                                <!-- <div class="col-6">
                                    <label for="defaultInputState" class="form-label ">Periyot</label>
                                    <select form="islemekleform" id="defaultInputState" name="periyot" class="form-select select">
                                    <option value="6" <?php // if($mcek['mPeriyot']=="6"){echo 'selected';} 
                                                        ?>>6</option>
                        <option value="12"<?php //if($mcek['mPeriyot']=="12"){echo 'selected';} 
                                            ?>>12</option>
                        <option value="3"<?php // if($mcek['mPeriyot']=="3"){echo 'selected';} 
                                            ?>>3</option>
                        <option value="1"<?php // if($mcek['mPeriyot']=="1"){echo 'selected';} 
                                            ?>>1</option>
                        <option value="2"<?php // if($mcek['mPeriyot']=="2"){echo 'selected';} 
                                            ?>>2</option>
                        <option value="4"<?php  // if($mcek['mPeriyot']=="4"){echo 'selected';} 
                                            ?>>4</option>
                        <option value="5"<?php  // if($mcek['mPeriyot']=="5"){echo 'selected';} 
                                            ?>>5</option>
                        <option value="7"<?php  // if($mcek['mPeriyot']=="7"){echo 'selected';} 
                                            ?>>7</option>
                        <option value="8"<?php // if($mcek['mPeriyot']=="8"){echo 'selected';} 
                                            ?>>8</option>
                        <option value="9"<?php // if($mcek['mPeriyot']=="9"){echo 'selected';} 
                                            ?>>9</option>
                        <option value="10"<?php // if($mcek['mPeriyot']=="10"){echo 'selected';} 
                                            ?>>10</option>
                        <option value="11"<?php // if($mcek['mPeriyot']=="11"){echo 'selected';} 
                                            ?>>11</option>
                                    </select>
                                </div> -->

                                                                                <div class="col-12">
                                                                                    <label for="inputAddress2" class="form-label">Notlar</label>
                                                                                    <input type="text" class="form-control" name="islemnotlari" id="inputAddress2">
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <label for="inputAddress2" class="form-label">Fotoğraf Ekle</label>
                                                                                    <input type="hidden" name="musterino" value="<?= $_GET['no'] ?>">

                                                                                    <input class="form-control file-upload-input" type="file" name="resimler[]" multiple accept="image/*">
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
                                                                    <div class="row g-1 boxx2" id="satisekleform">
                                                                        <h5 style="color:red;">B2</h5>



                                                                        <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                                    </div>

                                                                    <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                            </div>

                                                        </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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
                                                                <form action="../netting/randevuislem.php" method="POST" id="erteleform">

                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Kaç Ay </label>
                                                                        <input type="text" name="erteleay" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label for="exampleFormControlInput1">Hangi Tarih</label>
                                                                        <input type="date" name="erteletarih" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                    </div>

                                                                    <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="randevuertele" type="submit">Ertele</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="ata<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body row">

                                                            <div class="row g-1">
                                                                <h5 style="color:red;">Randevuya Atamak İstediğinizi Personeli Seçin</h5>
                                                                <form action="../netting/randevuislem.php" method="POST" id="ataform">

                                                                    <div class="col-12">
                                                                        <label for="defaultInputState" class="form-label ">Personel</label>
                                                                        <select id="defaultInputState" name="randevupersonel" class="form-select">
                                                                            <option selected="">Seçilmemiş</option>
                                                                            <option name="Bedirhan" <?php if ($randevucek['rPersonel'] == "Bedirhan") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Bedirhan</option>
                                                                            <option name="Mehmet" <?php if ($randevucek['rPersonel'] == "Mehmet") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Mehmet</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="randevuata" type="submit">Kaydet</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>

    <script>

        $("[id^='choices-multiple-remove-button']").on("change", function() {
            var randevuid = $("[id^='choices-multiple-remove-button']").attr("data-id");
            var kullanilanurunler = "choices-multiple-remove-button" + randevuid;
            console.log(kullanilanurunler);
            var selectedValues = $("#"+kullanilanurunler).val();
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
                console.log(selectedString);
                for (var i = 0; i < prices.length; i++) {
                    total += parseFloat(prices[i]);
                }
                console.log(selectedValues);
                $("#cost").val(total);
                $("#tamfiyat").val(total);
                $("#indirimtutari").val("0");
            });

        });


        $(document).ready(function() {

            var multipleCancelButton = new Choices("[id^='choices-multiple-remove-button']", {
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
                    url: "../netting/ayarcek.php",
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

    <script src="../public/src/fontawesome/all.js"></script>
    <script src="../public/src/jquery/jquery-3.6.4.min.js"></script>

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