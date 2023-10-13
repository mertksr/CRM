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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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

    $satissor = $db->prepare("SELECT * from satislar where sMID =  ?");
    $satissor->execute(array($_GET['musterino']));
    $satiscek = $satissor->fetch(PDO::FETCH_ASSOC);
    $satissor = $db->prepare("SELECT * from satislar where sMID =  ?");
    $satissor->execute(array($_GET['musterino']));
    $satiscek = $satissor->fetch(PDO::FETCH_ASSOC);

    
    $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
    $musterisor->execute(array($satiscek['sMID'])); 
    $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
    $urunsor = $db->prepare("SELECT * FROM urunler");
    $urunsor->execute();
    $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
    $islemurun = [];
$kullanilanurun = unserialize($satiscek['sUrun']);
foreach ($kullanilanurun as $urunid) {
    foreach ($urunler as $urun) {
        if ($urunid == $urun['urunid']) {
            array_push($islemurun, $urun['urunAd']);
        }
    }
}
$kullanilanurunler = implode(", ", $islemurun);
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

                          <h4 style="color:crimson;text-align:center;">SATIŞI SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?</h4>  
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
                          <h4>Satış Düzenle</h4>
                        </div>
                      </div>
                    </div>

                    <div class="widget-content widget-content-area">
                      <form class="row g-2" method="POST" id="musteriduzenleform" action="../netting/musteriduzenlesyf.php">

                        <div class="col-12 col-lg-6 col-md-6">
                          <label for="inputAddress" class="form-label">Müşteri Adı Soyadı</label>
                          <input type="text" name="adsoyad" style="color:#505463;" readonly value="<?= $mustericek['mAdSoyad'] ?>" class="form-control" id="inputAddress">
                        </div>
                        
                        <div class="col-12 col-lg-6 col-md-6">
                          <label for="inputAddress" class="form-label">Satılan Ürünler</label>
                          <input type="text" name="adsoyad" style="color:#505463;" readonly value="<?= $kullanilanurunler; ?>" class="form-control" id="inputAddress">
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 col-sm-12">
                                <label for="defaultInputState" class="form-label ">Satılan
                                    Ürünleri Değiştir</label>
                                <select id="choices-multiple-remove-button" name="kullanilanurunler[]" placeholder="Ürün Seçiniz" multiple>
                                    <?php

                                    $urunsor = $db->prepare("SELECT *  FROM urunler WHERE urunCinsi = 3 ORDER BY urunCinsi DESC");
                                    $urunsor->execute();
                                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                                        if(!empty($uruncek['urunFiyat'])){
                                            $urunfiyat= "{" .$uruncek['urunFiyat']. "TL}";
                                        }else{
                                            $urunfiyat="";
                                        }
                                    ?>
                                        <option value="<?= $uruncek['urunid']; ?>"><?= $uruncek['urunAd'] . $urunfiyat; ?></option>
                                    <?php  } ?>

                                </select>
                            </div>


                            <div class="col-12 col-lg-6 col-md-6">
                                <label for="inputAddress" class="form-label">Satış Tutarı</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" id="islemtutari" name="islemucreti" style="color:#505463;">
                                </div>
                            </div>




                            <div class="form-group col-6">
                          <label for="exampleFormControlInput1" class="mb-1">Referans</label>
                          <input type="text" class="form-control" value="<?= $satiscek['sReferans'] ?>" name="notlar" id="notlar">
                        </div>




                        <input type="hidden" value="<?= $satiscek['sNo']; ?>" name="satisno">


                        <div class="col-12">
                          <button style="float:right;" type="submit" name="satisduzenle" class="btn btn-success">Kaydet</button>
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


$("#choices-multiple-remove-button").on("change", function() {
var selectedValues = $("#choices-multiple-remove-button").val();
var selectedString = selectedValues.join(",");

$.ajax({
    url: "../netting/urunlericagir.php",
    method: "POST",
    data: {
        products: selectedString
    }
}).done(function(response) {
    // AJAX isteği tamamlandığında, fiyatları alın
    var prices = JSON.parse(response);
    // Toplam fiyatı hesaplayın
    var total = 0;
    for (var i = 0; i < prices.length; i++) {
        total += parseFloat(prices[i]);
    }

    $("#islemtutari").val(total);

});

});

const islemUcretiInput = document.getElementById('islemtutari');
const tahsilatInput = document.getElementById('tahsilat');
islemUcretiInput.addEventListener('input', function() {
// Ücreti alın ve tahsilat inputuna yazın
tahsilatInput.value = islemUcretiInput.value;
});


var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
removeItemButton: true
// searchResultLimit: 5,
// renderChoiceLimit: 8
});


$("#makediscount").click(function() {
var fiyat = $("#islemtutari").val();
if (fiyat == "0" || fiyat == "" || fiyat == null) {
    alert("Ürün seçmeden indirim yapamazsınız!");
    return false;
} else {
    // $("#makediscount").off("click"); 
    $("#makediscount").removeClass('btn-outline-primary');
    $("#makediscount").addClass('btn-outline-danger');

    $.ajax({
        url: "../netting/ayarcek.php",
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            var fiyat = parseFloat($("#islemtutari").val());
            var basamak = fiyat.toString().length;
            var indirim_tutari = fiyat * 0.1;
            var yeni_fiyat = fiyat - indirim_tutari;
            var roundedPrice;
            if (basamak == 4 || basamak == 5) {
                roundedPrice = Math.floor(yeni_fiyat / 100) * 100;
                if (yeni_fiyat - roundedPrice >= 50) {
                    roundedPrice += 100;
                }
            } else if (basamak == 3 || basamak == 2) {
                roundedPrice = Math.floor(yeni_fiyat / 10) * 10;
            }
            $("#tahsilat").val(roundedPrice);

            $("#islemtutari").val(roundedPrice);
            $("#indirimtutari").val(roundedPrice);
        }

    });

}
});

function veresiyeHesapla() {
// Tahsilat miktarını al
var costid = "islemtutari";
var costval = document.getElementById(costid).value;

var tahsilatMiktarı = parseFloat(document.getElementById('tahsilat').value);

// Eğer tahsilat miktarı bir sayı değilse veya boşsa, borcu sıfırla
if (isNaN(tahsilatMiktarı) || tahsilatMiktarı === "") {
    document.getElementById('veresiye').value = 0;
} else {
    // Tahsilat miktarını değiştirip borcu hesapla
    var veresiyeMiktarı = costval - tahsilatMiktarı;
    document.getElementById('veresiye').value = veresiyeMiktarı;
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