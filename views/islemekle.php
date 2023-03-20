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
    <link href="../public/layouts/horizontal-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- Mültiselect -->
    <link href="../public/src/plugins/src/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
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

    <!--  BEGIN TOPBAR  -->
    <?php include 'partials/topbar.php' ?>
    <!--  END TOPBAR  -->

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
                        <div id="flLoginForm" class="col-lg-12  layout-spacing">

                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>İşlem Ekle</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="row g-3">
                                    <div class="col-6">
                                            <label for="inputAddress" class="form-label">Müşteri</label>
                                            <input type="text" class="form-control" id="inputAddress"
                                                placeholder="1234 Main St">
                                        </div>
                                        <div class="col-6">
                                            <label for="defaultInputState" class="form-label ">İşlemi Yapan</label>
                                            <select form="musteriekleform" id="defaultInputState" name="ituru[]"
                                                class="form-select">
                                                <option selected="">Seç</option>
                                                <option>Mehmet</option>
                                                <option>Cihan</option>
                                                <option>Bedirhan</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="defaultInputState" class="form-label ">Kullanılan Ürünler(Multi select?)</label>
                                            <select form="musteriekleform" id="defaultInputState" name="ituru[]"
                                                class="form-select">
                                                <option selected="">Seç</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="defaultInputState" class="form-label ">Periyot</label>
                                            <select form="musteriekleform" id="defaultInputState" name="ituru[]"
                                                class="form-select">
                                                <option selected="">6</option>
                                                <option>12</option>
                                                <option>3</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">İşlem Ücreti (OTOMATİK GElcek)</label>
                                            <input type="text" class="form-control" id="inputAddress"
                                                placeholder="1234 Main St">
                                        </div>
                                        <div class="col-6">
                                            <label for="inputAddress2" class="form-label">Notlar</label>
                                            <input type="text" class="form-control" id="inputAddress2"
                                                placeholder="Apartment, studio, or floor">
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php include 'partials/footer.php' ?>


    </div>
    <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <script src="../public/src/plugins/multiselect/jquery.multi-select.js"></script>

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