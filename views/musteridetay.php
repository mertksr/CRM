
<?php include '../netting/connect.php'?>
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

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/light/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/light/stepper/custom-bsStepper.css">

    <link rel="stylesheet" type="text/css" href="../public/src/assets/css/dark/scrollspyNav.css" />
    <link rel="stylesheet" type="text/css" href="../public/src/plugins/css/dark/stepper/custom-bsStepper.css">
    <!--  END CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../public/src/fontawesome/all.css">

    <script src="../public/src/fontawesome/all.js"></script>
    <style>
        .boxx {
            display: none;
        }

        label {
            margin-bottom: 0 !important;
        }
        .btn-nxt , .btn-prev{
      background-color: #394867 !important;
      border:none !important;
      box-shadow:none !important;
    }
    .btn-nxt:hover , .btn-prev:hover{
      background-color: #6B728E !important;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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


        <div class="search-overlay">


        </div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'partials/navbar.php' ?>

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container" style="margin: 0 auto;">
                    <?php $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
                    $musterisor->execute(array($_GET['no']));
                    $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);

                    $il = $mustericek['mIl'];
                    $ilce = $mustericek['mIlce'];
                    $mahalle = $mustericek['mBolge'];

                    $ilsor = $db->prepare("SELECT * from city where CityID =  $il");
                    $ilsor->execute();
                    $ilcek = $ilsor->fetch(PDO::FETCH_ASSOC);
                    
                    $ilcesor = $db->prepare("SELECT * from town where TownID = $ilce ");
                    $ilcesor->execute();
                    $ilcecek = $ilcesor->fetch(PDO::FETCH_ASSOC);
                    
                    $mahsor = $db->prepare("SELECT * from neighborhood where NeighborhoodID = $mahalle ");
                    $mahsor->execute();
                    $mahcek = $mahsor->fetch(PDO::FETCH_ASSOC);
                    
                    
                    ?>
                    <div class="row layout-top-spacing" id="cancel-row">
                        <div id="wizard_Default" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Müşteri Düzenle</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="bs-stepper stepper-form-one">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#defaultStep-one">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Müşteri Bilgisi</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-two">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Adres Bilgisi</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#defaultStep-three">
                                                <button type="button" class="step-trigger" role="tab">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">İletişim Bilgisi</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <div id="defaultStep-one" class="content" role="tabpanel">
                                                <form id="musteriekleform" method="post" action="../netting/musteriislem.php" class="needs-validation">
                                                    <div class="row g-2">
                                                        <div class="form-group mb-1 col-6">
                                                            <label>Kayıt Türü</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" disabled  type="radio" value="Gerçek Kişi" name="kayitturu" id="flexRadioDefault1" <?php  if($mustericek['mKayitTuru'] == "Gerçek Kişi") { echo "checked"; }  ?>>
                                                                <label for="flexRadioDefault1">
                                                                    Gerçek Kişi
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-danger">
                                                                <input class="form-check-input" disabled  only type="radio" value="Tüzel Kişi" name="kayitturu" id="flexRadioDefault2"<?php  if($mustericek['mKayitTuru'] == "Tüzel Kişi") { echo "checked"; }  ?>>
                                                                <label for="flexRadioDefault2">
                                                                    Tüzel Kişi
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-6 col-md-6 col-lg-6">
                                                            <label for="defaultForm-name">Ad Soyad</label>
                                                            <input form="musteriekleform" name="adsoyad" type="text" value="<?= $mustericek['mAdSoyad']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                                                            <label for="defaultForm-name">TC No</label>
                                                            <input form="musteriekleform" name="tcno" type="text" value="<?= $mustericek['mTcNo']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                                                            <label for="defaultForm-name">Referans No</label>
                                                            <input form="musteriekleform" name="refno" type="text" value="<?= $mustericek['mRefNo']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mt-0 col-6 col-md-6 col-lg-6">
                                                            <label for="defaultForm-name" class="p-1">Doğum Günü</label>
                                                            <input form="musteriekleform" name="dogumgunu" type="date" value="<?= $mustericek['mDogumGunu']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                                                            <label for="defaultForm-name">Çalıştığı Firma</label>
                                                            <input form="musteriekleform" name="calistigifirma" type="text" value="<?= $mustericek['mCalistigiFirma']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>



                                                        <div class="form-group  mt-0 mb-0 col-6 col-lg-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Vergi
                                                                No</label>
                                                            <input form="musteriekleform" name="vergino" value="<?= $mustericek['mVergiNo']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mt-0 mb-0 col-6 col-lg-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Vergi
                                                                Dairesi</label>
                                                            <input form="musteriekleform" name="vergidairesi" type="text" value="<?= $mustericek['mVergiDairesi']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Marka Adı</label>
                                                            <input form="musteriekleform" name="markaadi" type="text" value="<?= $mustericek['mMarkaAdi']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Şube Adı</label>
                                                            <input form="musteriekleform" name="subeadi" type="text" value="<?= $mustericek['mSubeAdi']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>

                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Firma Ticari
                                                                Unvanı</label>
                                                            <input form="musteriekleform" name="firmaticariunvani" value="<?= $mustericek['mFirmaUnvani']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Unvan Devamı</label>
                                                            <input form="musteriekleform" name="unvandevami" value="<?= $mustericek['mUnvanDevami']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Ticaret Sicil
                                                                No</label>
                                                            <input form="musteriekleform" name="ticaretsicilno" value="<?= $mustericek['mTicaretSicilNo']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Oda Sicil
                                                                No</label>
                                                            <input form="musteriekleform" name="odasicilno" type="text" value="<?= $mustericek['mOdaSicilNo']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Mersis No</label>
                                                            <input form="musteriekleform" name="mersisno" type="text" value="<?= $mustericek['mMersisNo']; ?>" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Müşteri
                                                                Unvanı</label>
                                                            <input form="musteriekleform" name="musteriunvani" value="<?= $mustericek['mMusteriNo']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                        <div class="form-group mb-1 col-6 boxx">
                                                            <label for="defaultForm-name" class="p-1">Müşteri
                                                                Kısaltması</label>
                                                            <input form="musteriekleform" name="musterikisaltmasi" value="<?= $mustericek['mKisaltmasi']; ?>" type="text" class="form-control" id="defaultForm-name">
                                                        </div>
                                                    </div>



                                                </form>
                                                <div class="button-action mt-1">
                                                    <button class="btn btn-secondary btn-prev me-3" disabled>Önceki</button>
                                                    <button class="btn btn-secondary btn-nxt">Sonraki</button>
                                                </div>
                                            </div>

                                            <div id="defaultStep-two" class="content" role="tabpanel">
                                                <form>
                                                    <div class="row g-3">

                                                        <div class="col-6">
                                                            <label for="defaultInputAddress" class="form-label">İl</label>
                                                            <select form="musteriekleform" class="field__input form-control" id="il_select" name="il">
                                                                <option value="">Seçiniz...</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="defaultInputAddress" class="form-label">İlçe</label>
                                                            <select class="field__input form-control" form="musteriekleform" id="ilce_select" name="ilce">
                                                                <option value="">seçiniz...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="defaultInputAddress" class="form-label">Mahalle</label>
                                                            <select class="field__input form-control" form="musteriekleform" id="mahalle_select" name="ilce">
                                                                <option value=""> Seçiniz...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <label for="defaultInputAddress" class="form-label">Adres</label>
                                                            <input form="musteriekleform" value="<?= $mustericek['mAdres']; ?>" name="adres" type="text" class="form-control" id="defaultInputAddress">
                                                        </div>



                                                        <div class="input-group">
                                                            <input type="text"  value="<?= $mustericek['mKonum']; ?>" form="musteriekleform" class="form-control" name="konum" id="locationInput" placeholder="Konum" readonly>
                                                            <button class="btn btn-outline-primary" type="button" onclick="getLocation()">Konum
                                                                Bul</button>
                                                            <button class="btn btn-outline-success" type="button" onclick="goLocation()" id="goLocationBtn">Haritada
                                                                Aç</button>
                                                        </div>

                                                    </div>

                                                </form>

                                                <div class="button-action mt-1">
                                                    <button class="btn btn-secondary btn-prev me-3">Önceki</button>
                                                    <button class="btn btn-secondary btn-nxt">Sonraki</button>
                                                </div>
                                            </div>
                                            <div id="defaultStep-three" class="content" role="tabpanel">


                                                <div class="info-row">
                                                    <div class="row g-3">

                                                        <div class="col-12">
                                                            <label for="defaultInputCity" class="form-label">Notlar</label>
                                                            <input form="musteriekleform" value="<?= $mustericek['mNot']; ?>" type="text" class="form-control" id="defaultInputCity" name="not">
                                                        </div>
                                                        <div class="col-6 info-row-item">
                                                            <label for="defaultInputCity" class="form-label">İletişim
                                                                Bilgisi</label>
                                                            <input form="musteriekleform" required type="text" class="form-control" id="defaultInputCity" name="ibilgi[]">
                                                        </div>
                                                        <div class="col-4 info-row-item">
                                                            <label for="defaultInputState" class="form-label ">İletişim
                                                                Türü</label>
                                                            <select form="musteriekleform" required id="defaultInputState" name="ituru[]" class="form-select">
                                                                <option value="">Seç</option>
                                                                <option value="Mobil">Mobil1</option>
                                                                <option value="Tel">Tel</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2 info-row-item p-0">
                                                            <label for="defaultInputState" class="form-label ">Ekle</label>
                                                            <button id="add-contact" type="button" class="btn btn-primary add_button " style="width:100%;height:65%;"><i class="fa-solid fa-circle-plus fa-lg"></i></button>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="button-action mt-2">
                                                    <button class="btn btn-secondary btn-prev me-3">Önceki</button>
                                                    <button type="submit" name="musteriekle" form="musteriekleform" class="btn btn-success me-3">Gönderr</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="il_select_edit" value="<?= $mustericek['mIl']; ?>">
                    <input type="hidden" id="ilce_select_edit" value="<?= $mustericek['mIlce']; ?>">
                    <input type="hidden" id="mah_select_edit" value="<?= $mustericek['mBolge']; ?>">
                </div>
            </div>



        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <script>
 const ilsec = document.getElementById("il_select_edit").value;
 const ilcesec = document.getElementById("ilce_select_edit").value;
 const mahsec = document.getElementById("mah_select_edit").value;
 $(document).ready(function() {
    // İl verilerini çek
    $.ajax({
        url: "../netting/il_getir.php",
        type: "POST",
        dataType: "json",
        success:function(data) {
            var select = $('#il_select');
            select.html('<option value="">-- Seçiniz --</option>');
            $.each(data, function(i, item){
                select.append('<option value="' + item.CityID + '">' + item.CityName + '</option>');
            });
            select.val(ilsec);
            select.trigger('change');
        }
    });
});

