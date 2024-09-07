<?php
include '../netting/connect.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<?php
if (empty($_SESSION['kullanici'])) {
    header("Location:../../../index.php?erisim=izinsiz");
}
?>

<head>
    <?php include 'partials/header.php' ?>
    <link href="../public/layouts/horizontal-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../public/layouts/horizontal-light-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../public/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/layouts/horizontal-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />

    <style>
        .row>* {
            padding: 0 3px;
        }
        #maasform,
        #avansform {
            margin: 20px 0;
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #F7F7F8;
            display: flex;
            justify-content: center;

        }

        @media screen and (max-width: 768px) {

            #maasform,
            #avansform {
                flex-direction: column;

            }

            .form-group>input,
            select,
            button {
                margin: 3px 0;
            }
            .dateInput{
            width: auto;
        }

        }

        .tables {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        table{
            margin: 0 10px;
            border: 2px solid #ccc;
        }
        @media screen and (min-width: 768px) {
        .dateInput{
            width: 150px;
        }
    }
    </style>
</head>

<body class="layout-boxed enable-secondaryNav">
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
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>


        <?php include 'partials/navbar.php' ?>


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <form method="POST">
                                <div class="form-group" id="avansform">
                                    <input type="text" class="form-control" placeholder="Avans">
                                    <select name="" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <input type="date" class="form-control dateInput" value="<?= date("Y-m-d"); ?>">

                                    <button class="btn btn-primary">Kaydet</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <form method="POST">
                                <div class="form-group" id="avansform">
                                    <input type="text" class="form-control" placeholder="Prim">
                                    <select name="" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <input type="date" class="form-control dateInput" value="<?= date("Y-m-d"); ?>">

                                    <button class="btn btn-primary">Kaydet</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <form method="POST">
                                <div class="form-group" id="maasform">
                                    <input type="text" class="form-control" placeholder="Maaş Girin">
                                    <select name="" class="form-select">
                                        <option value="">Seç</option>
                                        <option value="Tuğba">Tuğba</option>
                                        <option value="Kadir">Kadir</option>
                                        <option value="Orkun">Orkun</option>
                                    </select>
                                    <button class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tables">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
  
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Avans</th>
                                    <th scope="col">Prim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <!--  BEGIN FOOTER  -->
            <?php include 'partials/footer.php' ?>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- <script src="../public/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../public/src/plugins/src/waves/waves.min.js"></script>
    <script src="../public/layouts/horizontal-light-menu/app.js"></script> -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script src="../public/src/plugins/src/apex/apexcharts.min.js"></script> -->
    <!-- <script src="../public/src/assets/js/dashboard/dash_1.js"></script> -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

</html>