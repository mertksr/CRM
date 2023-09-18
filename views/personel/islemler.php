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
    <link rel="stylesheet" type="text/css" href="../../public/src/fontawesome/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css">

    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../../public/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css">
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


                                <div class="statbox widget box box-shadow"> 
                                    <div>






                                    </div>

                                    <div class="widget-content widget-content-area">

                                        <table id="islemler" class="table dt-table-hover display nowrap" >
                                            <thead>
                                                <tr>

                                                    <th style="text-align:center;">No</th>
                                                    <th style="text-align:center;">Müşteri</th>
                                                    <th style="text-align:center;">İşlem Zamanı</th>
                                                    <th style="text-align:center;">İşlem Türü</th>
                                                    <th style="text-align:center;">Tam Fiyat</th>
                                                    <th style="text-align:center;">Not</th>
                                                    <th style="text-align:center;">Detay</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            $bugununBaslangici = strtotime('today');
                                            $bugununBitisi = strtotime('tomorrow') - 1;
                                            $islemsor = $db->prepare("SELECT * from islemler WHERE islemyapanKisi = :islemMusteriNo AND islemTarihi BETWEEN DATE(NOW()) AND DATE(NOW() + INTERVAL 1 DAY) ORDER BY islemTarihi DESC");
                                            $islemsor->execute(array(
                                                'islemMusteriNo' => $_SESSION['kullanici']

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
                                                $alınanucretfrmt = number_format($alınanucret, 2, ',', '.');     
                                                $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
                                                $musterisor->execute(array($islemcek['islemMusteriNo']));
                                                $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
                                                ?>

                                                <tr>
                                                    <td style="text-align:center;"><?= $say; ?></td>
                                                    <td style="text-align:center;"><?= $mustericek['mAdSoyad']?></td>
                                                    <td style="text-align:center;"><?= date("d.m.Y H:i", strtotime($islemcek['islemTarihi'])); ?></td>
                                                    <td style="text-align:center;"><?= implode(", ", $islemturu);  ?></td>

                                                    <td style="text-align:center;"><?= $alınanucretfrmt; ?> TL</td>

                                                    <td style="text-align:center;"><?= $islemcek['islemNot']; ?> </td>

                                                    <td style="max-width:20px;text-align:center;">
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
                        <div class="modal-body row g-1" id="islemdetaybody"></div>
                    </div>
                </div>
            </div>

            <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © Mert Keser</p>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <script>








            $(document).on('click', '.detay', function() {
                var islemId = $(this).attr("id");
                
                if (islemId != '') {
                    $.ajax({
                        url: "../../netting/pislemdetaygetir.php",
                        method: "POST",
                        data: {
                            islemId: islemId
                        },
                        success: function(data) {

                            $('#islemdetaybody').html(data);
                            $('#detayModal').modal('show');

                        }
                    });
                }
            });
 
    </script>

    <script src="../../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
    <script src="../../public/src/fontawesome/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../../public/src/plugins/src/global/vendors.min.js"></script>
    <script src="../../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../../public/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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