// İl seçim kutusundan ilçeleri getir
$(document).on('change', '#il_select', function() {
    var il_id = $(this).val();
    $.ajax({
        url: "../netting/ilce_getir.php",
        type: "POST",
        dataType: "json",
        data: {il_id: il_id},
        success:function(data) {
            var select = $('#ilce_select');
            select.html('<option value="">-- Seçiniz --</option>');
            $.each(data, function(i, item){
                select.append('<option value="' + item.TownID + '">' + item.TownName + '</option>');
            });
            select.val(ilcesec);
            select.trigger('change');
        }
    });
});
// Mahalle seçim kutusundan mahalleleri getir
$(document).on('change', '#ilce_select', function() {
    var ilce_id = $(this).val();
    $.ajax({
        url: "../netting/mahalle_getir.php",
        type: "POST",
        dataType: "json",
        data: {ilce_id: ilce_id},
        success:function(data) {
            var select = $('#mahalle_select');
            select.html('<option value="">-- Seçiniz --</option>');
            $.each(data, function(i, item){
                select.append('<option value="' + item.NeighborhoodID + '">' + item.NeighborhoodName + '</option>');
            });
            select.val(mahsec);
        }
    });
});

        var locationInput = document.getElementById("locationInput");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                locationInput.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            locationInput.value = position.coords.latitude + "," + position.coords.longitude;
        }

        const goLocationBtn = document.getElementById("goLocationBtn");

        function goLocation() {
            if (locationInput.value == "") {
                alert("Önce Konumunuzu Bulmalısınız")
            } else {
                window.open('https://maps.google.com/?q=' + locationInput.value, '_blank');
                // goLocationBtn.target= '_blank';
                // window.location.href = "https://maps.google.com/?q=" + locationInput.value;
            }

        }



        $(document).ready(function() {
            var maxField = 15; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.info-row'); //Input field wrapper
            var fieldHTML = `   
                                <div class="row  g-3">      
                                <div class="col-6 info-row-item">
                              <label for="defaultInputCity" class="form-label">İletişim
                                Bilgisi</label>
                              <input form="musteriekleform" required type="text" class="form-control" id="defaultInputCity" name="ibilgi[]">
                            </div>
                            <div class="col-4 info-row-item">
                              <label for="defaultInputState" class="form-label ">İletişim
                                Türü</label>
                              <select form="musteriekleform" required id="defaultInputState" name="ituru[]" class="form-select">
                                <option value="">Seç</option>
                                <option value="Mobil">Mobil1</option>
                                <option value="Tel">Tel</option>
                                <option value="WhatsApp">WhatsApp</option>
                              </select>
                            </div>
                                    <div class="col-2 info-row-item p-0">
                                    <label for="defaultInputState" class="form-label ">Sil</label>
                                    <button id="add-contact" type="button"
                                        class="btn btn-danger remove_button add_button" style="width:100%;height:65%;"><i
                                    class="fa-solid fa-circle-minus fa-lg"></i></button>
                                    </div>
                                </div> `;
            var x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent().parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });



        const box = document.getElementsByClassName("boxx");

        $(document).ready(function () {

            if (document.getElementById('flexRadioDefault2').checked) {
                for (let i = 0; i < box.length; i++) {
                    box[i].style.display = 'block';
                }
            } else {
                for (let i = 0; i < box.length; i++) {
                    box[i].style.display = 'none';
                }
            }
        });

        const radioButtons = document.querySelectorAll('input[name="kayitturu"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('click', handleRadioClick);
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