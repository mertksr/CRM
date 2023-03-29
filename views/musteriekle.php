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

          <div class="row layout-top-spacing" id="cancel-row">
            <div id="wizard_Default" class="col-lg-12 layout-spacing">
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
                                <input class="form-check-input" type="radio" value="Gerçek Kişi" name="kayitturu" id="flexRadioDefault1" checked>
                                <label for="flexRadioDefault1">
                                  Gerçek Kişi
                                </label>
                              </div>

                              <div class="form-check form-check-danger">
                                <input class="form-check-input" type="radio" value="Tüzel Kişi" name="kayitturu" id="flexRadioDefault2">
                                <label for="flexRadioDefault2">
                                  Tüzel Kişi
                                </label>
                              </div>
                            </div>
                            <div class="form-group col-6 col-md-6 col-lg-6">
                              <label for="defaultForm-name">Ad Soyad</label>
                              <input form="musteriekleform" name="adsoyad" type="text"  class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                              <label for="defaultForm-name">TC No</label>
                              <input form="musteriekleform" name="tcno" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                              <label for="defaultForm-name">Referans No</label>
                              <input form="musteriekleform" name="refno" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mt-0 col-6 col-md-6 col-lg-6">
                              <label for="defaultForm-name" class="p-1">Doğum Günü</label>
                              <input form="musteriekleform" name="dogumgunu" type="date" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 col-md-6 col-lg-6">
                              <label for="defaultForm-name">Çalıştığı Firma</label>
                              <input form="musteriekleform" name="calistigifirma" type="text" class="form-control" id="defaultForm-name">
                            </div>
    


                            <div class="form-group  mt-0 mb-0 col-6 col-lg-6 boxx">
                              <label for="defaultForm-name" class="p-1">Vergi
                                No</label>
                              <input form="musteriekleform" name="vergino" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mt-0 mb-0 col-6 col-lg-6 boxx">
                              <label for="defaultForm-name" class="p-1">Vergi
                                Dairesi</label>
                              <input form="musteriekleform" name="vergidairesi" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Marka Adı</label>
                              <input form="musteriekleform" name="markaadi" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Şube Adı</label>
                              <input form="musteriekleform" name="subeadi" type="text" class="form-control" id="defaultForm-name">
                            </div>

                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Firma Ticari
                                Unvanı</label>
                              <input form="musteriekleform" name="firmaticariunvani" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Unvan Devamı</label>
                              <input form="musteriekleform" name="unvandevami" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Ticaret Sicil
                                No</label>
                              <input form="musteriekleform" name="ticaretsicilno" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Oda Sicil
                                No</label>
                              <input form="musteriekleform" name="odasicilno" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Mersis No</label>
                              <input form="musteriekleform" name="mersisno" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Müşteri
                                Unvanı</label>
                              <input form="musteriekleform" name="musteriunvani" type="text" class="form-control" id="defaultForm-name">
                            </div>
                            <div class="form-group mb-1 col-6 boxx">
                              <label for="defaultForm-name" class="p-1">Müşteri
                                Kısaltması</label>
                              <input form="musteriekleform" name="musterikisaltmasi" type="text" class="form-control" id="defaultForm-name">
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
                              <select form="musteriekleform" class="field__input form-control"  id="Iller" name="il">
                                <optio value="">İl seçiniz...</optio>
                              </select>
                            </div>

                            <div class="col-6">
                              <label for="defaultInputAddress" class="form-label">İlçe</label>
                              <select class="field__input form-control" form="musteriekleform"  id="Ilceler" name="ilce" >
                                <option value="">İlçe seçiniz...</option>
                              </select>
                            </div>

                            <div class="col-12 col-sm-6">
                              <label for=" defaultInputAddress" class="form-label">
                                Bölge</label>
                              <input form="musteriekleform" name="bolge" type="text" class="form-control" id="defaultInputAddress">
                            </div>
                            <div class="col-12 col-sm-6">
                              <label for="defaultInputAddress" class="form-label">Adres</label>
                              <input form="musteriekleform" name="adres" type="text" class="form-control" id="defaultInputAddress">
                            </div>



                            <div class="input-group">
                              <input type="text" form="musteriekleform" class="form-control" name="konum" id="locationInput" placeholder="Konum" readonly>
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
                              <input form="musteriekleform"  type="text" class="form-control" id="defaultInputCity" name="not">
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

        </div>
      </div>

      <div class="footer-wrapper">
        <div class="footer-section f-section-1">
          <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
          <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
              </path>
            </svg></p>
        </div>
      </div>

    </div>
    <!--  END CONTENT AREA  -->
  </div>
  <!-- END MAIN CONTAINER -->
  <script>
    function setSelectBoxes(selectedData) {
      $("select[name=il]").val(selectedData.plaka).trigger("change");
      $("select[name=ilce]").val(selectedData.ilce).trigger("change");
    }
    var data = [{
        "il": "Adana",
        "plaka": 1,
        "ilceleri": [
          "Aladağ",
          "Ceyhan",
          "Çukurova",
          "Feke",
          "İmamoğlu",
          "Karaisalı",
          "Karataş",
          "Kozan",
          "Pozantı",
          "Saimbeyli",
          "Sarıçam",
          "Seyhan",
          "Tufanbeyli",
          "Yumurtalık",
          "Yüreğir"
        ]
      },
      {
        "il": "Adıyaman",
        "plaka": 2,
        "ilceleri": [
          "Besni",
          "Çelikhan",
          "Gerger",
          "Gölbaşı",
          "Kahta",
          "Merkez",
          "Samsat",
          "Sincik",
          "Tut"
        ]
      },
      {
        "il": "Afyonkarahisar",
        "plaka": 3,
        "ilceleri": [
          "Başmakçı",
          "Bayat",
          "Bolvadin",
          "Çay",
          "Çobanlar",
          "Dazkırı",
          "Dinar",
          "Emirdağ",
          "Evciler",
          "Hocalar",
          "İhsaniye",
          "İscehisar",
          "Kızılören",
          "Merkez",
          "Sandıklı",
          "Sinanpaşa",
          "Sultandağı",
          "Şuhut"
        ]
      },
      {
        "il": "Ağrı",
        "plaka": 4,
        "ilceleri": [
          "Diyadin",
          "Doğubayazıt",
          "Eleşkirt",
          "Hamur",
          "Merkez",
          "Patnos",
          "Taşlıçay",
          "Tutak"
        ]
      },
      {
        "il": "Amasya",
        "plaka": 5,
        "ilceleri": [
          "Göynücek",
          "Gümüşhacıköy",
          "Hamamözü",
          "Merkez",
          "Merzifon",
          "Suluova",
          "Taşova"
        ]
      },
      {
        "il": "Ankara",
        "plaka": 6,
        "ilceleri": [
          "Altındağ",
          "Ayaş",
          "Bala",
          "Beypazarı",
          "Çamlıdere",
          "Çankaya",
          "Çubuk",
          "Elmadağ",
          "Güdül",
          "Haymana",
          "Kalecik",
          "Kızılcahamam",
          "Nallıhan",
          "Polatlı",
          "Şereflikoçhisar",
          "Yenimahalle",
          "Gölbaşı",
          "Keçiören",
          "Mamak",
          "Sincan",
          "Kazan",
          "Akyurt",
          "Etimesgut",
          "Evren",
          "Pursaklar"
        ]
      },
      {
        "il": "Antalya",
        "plaka": 7,
        "ilceleri": [
          "Akseki",
          "Alanya",
          "Elmalı",
          "Finike",
          "Gazipaşa",
          "Gündoğmuş",
          "Kaş",
          "Korkuteli",
          "Kumluca",
          "Manavgat",
          "Serik",
          "Demre",
          "İbradı",
          "Kemer",
          "Aksu",
          "Döşemealtı",
          "Kepez",
          "Konyaaltı",
          "Muratpaşa"
        ]
      },
      {
        "il": "Artvin",
        "plaka": 8,
        "ilceleri": [
          "Ardanuç",
          "Arhavi",
          "Merkez",
          "Borçka",
          "Hopa",
          "Şavşat",
          "Yusufeli",
          "Murgul"
        ]
      },
      {
        "il": "Aydın",
        "plaka": 9,
        "ilceleri": [
          "Merkez",
          "Bozdoğan",
          "Efeler",
          "Çine",
          "Germencik",
          "Karacasu",
          "Koçarlı",
          "Kuşadası",
          "Kuyucak",
          "Nazilli",
          "Söke",
          "Sultanhisar",
          "Yenipazar",
          "Buharkent",
          "İncirliova",
          "Karpuzlu",
          "Köşk",
          "Didim"
        ]
      },
      {
        "il": "Balıkesir",
        "plaka": 10,
        "ilceleri": [
          "Altıeylül",
          "Ayvalık",
          "Merkez",
          "Balya",
          "Bandırma",
          "Bigadiç",
          "Burhaniye",
          "Dursunbey",
          "Edremit",
          "Erdek",
          "Gönen",
          "Havran",
          "İvrindi",
          "Karesi",
          "Kepsut",
          "Manyas",
          "Savaştepe",
          "Sındırgı",
          "Gömeç",
          "Susurluk",
          "Marmara"
        ]
      },
      {
        "il": "Bilecik",
        "plaka": 11,
        "ilceleri": [
          "Merkez",
          "Bozüyük",
          "Gölpazarı",
          "Osmaneli",
          "Pazaryeri",
          "Söğüt",
          "Yenipazar",
          "İnhisar"
        ]
      },
      {
        "il": "Bingöl",
        "plaka": 12,
        "ilceleri": [
          "Merkez",
          "Genç",
          "Karlıova",
          "Kiğı",
          "Solhan",
          "Adaklı",
          "Yayladere",
          "Yedisu"
        ]
      },
      {
        "il": "Bitlis",
        "plaka": 13,
        "ilceleri": [
          "Adilcevaz",
          "Ahlat",
          "Merkez",
          "Hizan",
          "Mutki",
          "Tatvan",
          "Güroymak"
        ]
      },
      {
        "il": "Bolu",
        "plaka": 14,
        "ilceleri": [
          "Merkez",
          "Gerede",
          "Göynük",
          "Kıbrıscık",
          "Mengen",
          "Mudurnu",
          "Seben",
          "Dörtdivan",
          "Yeniçağa"
        ]
      },
      {
        "il": "Burdur",
        "plaka": 15,
        "ilceleri": [
          "Ağlasun",
          "Bucak",
          "Merkez",
          "Gölhisar",
          "Tefenni",
          "Yeşilova",
          "Karamanlı",
          "Kemer",
          "Altınyayla",
          "Çavdır",
          "Çeltikçi"
        ]
      },
      {
        "il": "Bursa",
        "plaka": 16,
        "ilceleri": [
          "Gemlik",
          "İnegöl",
          "İznik",
          "Karacabey",
          "Keles",
          "Mudanya",
          "Mustafakemalpaşa",
          "Orhaneli",
          "Orhangazi",
          "Yenişehir",
          "Büyükorhan",
          "Harmancık",
          "Nilüfer",
          "Osmangazi",
          "Yıldırım",
          "Gürsu",
          "Kestel"
        ]
      },
      {
        "il": "Çanakkale",
        "plaka": 17,
        "ilceleri": [
          "Ayvacık",
          "Bayramiç",
          "Biga",
          "Bozcaada",
          "Çan",
          "Merkez",
          "Eceabat",
          "Ezine",
          "Gelibolu",
          "Gökçeada",
          "Lapseki",
          "Yenice"
        ]
      },
      {
        "il": "Çankırı",
        "plaka": 18,
        "ilceleri": [
          "Merkez",
          "Çerkeş",
          "Eldivan",
          "Ilgaz",
          "Kurşunlu",
          "Orta",
          "Şabanözü",
          "Yapraklı",
          "Atkaracalar",
          "Kızılırmak",
          "Bayramören",
          "Korgun"
        ]
      },
      {
        "il": "Çorum",
        "plaka": 19,
        "ilceleri": [
          "Alaca",
          "Bayat",
          "Merkez",
          "İskilip",
          "Kargı",
          "Mecitözü",
          "Ortaköy",
          "Osmancık",
          "Sungurlu",
          "Boğazkale",
          "Uğurludağ",
          "Dodurga",
          "Laçin",
          "Oğuzlar"
        ]
      },
      {
        "il": "Denizli",
        "plaka": 20,
        "ilceleri": [
          "Acıpayam",
          "Buldan",
          "Çal",
          "Çameli",
          "Çardak",
          "Çivril",
          "Merkez",
          "Merkezefendi",
          "Pamukkale",
          "Güney",
          "Kale",
          "Sarayköy",
          "Tavas",
          "Babadağ",
          "Bekilli",
          "Honaz",
          "Serinhisar",
          "Baklan",
          "Beyağaç",
          "Bozkurt"
        ]
      },
      {
        "il": "Diyarbakır",
        "plaka": 21,
        "ilceleri": [
          "Kocaköy",
          "Çermik",
          "Çınar",
          "Çüngüş",
          "Dicle",
          "Ergani",
          "Hani",
          "Hazro",
          "Kulp",
          "Lice",
          "Silvan",
          "Eğil",
          "Bağlar",
          "Kayapınar",
          "Sur",
          "Yenişehir",
          "Bismil"
        ]
      },
      {
        "il": "Edirne",
        "plaka": 22,
        "ilceleri": [
          "Merkez",
          "Enez",
          "Havsa",
          "İpsala",
          "Keşan",
          "Lalapaşa",
          "Meriç",
          "Uzunköprü",
          "Süloğlu"
        ]
      },
      {
        "il": "Elazığ",
        "plaka": 23,
        "ilceleri": [
          "Ağın",
          "Baskil",
          "Merkez",
          "Karakoçan",
          "Keban",
          "Maden",
          "Palu",
          "Sivrice",
          "Arıcak",
          "Kovancılar",
          "Alacakaya"
        ]
      },
      {
        "il": "Erzincan",
        "plaka": 24,
        "ilceleri": [
          "Çayırlı",
          "Merkez",
          "İliç",
          "Kemah",
          "Kemaliye",
          "Refahiye",
          "Tercan",
          "Üzümlü",
          "Otlukbeli"
        ]
      },
      {
        "il": "Erzurum",
        "plaka": 25,
        "ilceleri": [
          "Aşkale",
          "Çat",
          "Hınıs",
          "Horasan",
          "İspir",
          "Karayazı",
          "Narman",
          "Oltu",
          "Olur",
          "Pasinler",
          "Şenkaya",
          "Tekman",
          "Tortum",
          "Karaçoban",
          "Uzundere",
          "Pazaryolu",
          "Köprüköy",
          "Palandöken",
          "Yakutiye",
          "Aziziye"
        ]
      },
      {
        "il": "Eskişehir",
        "plaka": 26,
        "ilceleri": [
          "Çifteler",
          "Mahmudiye",
          "Mihalıççık",
          "Sarıcakaya",
          "Seyitgazi",
          "Sivrihisar",
          "Alpu",
          "Beylikova",
          "İnönü",
          "Günyüzü",
          "Han",
          "Mihalgazi",
          "Odunpazarı",
          "Tepebaşı"
        ]
      },
      {
        "il": "Gaziantep",
        "plaka": 27,
        "ilceleri": [
          "Araban",
          "İslahiye",
          "Nizip",
          "Oğuzeli",
          "Yavuzeli",
          "Şahinbey",
          "Şehitkamil",
          "Karkamış",
          "Nurdağı"
        ]
      },
      {
        "il": "Giresun",
        "plaka": 28,
        "ilceleri": [
          "Alucra",
          "Bulancak",
          "Dereli",
          "Espiye",
          "Eynesil",
          "Merkez",
          "Görele",
          "Keşap",
          "Şebinkarahisar",
          "Tirebolu",
          "Piraziz",
          "Yağlıdere",
          "Çamoluk",
          "Çanakçı",
          "Doğankent",
          "Güce"
        ]
      },
      {
        "il": "Gümüşhane",
        "plaka": 29,
        "ilceleri": [
          "Merkez",
          "Kelkit",
          "Şiran",
          "Torul",
          "Köse",
          "Kürtün"
        ]
      },
      {
        "il": "Hakkari",
        "plaka": 30,
        "ilceleri": [
          "Çukurca",
          "Merkez",
          "Şemdinli",
          "Yüksekova"
        ]
      },
      {
        "il": "Hatay",
        "plaka": 31,
        "ilceleri": [
          "Altınözü",
          "Arsuz",
          "Defne",
          "Dörtyol",
          "Hassa",
          "Antakya",
          "İskenderun",
          "Kırıkhan",
          "Payas",
          "Reyhanlı",
          "Samandağ",
          "Yayladağı",
          "Erzin",
          "Belen",
          "Kumlu"
        ]
      },
      {
        "il": "Isparta",
        "plaka": 32,
        "ilceleri": [
          "Atabey",
          "Eğirdir",
          "Gelendost",
          "Merkez",
          "Keçiborlu",
          "Senirkent",
          "Sütçüler",
          "Şarkikaraağaç",
          "Uluborlu",
          "Yalvaç",
          "Aksu",
          "Gönen",
          "Yenişarbademli"
        ]
      },
      {
        "il": "Mersin",
        "plaka": 33,
        "ilceleri": [
          "Anamur",
          "Erdemli",
          "Gülnar",
          "Mut",
          "Silifke",
          "Tarsus",
          "Aydıncık",
          "Bozyazı",
          "Çamlıyayla",
          "Akdeniz",
          "Mezitli",
          "Toroslar",
          "Yenişehir"
        ]
      },
      {
        "il": "İstanbul",
        "plaka": 34,
        "ilceleri": [
          "Adalar",
          "Bakırköy",
          "Beşiktaş",
          "Beykoz",
          "Beyoğlu",
          "Çatalca",
          "Eyüp",
          "Fatih",
          "Gaziosmanpaşa",
          "Kadıköy",
          "Kartal",
          "Sarıyer",
          "Silivri",
          "Şile",
          "Şişli",
          "Üsküdar",
          "Zeytinburnu",
          "Büyükçekmece",
          "Kağıthane",
          "Küçükçekmece",
          "Pendik",
          "Ümraniye",
          "Bayrampaşa",
          "Avcılar",
          "Bağcılar",
          "Bahçelievler",
          "Güngören",
          "Maltepe",
          "Sultanbeyli",
          "Tuzla",
          "Esenler",
          "Arnavutköy",
          "Ataşehir",
          "Başakşehir",
          "Beylikdüzü",
          "Çekmeköy",
          "Esenyurt",
          "Sancaktepe",
          "Sultangazi"
        ]
      },
      {
        "il": "İzmir",
        "plaka": 35,
        "ilceleri": [
          "Aliağa",
          "Bayındır",
          "Bergama",
          "Bornova",
          "Çeşme",
          "Dikili",
          "Foça",
          "Karaburun",
          "Karşıyaka",
          "Kemalpaşa",
          "Kınık",
          "Kiraz",
          "Menemen",
          "Ödemiş",
          "Seferihisar",
          "Selçuk",
          "Tire",
          "Torbalı",
          "Urla",
          "Beydağ",
          "Buca",
          "Konak",
          "Menderes",
          "Balçova",
          "Çiğli",
          "Gaziemir",
          "Narlıdere",
          "Güzelbahçe",
          "Bayraklı",
          "Karabağlar"
        ]
      },
      {
        "il": "Kars",
        "plaka": 36,
        "ilceleri": [
          "Arpaçay",
          "Digor",
          "Kağızman",
          "Merkez",
          "Sarıkamış",
          "Selim",
          "Susuz",
          "Akyaka"
        ]
      },
      {
        "il": "Kastamonu",
        "plaka": 37,
        "ilceleri": [
          "Abana",
          "Araç",
          "Azdavay",
          "Bozkurt",
          "Cide",
          "Çatalzeytin",
          "Daday",
          "Devrekani",
          "İnebolu",
          "Merkez",
          "Küre",
          "Taşköprü",
          "Tosya",
          "İhsangazi",
          "Pınarbaşı",
          "Şenpazar",
          "Ağlı",
          "Doğanyurt",
          "Hanönü",
          "Seydiler"
        ]
      },
      {
        "il": "Kayseri",
        "plaka": 38,
        "ilceleri": [
          "Bünyan",
          "Develi",
          "Felahiye",
          "İncesu",
          "Pınarbaşı",
          "Sarıoğlan",
          "Sarız",
          "Tomarza",
          "Yahyalı",
          "Yeşilhisar",
          "Akkışla",
          "Talas",
          "Kocasinan",
          "Melikgazi",
          "Hacılar",
          "Özvatan"
        ]
      },
      {
        "il": "Kırklareli",
        "plaka": 39,
        "ilceleri": [
          "Babaeski",
          "Demirköy",
          "Merkez",
          "Kofçaz",
          "Lüleburgaz",
          "Pehlivanköy",
          "Pınarhisar",
          "Vize"
        ]
      },
      {
        "il": "Kırşehir",
        "plaka": 40,
        "ilceleri": [
          "Çiçekdağı",
          "Kaman",
          "Merkez",
          "Mucur",
          "Akpınar",
          "Akçakent",
          "Boztepe"
        ]
      },
      {
        "il": "Kocaeli",
        "plaka": 41,
        "ilceleri": [
          "Gebze",
          "Gölcük",
          "Kandıra",
          "Karamürsel",
          "Körfez",
          "Derince",
          "Başiskele",
          "Çayırova",
          "Darıca",
          "Dilovası",
          "İzmit",
          "Kartepe"
        ]
      },
      {
        "il": "Konya",
        "plaka": 42,
        "ilceleri": [
          "Akşehir",
          "Beyşehir",
          "Bozkır",
          "Cihanbeyli",
          "Çumra",
          "Doğanhisar",
          "Ereğli",
          "Hadim",
          "Ilgın",
          "Kadınhanı",
          "Karapınar",
          "Kulu",
          "Sarayönü",
          "Seydişehir",
          "Yunak",
          "Akören",
          "Altınekin",
          "Derebucak",
          "Hüyük",
          "Karatay",
          "Meram",
          "Selçuklu",
          "Taşkent",
          "Ahırlı",
          "Çeltik",
          "Derbent",
          "Emirgazi",
          "Güneysınır",
          "Halkapınar",
          "Tuzlukçu",
          "Yalıhüyük"
        ]
      },
      {
        "il": "Kütahya",
        "plaka": 43,
        "ilceleri": [
          "Altıntaş",
          "Domaniç",
          "Emet",
          "Gediz",
          "Merkez",
          "Simav",
          "Tavşanlı",
          "Aslanapa",
          "Dumlupınar",
          "Hisarcık",
          "Şaphane",
          "Çavdarhisar",
          "Pazarlar"
        ]
      },
      {
        "il": "Malatya",
        "plaka": 44,
        "ilceleri": [
          "Akçadağ",
          "Arapgir",
          "Arguvan",
          "Darende",
          "Doğanşehir",
          "Hekimhan",
          "Merkez",
          "Pütürge",
          "Yeşilyurt",
          "Battalgazi",
          "Doğanyol",
          "Kale",
          "Kuluncak",
          "Yazıhan"
        ]
      },
      {
        "il": "Manisa",
        "plaka": 45,
        "ilceleri": [
          "Akhisar",
          "Alaşehir",
          "Demirci",
          "Gördes",
          "Kırkağaç",
          "Kula",
          "Merkez",
          "Salihli",
          "Sarıgöl",
          "Saruhanlı",
          "Selendi",
          "Soma",
          "Şehzadeler",
          "Yunusemre",
          "Turgutlu",
          "Ahmetli",
          "Gölmarmara",
          "Köprübaşı"
        ]
      },
      {
        "il": "Kahramanmaraş",
        "plaka": 46,
        "ilceleri": [
          "Afşin",
          "Andırın",
          "Dulkadiroğlu",
          "Onikişubat",
          "Elbistan",
          "Göksun",
          "Merkez",
          "Pazarcık",
          "Türkoğlu",
          "Çağlayancerit",
          "Ekinözü",
          "Nurhak"
        ]
      },
      {
        "il": "Mardin",
        "plaka": 47,
        "ilceleri": [
          "Derik",
          "Kızıltepe",
          "Artuklu",
          "Merkez",
          "Mazıdağı",
          "Midyat",
          "Nusaybin",
          "Ömerli",
          "Savur",
          "Dargeçit",
          "Yeşilli"
        ]
      },
      {
        "il": "Muğla",
        "plaka": 48,
        "ilceleri": [
          "Bodrum",
          "Datça",
          "Fethiye",
          "Köyceğiz",
          "Marmaris",
          "Menteşe",
          "Milas",
          "Ula",
          "Yatağan",
          "Dalaman",
          "Seydikemer",
          "Ortaca",
          "Kavaklıdere"
        ]
      },
      {
        "il": "Muş",
        "plaka": 49,
        "ilceleri": [
          "Bulanık",
          "Malazgirt",
          "Merkez",
          "Varto",
          "Hasköy",
          "Korkut"
        ]
      },
      {
        "il": "Nevşehir",
        "plaka": 50,
        "ilceleri": [
          "Avanos",
          "Derinkuyu",
          "Gülşehir",
          "Hacıbektaş",
          "Kozaklı",
          "Merkez",
          "Ürgüp",
          "Acıgöl"
        ]
      },
      {
        "il": "Niğde",
        "plaka": 51,
        "ilceleri": [
          "Bor",
          "Çamardı",
          "Merkez",
          "Ulukışla",
          "Altunhisar",
          "Çiftlik"
        ]
      },
      {
        "il": "Ordu",
        "plaka": 52,
        "ilceleri": [
          "Akkuş",
          "Altınordu",
          "Aybastı",
          "Fatsa",
          "Gölköy",
          "Korgan",
          "Kumru",
          "Mesudiye",
          "Perşembe",
          "Ulubey",
          "Ünye",
          "Gülyalı",
          "Gürgentepe",
          "Çamaş",
          "Çatalpınar",
          "Çaybaşı",
          "İkizce",
          "Kabadüz",
          "Kabataş"
        ]
      },
      {
        "il": "Rize",
        "plaka": 53,
        "ilceleri": [
          "Ardeşen",
          "Çamlıhemşin",
          "Çayeli",
          "Fındıklı",
          "İkizdere",
          "Kalkandere",
          "Pazar",
          "Merkez",
          "Güneysu",
          "Derepazarı",
          "Hemşin",
          "İyidere"
        ]
      },
      {
        "il": "Sakarya",
        "plaka": 54,
        "ilceleri": [
          "Akyazı",
          "Geyve",
          "Hendek",
          "Karasu",
          "Kaynarca",
          "Sapanca",
          "Kocaali",
          "Pamukova",
          "Taraklı",
          "Ferizli",
          "Karapürçek",
          "Söğütlü",
          "Adapazarı",
          "Arifiye",
          "Erenler",
          "Serdivan"
        ]
      },
      {
        "il": "Samsun",
        "plaka": 55,
        "ilceleri": [
          "Alaçam",
          "Bafra",
          "Çarşamba",
          "Havza",
          "Kavak",
          "Ladik",
          "Terme",
          "Vezirköprü",
          "Asarcık",
          "Ondokuzmayıs",
          "Salıpazarı",
          "Tekkeköy",
          "Ayvacık",
          "Yakakent",
          "Atakum",
          "Canik",
          "İlkadım"
        ]
      },
      {
        "il": "Siirt",
        "plaka": 56,
        "ilceleri": [
          "Baykan",
          "Eruh",
          "Kurtalan",
          "Pervari",
          "Merkez",
          "Şirvan",
          "Tillo"
        ]
      },
      {
        "il": "Sinop",
        "plaka": 57,
        "ilceleri": [
          "Ayancık",
          "Boyabat",
          "Durağan",
          "Erfelek",
          "Gerze",
          "Merkez",
          "Türkeli",
          "Dikmen",
          "Saraydüzü"
        ]
      },
      {
        "il": "Sivas",
        "plaka": 58,
        "ilceleri": [
          "Divriği",
          "Gemerek",
          "Gürün",
          "Hafik",
          "İmranlı",
          "Kangal",
          "Koyulhisar",
          "Merkez",
          "Suşehri",
          "Şarkışla",
          "Yıldızeli",
          "Zara",
          "Akıncılar",
          "Altınyayla",
          "Doğanşar",
          "Gölova",
          "Ulaş"
        ]
      },
      {
        "il": "Tekirdağ",
        "plaka": 59,
        "ilceleri": [
          "Çerkezköy",
          "Çorlu",
          "Ergene",
          "Hayrabolu",
          "Malkara",
          "Muratlı",
          "Saray",
          "Süleymanpaşa",
          "Kapaklı",
          "Şarköy",
          "Marmaraereğlisi"
        ]
      },
      {
        "il": "Tokat",
        "plaka": 60,
        "ilceleri": [
          "Almus",
          "Artova",
          "Erbaa",
          "Niksar",
          "Reşadiye",
          "Merkez",
          "Turhal",
          "Zile",
          "Pazar",
          "Yeşilyurt",
          "Başçiftlik",
          "Sulusaray"
        ]
      },
      {
        "il": "Trabzon",
        "plaka": 61,
        "ilceleri": [
          "Akçaabat",
          "Araklı",
          "Arsin",
          "Çaykara",
          "Maçka",
          "Of",
          "Ortahisar",
          "Sürmene",
          "Tonya",
          "Vakfıkebir",
          "Yomra",
          "Beşikdüzü",
          "Şalpazarı",
          "Çarşıbaşı",
          "Dernekpazarı",
          "Düzköy",
          "Hayrat",
          "Köprübaşı"
        ]
      },
      {
        "il": "Tunceli",
        "plaka": 62,
        "ilceleri": [
          "Çemişgezek",
          "Hozat",
          "Mazgirt",
          "Nazımiye",
          "Ovacık",
          "Pertek",
          "Pülümür",
          "Merkez"
        ]
      },
      {
        "il": "Şanlıurfa",
        "plaka": 63,
        "ilceleri": [
          "Akçakale",
          "Birecik",
          "Bozova",
          "Ceylanpınar",
          "Eyyübiye",
          "Halfeti",
          "Haliliye",
          "Hilvan",
          "Karaköprü",
          "Siverek",
          "Suruç",
          "Viranşehir",
          "Harran"
        ]
      },
      {
        "il": "Uşak",
        "plaka": 64,
        "ilceleri": [
          "Banaz",
          "Eşme",
          "Karahallı",
          "Sivaslı",
          "Ulubey",
          "Merkez"
        ]
      },
      {
        "il": "Van",
        "plaka": 65,
        "ilceleri": [
          "Başkale",
          "Çatak",
          "Erciş",
          "Gevaş",
          "Gürpınar",
          "İpekyolu",
          "Muradiye",
          "Özalp",
          "Tuşba",
          "Bahçesaray",
          "Çaldıran",
          "Edremit",
          "Saray"
        ]
      },
      {
        "il": "Yozgat",
        "plaka": 66,
        "ilceleri": [
          "Akdağmadeni",
          "Boğazlıyan",
          "Çayıralan",
          "Çekerek",
          "Sarıkaya",
          "Sorgun",
          "Şefaatli",
          "Yerköy",
          "Merkez",
          "Aydıncık",
          "Çandır",
          "Kadışehri",
          "Saraykent",
          "Yenifakılı"
        ]
      },
      {
        "il": "Zonguldak",
        "plaka": 67,
        "ilceleri": [
          "Çaycuma",
          "Devrek",
          "Ereğli",
          "Merkez",
          "Alaplı",
          "Gökçebey"
        ]
      },
      {
        "il": "Aksaray",
        "plaka": 68,
        "ilceleri": [
          "Ağaçören",
          "Eskil",
          "Gülağaç",
          "Güzelyurt",
          "Merkez",
          "Ortaköy",
          "Sarıyahşi"
        ]
      },
      {
        "il": "Bayburt",
        "plaka": 69,
        "ilceleri": [
          "Merkez",
          "Aydıntepe",
          "Demirözü"
        ]
      },
      {
        "il": "Karaman",
        "plaka": 70,
        "ilceleri": [
          "Ermenek",
          "Merkez",
          "Ayrancı",
          "Kazımkarabekir",
          "Başyayla",
          "Sarıveliler"
        ]
      },
      {
        "il": "Kırıkkale",
        "plaka": 71,
        "ilceleri": [
          "Delice",
          "Keskin",
          "Merkez",
          "Sulakyurt",
          "Bahşili",
          "Balışeyh",
          "Çelebi",
          "Karakeçili",
          "Yahşihan"
        ]
      },
      {
        "il": "Batman",
        "plaka": 72,
        "ilceleri": [
          "Merkez",
          "Beşiri",
          "Gercüş",
          "Kozluk",
          "Sason",
          "Hasankeyf"
        ]
      },
      {
        "il": "Şırnak",
        "plaka": 73,
        "ilceleri": [
          "Beytüşşebap",
          "Cizre",
          "İdil",
          "Silopi",
          "Merkez",
          "Uludere",
          "Güçlükonak"
        ]
      },
      {
        "il": "Bartın",
        "plaka": 74,
        "ilceleri": [
          "Merkez",
          "Kurucaşile",
          "Ulus",
          "Amasra"
        ]
      },
      {
        "il": "Ardahan",
        "plaka": 75,
        "ilceleri": [
          "Merkez",
          "Çıldır",
          "Göle",
          "Hanak",
          "Posof",
          "Damal"
        ]
      },
      {
        "il": "Iğdır",
        "plaka": 76,
        "ilceleri": [
          "Aralık",
          "Merkez",
          "Tuzluca",
          "Karakoyunlu"
        ]
      },
      {
        "il": "Yalova",
        "plaka": 77,
        "ilceleri": [
          "Merkez",
          "Altınova",
          "Armutlu",
          "Çınarcık",
          "Çiftlikköy",
          "Termal"
        ]
      },
      {
        "il": "Karabük",
        "plaka": 78,
        "ilceleri": [
          "Eflani",
          "Eskipazar",
          "Merkez",
          "Ovacık",
          "Safranbolu",
          "Yenice"
        ]
      },
      {
        "il": "Kilis",
        "plaka": 79,
        "ilceleri": [
          "Merkez",
          "Elbeyli",
          "Musabeyli",
          "Polateli"
        ]
      },
      {
        "il": "Osmaniye",
        "plaka": 80,
        "ilceleri": [
          "Bahçe",
          "Kadirli",
          "Merkez",
          "Düziçi",
          "Hasanbeyli",
          "Sumbas",
          "Toprakkale"
        ]
      },
      {
        "il": "Düzce",
        "plaka": 81,
        "ilceleri": [
          "Akçakoca",
          "Merkez",
          "Yığılca",
          "Cumayeri",
          "Gölyaka",
          "Çilimli",
          "Gümüşova",
          "Kaynaşlı"
        ]
      }
    ]
    $(document).ready(function() {
      const $sehir_select = $("select[name=il]");
      const $ilce_select = $("select[name=ilce]");
      const $save_button = $("button[data-role=save]");

      $sehir_select.find("option").eq(0).siblings().remove();
      for (let i = 0; i < data.length; i++) {
        $sehir_select.append(`<option value="${data[i].plaka}">${data[i].il}</option>`);
      }

      $sehir_select.on("change", function() {
        const target = $(this).val();
        const targetData = data.find(function(x) {
          return x.plaka == target
        });
        if (!targetData) {
          alert("Bu ile ait ilçe kaydı bulunamadı.");
          return;
        }
        $ilce_select.find('option').eq(0).prop("selected", true).siblings().remove();
        $save_button.prop("disabled", true);
        for (let i = 0; i < targetData.ilceleri.length; i++) {
          $ilce_select.append(`<option value="${targetData.ilceleri[i]}">${targetData.ilceleri[i]}</option>`);
        }
        $ilce_select.prop("disabled", false);
      });



      $ilce_select.on("change", function() {
        const selectedSehir = $sehir_select.val();
        const selectedIlce = $(this).val();
        if (selectedIlce && selectedIlce != "0") $save_button.prop("disabled", false);
      })

      // Seçim yaptıralım.
      var selectedData = {
        il: "Antalya",
        plaka: 07,
        ilce: "Manavgat"
      };
      setSelectBoxes(selectedData);

    })

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

    function handleRadioClick() {

      if (document.getElementById('flexRadioDefault2').checked) {
        for (let i = 0; i < box.length; i++) {
          box[i].style.display = 'block';
        }
      } else {
        for (let i = 0; i < box.length; i++) {
          box[i].style.display = 'none';
        }
      }
    }

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