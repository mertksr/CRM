<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MK</title>
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


    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">
    <script src="../public/src/fontawesome/all.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../public/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../public/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../public/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>


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



                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Servis Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Satış Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Yapılan İndirim</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:crimson;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Günlük Veresiye</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:crimson;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Bedirhan'ın Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Kadir'in Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Mehmet'in Bugünkü Kazancı</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:limegreen;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6  p-2">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Şirket Borcu</h6>
                                        </div>
                                    </div>
                                    <div class="w-content">
                                        <div class="w-info">
                                            <p class="value" style="color:burlywood;">$ 45,141 </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area col-6">

                            <div class="table-responsive">
                                <h4>Aylık Kazanç</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th class="text-center" scope="col">Sales</th>
                                            <th class="text-center" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shaun Park</td>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                                <span class="table-inner-text">25 Apr</span>
                                            </td>
                                            <td class="text-center">320</td>
                                            <td class="text-center">
                                                <span class="badge badge-light-success">Approved</span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area col-6">

<div class="table-responsive">
    <h4>Günlük Kazanç</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th class="text-center" scope="col">Sales</th>
                <th class="text-center" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>Xavier</td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="table-inner-text">18 May</span>
                </td>
                <td class="text-center">784</td>
                <td class="text-center">
                    <span class="badge badge-light-info">In Progress</span>
                </td>
            </tr>
        </tbody>
    </table>
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
            </div>s
            <!--  END CONTENT AREA  -->
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <script>

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