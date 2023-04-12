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
    
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <?php $msor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = :id");
                                        $msor->execute(array(
                                            'id' => $_GET['no']));
              
                                       $mcek = $msor->fetch(PDO::FETCH_ASSOC);?>
                            <div class="statbox widget box box-shadow">
          <h5><span  style="color:#FE6244;"><?= $mcek['mAdSoyad']; ?></span> Randevu Kayıtları</h5>                   
          <a class="btn btn-lg special1 mb-3" style="color:#EFF5F5;" href="randevuekle.php?no=<?= $_GET['no']; ?>">Yeni Randevu</a>
 
                                <div class="widget-content widget-content-area">

                                    <table id="islemler" class="table dt-table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Müşteri Ad Soyad</th>
                                                <th>Gorüşme Tarihi</th>
                                                <th>Hizmet Türü</th>
                                                <th>Randevu Tarihi</th>
                                                <th>Detaylar</th>
                                                <th>Durum</th>
                                                <th>Kapat</th>
                                                <th>Ertele</th>
                                                <th>Düzenle</th>


                                            </tr>
                                        </thead>
                                        <?php
                                        $randevusor = $db->prepare("SELECT * from randevular WHERE rMID = :id ORDER BY rNo DESC");
                                        $randevusor->execute(array(
                                            'id' => $_GET['no']));
                                        $say = 0;
                                        while ($randevucek = $randevusor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++;
                                            $modalId = "modal" . $randevucek["rNo"];
                                            $musteriid = $randevucek['rMID'];
                                            $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  $musteriid");
                                            $musterisor->execute();
                                            $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
                                            $mahalle = $mustericek['mBolge'];
                                            $mahallesor = $db->prepare("SELECT * from neighborhood where NeighborhoodID =  $mahalle");
                                            $mahallesor->execute();
                                            $mahallecek = $mahallesor->fetch(PDO::FETCH_ASSOC);
                                        ?>

                                            <tr>
                                                <td><?= $say; ?></td>
                                                <td>Merrt k</td>
                                                <td><?= date("d.m.Y", strtotime($randevucek['rGorusmeTarihi'])); ?></td>
                                                <td><?= $randevucek['rHizmetTuru']; ?></td>
                                                <td><?= date("d.m.Y", strtotime($randevucek['rTarih'])); ?></td>


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
                                                                    <h5 class="modal-title" id="exampleModalLabel">
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


                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Adres</label>
                                                                            <textarea type="text" readonly style="height:60px;" class="form-control contact-modal" id="exampleFormControlInput1"><?= $mustericek['mAdres'] ?></textarea>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Bölge </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $mahallecek['NeighborhoodName']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Son Bakım Tarihi</label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?= date("d.m.Y", strtotime($mustericek['mSonIslem'])); ?>">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Temsilci </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rTemsilci']; ?>">
                                                                        </div>

                                                                        <div class="form-group col-6">
                                                                            <label for="exampleFormControlInput1">Teklif </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rTeklif']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-12">
                                                                            <label for="exampleFormControlInput1">Notlar </label>
                                                                            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="<?php echo $randevucek['rNot']; ?>">
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
                                                <td style="padding:0;text-align:center;"><?php
                                                                                            if ($randevucek['rDurum'] == 0) {
                                                                                                echo "<span class='badge badge-success me-4'>Yapıldı</span>";
                                                                                            } elseif ($randevucek['rDurum'] == 1) {
                                                                                                echo "<span class='badge badge-danger me-4'>Bekliyor</span>";
                                                                                            }


                                                                                            ?> </td>
                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" data-bs-toggle="modal" data-bs-target="#onayla<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-check"></i> </a>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" data-bs-toggle="modal" data-bs-target="#ertele<?php echo $modalId; ?>">
                                                        <i class="fa-solid fa-calendar-plus"></i>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a class="btn btn-ozel mr-2" href="randevuduzenle.php?no=<?= $randevucek['rMID']?>&rno=<?= $randevucek['rNo']?>">
                                                        <i class="fa-solid fa-pen-to-square"></i> </a>
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

                                                            <div class="row g-1">
                                                                <p style="color:red;">RANDEVUYU KAPATMADAN ÖNCE YAPTIĞINIZ İŞLEMİ KAYDEDİN!!!</p>
                                                                <form action="../netting/randevuislem.php" method="POST">
                                                                    <div class="col-6">
                                                                        <a style="width:100%;" class="btn btn-warning" href="islemler.php?no=<?= $mustericek['mMusteriNo']; ?>">Servis Kaydı Ekle</a>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <a style="width:100%;" class="btn btn-primary" href="satislar.php?no=<?= $mustericek['mMusteriNo']; ?>">Satış Ekle</a>
                                                                    </div>


                                                                    <input type="hidden" name="randevuid" value="<?= $randevucek['rNo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="randevukapat" type="submit">Randevuyu Onayla</button>
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