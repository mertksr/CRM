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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 

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
                <div class="container" style="margin: 0 auto;">

                    <div class="row layout-top-spacing" id="cancel-row">
                        <div id="wizard_Default" class="col-lg-12 layout-spacing" style="width:%100;">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Müşteri Ekle</h4>
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
                                                <form id="musteriekleform" method="post" action="aa.php">
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label for="flexRadioDefault1">Kayıt Türü</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" value="bb"
                                                                    id="flexRadioDefault1" checked>
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Gerçek Kişi
                                                                </label>
                                                            </div>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" value="ccccccc"
                                                                    id="flexRadioDefault2">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Tüzel Kişi
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4 col-12 col md-6 col-lg-6">
                                                            <label for="defaultForm-name">Ad</label>
                                                            <input form="musteriekleform" type="text" name="ad"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4 col-12 col md-6 col-lg-6">
                                                            <label for="defaultForm-name">Soyad</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>

                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name" class="p-1">Tel1</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name" class="p-1">Tel2</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4  col-6">
                                                            <label for="defaultForm-name" class="p-1">Tel3</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>

                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name">Tc No/Vergi No</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name">Vergi İli</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name">Vergi Dairesi</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" name="ad" id="defaultForm-name">
                                                        </div>
                                                    </div>



                                                </form>
                                                <div class="button-action mt-1">
                                                    <button class="btn btn-secondary btn-prev me-3"
                                                        disabled>Prev</button>
                                                    <button class="btn btn-secondary btn-nxt">Next</button>
                                                </div>
                                            </div>

                                            <div id="defaultStep-two" class="content" role="tabpanel">
                                                <form>

                                                    <div class="row">
                                                        <div class="form-group mb-3 col-6">
                                                            <label for="defaultForm-name">Kurulum Tarihi</label>
                                                            <input form="musteriekleform" type="date"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name">Garanti Bitiş Tarihi</label>
                                                            <input form="musteriekleform" type="date"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-4  col-6">
                                                            <label for="defaultInputState" class="form-label p-1">Cihaz
                                                                Marka</label>
                                                            <select form="musteriekleform" id="defaultInputState"
                                                                class="form-select">
                                                                <option selected="">Seç</option>
                                                                <option>Aqualine</option>
                                                                <option>Aqualix</option>
                                                                <option>Ocean</option>
                                                                <option>Pınar/Diğer</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-4  col-6">
                                                            <label for="defaultInputState" class="form-label p-1">Cihaz
                                                                Model</label>
                                                            <select form="musteriekleform" id="defaultInputState"
                                                                class="form-select" name="vd">
                                                                <option selected="">Seç</option>
                                                                <option>Açık Kasa</option>
                                                                <option>Kapalı Kasa</option>
                                                                <option>Bina girişi</option>


                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3 col-6">
                                                            <label for="defaultForm-name">Son Bakım Tarihi</label>
                                                            <input form="musteriekleform" type="date"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-3 col-6">
                                                            <label for="defaultInputState" class="form-label p-1">Bakım
                                                                Periyodu</label>
                                                            <select form="musteriekleform" id="defaultInputState"
                                                                class="form-select">
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
                                                        <div class="form-group mb-4 col-6">
                                                            <label for="defaultForm-name">Notlar</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-0 col-6">
                                                            <label for="defaultForm-name">Satış Fiyatı</label>
                                                            <input form="musteriekleform" type="text" name="soyad"
                                                                class="form-control" id="defaultForm-name">
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="button-action mt-1">
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
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultInputAddress"
                                                                placeholder="1234 Main St">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="defaultInputCity"
                                                                class="form-label">Bölge</label>
                                                            <input form="musteriekleform" type="text"
                                                                class="form-control" id="defaultInputCity">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <button class="btn btn-sm btn-primary">Konum Bul</button>
                                                            <button class="btn btn-sm btn-success">Konumu Aç</button>

                                                            <input class="form-control" name="ad" type="text" readonly>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="button-action mt-3">
                                                    <button class="btn btn-secondary btn-prev me-3">Prev</button>
                                                    <input type="submit" form="musteriekleform"
                                                        class="btn btn-success me-3">
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
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
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