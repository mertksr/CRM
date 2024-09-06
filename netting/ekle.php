<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/header.php' ?>
    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../public/layouts/horizontal-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../public/public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/stepper/bsStepper.min.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/light/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/stepper/custom-bsStepper.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/dark/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/stepper/custom-bsStepper.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN Topbar  -->
    <?php include 'partials/topbar.php' ?>
    <!--  END Topbar  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'partials/navbar.php' ?>

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <!--  BEGIN BREADCRUMBS  -->
                    <div class="secondary-nav">
                        <div class="breadcrumbs-container" data-page-heading="Analytics">
                            <header class="header navbar navbar-expand-sm">
                                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse"
                                    data-placement="bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-menu">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </a>
                                <div class="d-flex breadcrumb-content">
                                    <div class="page-header">

                                        <div class="page-title">
                                        </div>

                                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Form</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Wizards</li>
                                            </ol>
                                        </nav>

                                    </div>
                                </div>

                            </header>
                        </div>
                    </div>
                    <!--  END BREADCRUMBS  -->

                    <div class="row layout-top-spacing" id="cancel-row">

                        <div id="wizard_Default" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Default</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="bs-stepper stepper-form-one">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#defaultStep-one">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Step One</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-two">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Step Two</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-three">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Step Three</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="defaultStep-one" class="content" role="tabpanel">
                                                <form id="form" method="post" action="aa.php">
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Ad</label>
                                                        <input type="text" name="ad" class="form-control"
                                                            id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Soyad</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                    </div>

                                                    <div class="form-group mb-4" style="display:flex;">
                                                        <label for="defaultForm-name" class="p-1">Tel1</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                        <label for="defaultForm-name" class="p-1">Tel2</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                        <label for="defaultForm-name" class="p-1">Tel3</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Tc No/Vergi No</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Vergi İli</label>
                                                        <input type="text" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Vergi Dairesi</label>
                                                        <input type="text" class="form-control" name="ad"
                                                            id="defaultForm-name">
                                                    </div>
                                            


                                            </form>
                                            <div class="button-action mt-5">
                                                <button class="btn btn-secondary btn-prev me-3" disabled>Prev</button>
                                                <button class="btn btn-secondary btn-nxt">Next</button>
                                            </div>
                                        </div>

                                        <div id="defaultStep-two" class="content" role="tabpanel">
                                            <form>
                                                <div class="needs-validation">
                                                    <div class="form-group mb-3">
                                                        <label for="defaultForm-name">Cihaz Kurulum Tarihi</label>
                                                        <input type="date" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Garanti Bitiş Tarihi</label>
                                                        <input type="date" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4" style="display:flex;">
                                                        <label for="defaultInputState" class="form-label p-1">Cihaz
                                                            Marka</label>
                                                        <select id="defaultInputState" class="form-select">
                                                            <option selected="">Seç</option>
                                                            <option>Aqualine</option>
                                                            <option>Aqualix</option>
                                                            <option>Ocean</option>
                                                            <option>Pınar/Diğer</option>

                                                        </select>


                                                        <label for="defaultInputState" class="form-label p-1">Cihaz
                                                            Model</label>
                                                        <select id="defaultInputState" class="form-select">
                                                            <option selected="">Seç</option>
                                                            <option>Açık Kasa</option>
                                                            <option>Kapalı Kasa</option>
                                                            <option>Bina girişi</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="defaultForm-name">Son Bakım Tarihi</label>
                                                        <input type="date" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="defaultForm-name">Notlar</label>
                                                        <input type="input" name="soyad" class="form-control"
                                                            id="defaultForm-name">
                                                    </div>
                                                    <div class="form-group mb-0" style="display:flex">
                                                        <label for="defaultForm-name">Cihaz Satış Fiyatı</label>
                                                        <input type="input" name="soyad" class="form-control"
                                                            id="defaultForm-name">

                                                        <label for="defaultInputState" class="form-label p-1">Bakım Kaç
                                                            Ayda</label>
                                                        <select id="defaultInputState" class="form-select">
                                                            <option selected="">Seç</option>
                                                            <option>3</option>
                                                            <option>6</option>
                                                            <option>12</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="button-action mt-5">
                                                <button class="btn btn-secondary btn-prev me-3">Prev</button>
                                                <button class="btn btn-secondary btn-nxt">Next</button>
                                            </div>
                                        </div>
                                        <div id="defaultStep-three" class="content" role="tabpanel">
                                            <form class="row g-3">
                                                <div class="row g-3 needs-validation">
                                                    <div class="col-12">
                                                        <label for="defaultInputAddress"
                                                            class="form-label">Adres</label>
                                                        <input type="text" class="form-control" id="defaultInputAddress"
                                                            placeholder="1234 Main St">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="defaultInputCity" class="form-label">Bölge</label>
                                                        <input type="text" class="form-control" id="defaultInputCity">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <button class="btn btn-sm btn-primary">Konum Bul</button>
                                                        <button class="btn btn-sm btn-success">Konumu Aç</button>

                                                        <input class="form-control" name="ad" type="text" readonly
                                                            value="1293871239018273089">
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="button-action mt-3">
                                                <button class="btn btn-secondary btn-prev me-3">Prev</button>
                                                <input type="submit" form="form" class="btn btn-success me-3">
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

        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                        href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></p>
            </div>
        </div>

    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script>
    <script src="../public/src/plugins/src/highlight/highlight.pack.js"></script>
    <script src="../public/src/assets/js/scrollspyNav.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../public/src/plugins/src/stepper/bsStepper.min.js"></script>
    <script src="../public/src/plugins/src/stepper/custom-bsStepper.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>