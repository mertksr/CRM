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

    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">,

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

        table td {
            color: #000000 !important;
            font-weight: 600 !important;
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
                        <h4>VERESİYELER</h4>
                        <br>
                        <div class="row">


                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="statbox widget box box-shadow">

                                    <div class="widget-content widget-content-area">

                                        <table id="veresiyeler" class="table dt-table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Bölge</th>
                                                    <th style="text-align:center;">İsim</th>
                                                    <th style="text-align:center;max-width:20px;">Veresiye</th>
                                                    <th style="text-align:center;">İşlem Türü</th>
                                                    <th style="text-align:center;">Yapılan Tarih</th>
                                                    <th style="text-align:center;max-width:30px;">Alınan</th>
                                                    <th style="text-align:center;max-width:30px;">Kalan</th>
                                                    <th style="text-align:center;">Not</th>
                                                    <th style="text-align:center;max-width:20px;">Detay</th>
                                                    <th style="max-width:20px;text-align:center;">V. Düş</th>
                                                    <th style="max-width:20px;text-align:center;">Not</th>
                                                    <th style="max-width:20px;text-align:center;">İptal Et</th>

                                                    <th style="max-width:20px;text-align:center;">Sil</th>



                                                </tr>
                                            </thead>
                                            <?php
                                            $sql = "SELECT veresiye.*, musteriler.* FROM veresiye INNER JOIN musteriler ON veresiye.vMusteriNo = musteriler.mMusteriNo WHERE veresiye.vDurum = 1";

                                            $veresiyeMusteriSorgu = $db->prepare($sql);
                                            $veresiyeMusteriSorgu->execute();

                                            while ($veresiyeMusteri = $veresiyeMusteriSorgu->fetch(PDO::FETCH_ASSOC)) {
                                                $islemsor = $db->prepare("SELECT * FROM servismuhasebe WHERE sSatisNo =:satisno OR sIslemNo =:islemno");
                                                $islemsor->execute(array(
                                                    'satisno' => $veresiyeMusteri['vSatisNo'],
                                                    'islemno' => $veresiyeMusteri['vIslemNo']

                                                ));
                                                $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                                $islemturu = unserialize($islemcek['sTuru']);
                                                if (is_array($islemturu)) {
                                                    $islemturu = implode(", ", $islemturu);
                                                } else {
                                                    $islemturu = "Satış";
                                                }
                                                $tahsilatToplam = 0;
                                                $veresiyetahsilatsor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtVeresiyeNo = :id");
                                                $veresiyetahsilatsor->execute(array('id' => $veresiyeMusteri['vId']));
                                                while ($veresiyetahsilatcek = $veresiyetahsilatsor->fetch(PDO::FETCH_ASSOC)) {
                                                    // Veritabanından gelen ücret sütunu değerini alın ve toplam ücrete ekleyin
                                                    $ucret = $veresiyetahsilatcek['vtTahsilat'];
                                                    $tahsilatToplam += $ucret;
                                                }
                                                $kalan = $veresiyeMusteri['vTutar'] - $tahsilatToplam
                                            ?>

                                                <tr>


                                                    <td style="text-align:center;"><?= $veresiyeMusteri['mBolge']; ?></td>
                                                    <td style="text-align:center;"><?= $veresiyeMusteri['mAdSoyad']; ?></td>
                                                    <td style="text-align:center;"><?= $veresiyeMusteri['vTutar']; ?> TL</td>
                                                    <td style="text-align:center;"><?= $islemturu; ?></td>
                                                    <td style="text-align:center;"><?= date("d.m.Y", strtotime($veresiyeMusteri['vTarih']));  ?></td>
                                                    <td style="text-align:center;"><?= $tahsilatToplam ?> TL</td>
                                                    <td style="text-align:center;"><?= $kalan ?> TL</td>
                                                    <td style="text-align:center;"><?= $veresiyeMusteri['vNot']; ?></td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel" data-bs-toggle="modal" data-bs-target="#detay<?= $veresiyeMusteri['vId']; ?>">
                                                            <i class="fa-solid fa-circle-info"></i>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel" data-bs-toggle="modal" data-bs-target="#düş<?= $veresiyeMusteri['vId']; ?>">
                                                            <i class="fa-solid fa-calendar-plus"></i>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel" data-bs-toggle="modal" data-bs-target="#notduzenle<?= $veresiyeMusteri['vId']; ?>">
                                                            <i class="fa-solid fa-pen"></i>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel" data-bs-toggle="modal" data-bs-target="#iptal<?= $veresiyeMusteri['vId']; ?>">
                                                            <i class="fa-solid fa-xmark"></i>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a class="btn btn-ozel" data-bs-toggle="modal" data-bs-target="#sil<?= $veresiyeMusteri['vId']; ?>">
                                                            <i class="fa-solid fa-trash"></i>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="notduzenle<?= $veresiyeMusteri['vId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">

                                                                <div class="row g-1">
                                                                    <h4 style="color:red;text-align:center;"><?= $veresiyeMusteri['mAdSoyad']; ?></h4>
                                                                    <form action="../netting/veresiyeislem.php" method="POST">

                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Veresiye Notu</label>
                                                                            <input type="text" name="vnot" class="form-control contact-modal" value="<?= $veresiyeMusteri['vNot']; ?>" id="exampleFormControlInput1">
                                                                            <input type="hidden" value="<?= $veresiyeMusteri['vId']; ?>" name="veresiyeid">
                                                                        </div>


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-success" name="notduzenle" type="submit">Kaydet</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="detay<?= $veresiyeMusteri['vId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">

                                                                <div class="row g-1">
                                                                    <h4 style="color:red;text-align:center;"><?= $veresiyeMusteri['mAdSoyad']; ?></h4>
                                                                    <form action="../netting/randevuislem.php" method="POST" id="erteleform">
                                                                        <div class="col-6">
                                                                            <p>
                                                                                <?php if (!empty($veresiyeMusteri['mTel1'])) {

                                                                                    echo ' <div class="p-2" style="font-size:17px;"><a href="https://wa.me/' . $veresiyeMusteri['mTel1'] . '"><i class="fa-solid fa-phone fa-2xl"></i></a> :' . $veresiyeMusteri['mTel1'] . '</div>';
                                                                                }
                                                                                if (!empty($veresiyeMusteri['mTel2'])) {
                                                                                    echo '<div class="p-2" style="font-size:17px;"><a href="https://wa.me/' . $veresiyeMusteri['mTel2'] . '"><i class="fa-solid fa-phone fa-2xl"></i></a> :' . $veresiyeMusteri['mTel2'] . '</div>';
                                                                                } ?>

                                                                            </p>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <p>
                                                                                <?php
                                                                                if (!empty($veresiyeMusteri['mTel1'])) {

                                                                                    echo '<div class="p-2" style="font-size:17px;"><a href="https://wa.me/' . $veresiyeMusteri['mTel1'] . '"><i class="fa-brands fa-whatsapp fa-2xl"></i></a> :' . $veresiyeMusteri['mTel1'] . '</div>';
                                                                                }
                                                                                if (!empty($veresiyeMusteri['mTel2'])) {
                                                                                    echo ' <div class="p-2" style="font-size:17px;"><a href="https://wa.me/' . $veresiyeMusteri['mTel2'] . '"><i class="fa-brands fa-whatsapp fa-2xl"></i></a> :' . $veresiyeMusteri['mTel2'] . '</div>';
                                                                                }
                                                                                ?>s
                                                                            </p>
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Toplam Ücret</label>
                                                                            <input type="text" name="tahsilattarih" readonly value="<?= $veresiyeMusteri['vTutar']; ?> TL" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Ödenen Miktar</label>
                                                                            <input type="text" name="tahsilattarih" readonly value="<?= $tahsilatToplam; ?> TL" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleFormControlInput1">Kalan Miktar</label>
                                                                            <input type="text" name="tahsilattarih" readonly value="<?= $kalan; ?> TL" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <?php
                                                                        $tahsilatsor = $db->prepare("SELECT * FROM veresiyetahsilat WHERE vtVeresiyeNo =:veresiyeno");
                                                                        $tahsilatsor->execute(array(
                                                                            'veresiyeno' => $veresiyeMusteri['vId']
                                                                        ));
                                                                        while ($tahsilatcek = $tahsilatsor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Tahsilat Miktarı</label>
                                                                                <input type="text" name="tahsilattarih" readonly value="<?= $tahsilatcek['vtTahsilat'] ?> TL" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                            </div>
                                                                            <div class="form-group col-6">
                                                                                <label for="exampleFormControlInput1">Tahsilat Tarihi</label>
                                                                                <input type="text" name="tahsilatnot" readonly value="<?= date("d.m.Y", strtotime($tahsilatcek['vtTarih'])); ?>" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Tahsilat Notları</label>
                                                                            <input type="text" name="tahsilattarih" readonly value="<?= $veresiyeMusteri['vNot']; ?>" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-success" name="randevuertele" type="submit">Kaydet</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="düş<?= $veresiyeMusteri['vId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">

                                                                <div class="row g-1">
                                                                    <h4 style="color:red;text-align:center;"><?= $veresiyeMusteri['mAdSoyad']; ?></h4>
                                                                    <form action="../netting/veresiyeislem.php" method="POST" id="erteleform">

                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Tahsilat </label>
                                                                            <input type="text" name="tahsilat" required class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Tarih</label>
                                                                            <input type="date" name="tarih" required class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Not</label>
                                                                            <input type="text" name="not" class="form-control contact-modal" id="exampleFormControlInput1">
                                                                        </div>
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vTutar']; ?>" name="tutar">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vId']; ?>" name="veresiyeno">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vAlinan']; ?>" name="alinan">

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-success" name="tahsilatekle" type="submit">Kaydet</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="iptal<?= $veresiyeMusteri['vId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">

                                                                <div class="row g-1">
                                                                    <h4 style="color:#26577C;text-align:center;font-size:xx-large;"><?= $veresiyeMusteri['mAdSoyad']; ?></h4>
                                                                    <h4 style="color:#F24C3D;text-align:center;">VERESİYEYİ İPTAL ETMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>
                                                                    <form action="../netting/veresiyeislem.php" method="POST" id="erteleform">

                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vId']; ?>" name="veresiyeno">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vKalan']; ?>" name="veresiyekalan">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vTutar']; ?>" name="veresiyetoplam">


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" name="veresiyeiptal" type="submit">İptal Et</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="sil<?= $veresiyeMusteri['vId']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>
                                                            <div class="modal-body row">

                                                                <div class="row g-1">
                                                                    <h4 style="color:#26577C;text-align:center;font-size:xx-large;"><?= $veresiyeMusteri['mAdSoyad']; ?></h4>
                                                                    <h4 style="color:#F24C3D;text-align:center;">VERESİYEYİ SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>
                                                                    <form action="../netting/veresiyeislem.php" method="POST" id="erteleform">

                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vId']; ?>" name="veresiyeno">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vKalan']; ?>" name="veresiyekalan">
                                                                        <input type="hidden" value="<?= $veresiyeMusteri['vTutar']; ?>" name="veresiyetoplam">


                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" name="veresiyesil" type="submit">Silmeyi Onayla</button>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>

        <script src="../public/src/jquery/jquery-3.6.4.min.js"></script>

        <script src="../public/src/fontawesome/all.js"></script>

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