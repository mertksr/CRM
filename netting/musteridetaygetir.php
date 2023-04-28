<?php
if(isset($_POST["mMusteriNo"]))  
{  
include 'connect.php';
$musterino =  $_POST["mMusteriNo"];
$musterisor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = $musterino");
$musterisor->execute();
$mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
$mahalle = $mustericek['mBolge'];
$mahallesor = $db->prepare("SELECT * from neighborhood where NeighborhoodID =  $mahalle");
$mahallesor->execute();
$mahallecek = $mahallesor->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM islemler WHERE islemMusteriNo = :customer_id ORDER BY islemTarihi DESC LIMIT 1";
$islemsor = $db->prepare($query);
$islemsor->bindParam(':customer_id', $mustericek['mMusteriNo']);


$islemsor->execute();
$count = $islemsor->rowCount();

$islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
$tarih = date('d.m.Y', strtotime($islemcek['islemTarihi']));
$sonrakibakim = date('Y-m-d', strtotime('+' . $islemcek['islemPeriyot'] . ' months'));
setlocale(LC_TIME, "tr_TR"); // Türkçe yerel ayarlarını kullan

$sonrakibakim =  strftime("%B %Y", strtotime("$sonrakibakim"));
$sonrakibakim = iconv('ISO-8859-9', 'UTF-8', $sonrakibakim);
    $query = "SELECT * FROM musteriler WHERE mMusteriNo = :mMusteriNo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':mMusteriNo', $_POST["mMusteriNo"]);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $output = '';  
    $iletisimsor = $db->prepare("SELECT * from iletisim where iletisimMusteriNo = $musterino");
    $iletisimsor->execute();
    while ($iletisimcek = $iletisimsor->fetch(PDO::FETCH_ASSOC)) {
        $iletisimbilgisi =  $iletisimcek["İletisimBilgisi"];
        $output .= '

   <div class="col-6">
   <p> ';
                if ($iletisimcek['iletisimTuru'] == "Mobil" || $iletisimcek['iletisimTuru'] == "Yedek") {
                    $output .= ' <a href="https://wa.me/'.$iletisimbilgisi.'"><i class="fa-solid fa-phone fa-2xl"></i></a> :'  .  $iletisimbilgisi;
                }

              $output .= '  
              </p>
   </div>
   <div class="col-6">
   <p> ';
  
                if ($iletisimcek['iletisimWp'] == "1") {
                    $output .= ' <a href="https://wa.me/'.$iletisimbilgisi.'"><i class="fa-brands fa-whatsapp fa-2xl"></i></a> :'  .  $iletisimbilgisi;
                }
                $output .= '
   </p>
   </div> ';
    } 
    $output .= ' <br><br>
   <div class="row g-1">
   <div class="form-group col-12">
   <label for="exampleFormControlInput1">Adres</label>
   <textarea type="text" readonly style="height:60px;text-transform:uppercase;" class="form-control contact-modal" id="exampleFormControlInput1">'. $mustericek['mAdres'] .'</textarea>
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Bölge </label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mahallecek['NeighborhoodName'].'">
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Son Bakım Tarihi</label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. date('d.m.Y', strtotime($mustericek['mSonIslem'])).'">
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Notlar</label>
   <input type="text" readonly style="text-transform:uppercase;" class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mustericek['mNot'].'">
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Bakım Periyodu</label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $islemcek['islemPeriyot'] . ' Ay">
   </div>
   <div class="form-group col-12">
   <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar??</label>
            <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="">
        </div>
        </div>
    ';  
    echo $output;  
}
