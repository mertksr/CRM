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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- Mültiselect -->
    <link href="../public/src/plugins/src/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/src/stepper/bsStepper.min.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/light/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/stepper/custom-bsStepper.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/dark/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/stepper/custom-bsStepper.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style> 
    .multi-select-container {
  display: inline-block;
  position: relative;
}
@media only screen and (max-width: 600px) {
.ms-container {
    width:320px;
}}
@media screen and (max-width: 900px) and (min-width: 600px){
.ms-container {
    width:320px;
}}
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

.multi-select-container--open .multi-select-menu { display: block; }

.multi-select-container--open .multi-select-button:after {
  border-width: 0 0.4em 0.4em 0.4em;
  border-color: transparent transparent #999 transparent;
} </style>
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
                                            <label for="defaultInputState" class="form-label ">Kullanılan Ürünler</label>
                                                <select multiple="multiple" id="select" class="form-select" name="select[]">
                                            <option value='50'>1.Filtre</option>
                                            <option value='50'>2.Filtre</option>
                                            <option value='20'>3.Filtre</option>
                                            <option value='70'>4.Filtre</option>
                                            <option value='50'>5.Filtre</option>
                                            <option value='100'>6.Filtre</option>
                                            <option value='70'>7.Filtre</option>
                                        </select>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <label for="inputAddress" class="form-label">İşlem Ücreti</label>
                                            <input type="text" class="form-control" id="cost" name="cost">
                                        </div>
                                        <div class="col-6">
                                        <div class="d-flex justify-content-center mt-100">
    <div class="col-md-6"> <select id="choices-multiple-remove-button" placeholder="Select upto 5 tags" multiple>
            <option value="HTML">HTML</option>
            <option value="Jquery">Jquery</option>
            <option value="CSS">CSS</option>
            <option value="Bootstrap 3">Bootstrap 3</option>
            <option value="Bootstrap 4">Bootstrap 4</option>
            <option value="Java">Java</option>
            <option value="Javascript">Javascript</option>
            <option value="Angular">Angular</option>
            <option value="Python">Python</option>
            <option value="Hybris">Hybris</option>
            <option value="SQL">SQL</option>
            <option value="NOSQL">NOSQL</option>
            <option value="NodeJS">NodeJS</option>
        </select> </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
    <script>

$(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5
     }); 
    
    
});



    </script>
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