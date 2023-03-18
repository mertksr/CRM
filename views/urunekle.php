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
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/stepper/bsStepper.min.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/light/scrollspyNav.css"/>
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/stepper/custom-bsStepper.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/dark/scrollspyNav.css"/>
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/stepper/custom-bsStepper.css">
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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
                <div class="container">
                    <div class="row layout-top-spacing" id="cancel-row">

                        <div id="wizard_Default" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Yeni Ürün</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="bs-stepper stepper-form-one">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#defaultStep-one">
                                                <button type="button" class="step-trigger" role="tab" >
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Step One</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-two">
                                                <button type="button" class="step-trigger" role="tab"  >
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Step Two</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-three">
                                                <button type="button" class="step-trigger" role="tab"  >
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Step Three</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="defaultStep-one" class="content" role="tabpanel">
                                                <form id="urunekleform" method="POST" action="aa.php">
                                                    <div class="row">
                                                    <div class="form-group mb-4 col-12 col-md-6">
                                                        <label for="defaultInputState" class="form-label p-1">Ürün Cinsi</label>
                                                        <select id="defaultInputState" name="ad" form="urunekleform" class="form-select">
                                                            <option selected="">Seç</option>
                                                            <option>Açık Kasa</option>
                                                            <option>Kapalı Kasa</option>
                                                            <option>Bina Girişi</option>
                                                            <option>Parça</option>
                                                        </select>
                                                        </div>
                                                        <div class="form-group mb-4 col-md-6">
                                                        <label for="defaultInputState" class="form-label p-1">Ürün Modeli</label>
                                                        <select id="defaultInputState" form="urunekleform" class="form-select">
                                                            <option selected="">Seç</option>
                                                            <option>İnline</option>
                                                            <option>Nomal</option>
                                                            <option>Bina Girişi</option>
                                                            <option>Parça</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-2 col-12">
                                                        <label for="defaultForm-name">Marka</label>
                                                        <input type="input" form="urunekleform" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    </div>
                                                </form>
                                                
                                                <div class="button-action mt-2">
                                                    <button class="btn btn-secondary btn-prev me-3" disabled>Önceki</button>
                                                    <button class="btn btn-secondary btn-nxt">Sonraki</button>
                                                </div>
                                            </div>
                                            <div id="defaultStep-two" class="content" role="tabpanel">
                                <div class="row">
                                            <div class="form-group mb-4 col-12 col md-6 col-lg-6">
                                                        <label for="defaultForm-name" class="p-1">Fiyat</label>
                                                        <input type="input" form="urunekleform" name="soyad" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-12 col md-6 col-lg-6">
                                                        <label for="defaultForm-name" class="p-1">Garanti Süresi</label>
                                                        <input type="input" form="urunekleform" class="form-control" id="defaultForm-name">
                                                    </div>
                                                    </div>


                                                <div class="button-action mt-2">
                                                    <button class="btn btn-secondary btn-prev me-3">Prev</button>
                                                    <button class="btn btn-secondary btn-nxt">Next</button>
                                                </div>
                                            </div>
                                            <div id="defaultStep-three" class="content" role="tabpanel" >

                                            <div class="form-group mb-4">                                  
                                                        <label for="defaultForm-name" class="p-1">Özel notlar</label>
                                                        <input type="input" form="urunekleform" name="vd" class="form-control" id="defaultForm-name">
                                                    </div>
  

                                </form>

                                                <div class="button-action mt-3">
                                                    <button class="btn btn-secondary btn-prev me-3">Prev</button>
                                                    <input type="submit" form="urunekleform" class="btn btn-success me-3">
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
            <?php include 'partials/footer.php' ?>

            
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