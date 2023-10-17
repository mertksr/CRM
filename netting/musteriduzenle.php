<?php include '../netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pınar Su Arıtma</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
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
    .modal-content {
            background: whitesmoke;
        }

        .contact-modal {
            background-color: #EEEEEE !important;
            color: #14274E !important;
            cursor: default !important;
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

    .islemkaydet {
      background-color: #394867 !important;
      border: none !important;
      box-shadow: none !important;
      color: #fff;
    }

    .islemkaydet {
      background-color: #6B728E !important;

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

    .info-input {
      background-color: #EEEEEE !important;
      color: #14274E !important;
      cursor: default !important;
    }
  </style>
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

    <?php include 'partials/navbar.php';

    $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
    $musterisor->execute(array($_GET['no']));
    $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
    ?>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
      <div class="container">
        <div class="container" style="margin: 0 auto;">
          <div class="row layout-top-spacing" id="cancel-row">
            <div id="flLoginForm" class="col-lg-12  layout-spacing">
              <a href="musteriler.php" class="btn btn-warning mb-1">GERİ DÖN</a>
              <div class="statbox widget box box-shadow">

                <button style="float:right;"  data-bs-toggle="modal" data-bs-target="#sil" class="btn btn-danger p-2 m-2">Müşteriyi Sil</button>
                    
                    <div class="modal fade" id="sil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h5 class="modal-title" id="exampleModalLabel">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                              
                          </div>
                          <div class="modal-body">
                          <h4 style="color:#26577C;text-align:center;font-size:xx-large;"><?= $mustericek['mAdSoyad']; ?></h4>

                          <h4 style="color:crimson;text-align:center;">MÜŞTERİYİ SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>  
                          </div>
                          <div class="modal-footer">
                            <a class="btn btn-danger" href="../netting/musteriislem.php?musterino=<?= $mustericek['mMusteriNo']; ?>&musterisil=ok">SİLMEYİ ONAYLA</a>
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    <div class="widget-header">
                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                          <h4>Müşteri Düzenle</h4>
                        </div>
                      </div>
                    </div>

                    <div class="widget-content widget-content-area">
                      <form class="row g-2" method="POST" id="musteriduzenleform" action="../netting/musteriduzenlesyf.php">

                        <div class="col-12 col-lg-6 col-md-6">
                          <label for="inputAddress" class="form-label">Müşteri Adı Soyadı</label>
                          <input type="text" name="adsoyad" value="<?= $mustericek['mAdSoyad'] ?>" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                          <label for="inputAddress" class="form-label">Tel1</label>
                          <input type="text" name="tel1" value="<?= $mustericek['mTel1'] ?>" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                          <label for="inputAddress" class="form-label">Tel2</label>
                          <input type="text" name="tel2" value="<?= $mustericek['mTel2'] ?>" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-12 col-lg-12 col-md-12">
                          <label for="inputAddress" class="form-label">Adres</label>
                          <input type="text" name="adres" value="<?= $mustericek['mAdres'] ?>" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-12 mb-3 col-lg-6 col-md-6">
                          <label for="defaultInputState" class="form-label">Bölge</label>
                          <select id="bolge" name="bolge" class="form-select">
                            <option>Seçim yapın</option>
                            <?php

                            $bolgesor = $db->prepare("SELECT * FROM neighborhood WHERE DistrictID = 335 ORDER BY NeighborhoodName ASC");
                            $bolgesor->execute();
                            while ($bolgecek = $bolgesor->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                              <option value="<?= $bolgecek['NeighborhoodName']; ?>" <?php if ($mustericek['mBolge'] == $bolgecek['NeighborhoodName']) {
                                                                                      echo "selected";
                                                                                    } ?>>
                                <?= $bolgecek['NeighborhoodName']; ?>
                              </option>
                            <?php  } ?>

                          </select>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                          <label for="inputAddress" class="form-label">Konum</label>

                          <div class="input-group col-12 col-lg-6 col-md-6">
                            <input type="text" value="<?= $mustericek['mKonum']; ?>" class="form-control" name="konum" id="konum" readonly placeholder="Konum Bul">
                            <button class="btn btn-outline-primary" type="button" onclick="getLocation()">Konum
                              Bul</button>
                            <button class="btn btn-outline-success" type="button" onclick="goLocation()" id="goLocationBtn">Haritada
                              Aç</button>
                          </div>
                        </div>
                        <div class=" col-12">
                          <label for=" defaultInputState" class="form-label ">Cihaz</label>
                          <select id="defaultInputState" name="cihaz" class="form-select select">
                            <option value="">Seçim yapın</option>

                            <?php
                            $cihazsor = $db->prepare("SELECT * FROM urunler WHERE urunCinsi = 1 || urunCinsi = 3 ORDER BY urunSiralama ASC");
                            $cihazsor->execute();
                            while ($cihazcek = $cihazsor->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                              <option <?php if ($cihazcek['urunAd'] == $mustericek['mCihaz']) {
                                        echo 'selected';
                                      } ?> value="<?= $cihazcek['urunAd']; ?>"><?= $cihazcek['urunAd']; ?></option>
                            <?php  } ?>

                          </select>
                        </div>
                        <div class=" col-3">
                          <label for=" defaultInputState" class="form-label ">Bakım Periyodu</label>
                          <select id="defaultInputState" name="periyot" class="form-select select">
                            <option value="6" <?php if ($mustericek['mPeriyot'] == "6") {
                                                echo 'selected';
                                              } ?>>6</option>
                            <option value="12" <?php if ($mustericek['mPeriyot'] == "12") {
                                                  echo 'selected';
                                                } ?>>12</option>
                            <option value="3" <?php if ($mustericek['mPeriyot'] == "3") {
                                                echo 'selected';
                                              } ?>>3</option>
                            <option value="1" <?php if ($mustericek['mPeriyot'] == "1") {
                                                echo 'selected';
                                              } ?>>1</option>
                            <option value="2" <?php if ($mustericek['mPeriyot'] == "2") {
                                                echo 'selected';
                                              } ?>>2</option>
                            <option value="4" <?php if ($mustericek['mPeriyot'] == "4") {
                                                echo 'selected';
                                              } ?>>4</option>
                            <option value="5" <?php if ($mustericek['mPeriyot'] == "5") {
                                                echo 'selected';
                                              } ?>>5</option>
                            <option value="7" <?php if ($mustericek['mPeriyot'] == "7") {
                                                echo 'selected';
                                              } ?>>7</option>
                            <option value="8" <?php if ($mustericek['mPeriyot'] == "8") {
                                                echo 'selected';
                                              } ?>>8</option>
                            <option value="9" <?php if ($mustericek['mPeriyot'] == "9") {
                                                echo 'selected';
                                              } ?>>9</option>
                            <option value="10" <?php if ($mustericek['mPeriyot'] == "10") {
                                                  echo 'selected';
                                                } ?>>10</option>
                            <option value="11" <?php if ($mustericek['mPeriyot'] == "11") {
                                                  echo 'selected';
                                                } ?>>11</option>
                          </select>
                        </div>
                        <div class="form-group col-3">
                          <label for="exampleFormControlInput1" class="mb-1">Sonraki Bakım Tarihi</label>
                          <input type="date" class="form-control" value="<?= $mustericek['mSonrakiBakim'] ?>" name="sonrakibakim" id="notlar">
                        </div>

                        <div class="form-group col-6">
                          <label for="exampleFormControlInput1" class="mb-1">Notlar</label>
                          <input type="text" class="form-control" value="<?= $mustericek['mNot'] ?>" name="notlar" id="notlar">
                        </div>
<input type="hidden" value="<?=$mustericek['mPeriyot']; ?>"name="eskiperiyot">

<input type="hidden" value="<?=$mustericek['mSonIslem']; ?>"name="eskibakim">

                        <input type="hidden" value="<?= $mustericek['mMusteriNo']; ?>" name="musterino">


                        <div class="col-12">
                          <button style="float:right;" type="submit" name="musteriduzenle" class="btn btn-success">Kaydet</button>
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
  <script>
    var locationInput = document.getElementById("konum");

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
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../public/src/plugins/src/multiselect/jquery.multi-select.js"></script>
  <script>

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