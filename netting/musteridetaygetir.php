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

    $islemno = $_POST["mMusteriNo"];
    $islemsor = $db->prepare("SELECT * FROM islemler WHERE islemMusteriNo = :islemMusteriNo");
    $islemsor->execute(array('islemMusteriNo' => $islemno));
    $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
    if(isset($islemcek['islemNo'])){
    $islemturu = unserialize($islemcek['islemTuru']);
    $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);
    $islemurun = [];
    $urunsor = $db->prepare("SELECT * FROM urunler");
    $urunsor->execute();
    $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($kullanilanurun as $urunid) {
        foreach ($urunler as $urun) {
            if ($urunid == $urun['urunid']) {
                array_push($islemurun, $urun['urunAd']);
            }
        }
    }
}
    $output = '';  


        $output .= '

   <div class="col-6">
   <p> ';
                if (!empty($mustericek['mTel1'])) {
                    $output .= ' <div class="p-2" style="font-size:17px;"><a href="https://wa.me/'.$mustericek['mTel1'].'"><i class="fa-solid fa-phone fa-2xl"></i></a> :'  .  $mustericek['mTel1'] .'</div>';
                }if (!empty($mustericek['mTel2'])) {
                    $output .= '<div class="p-2" style="font-size:17px;"><a href="https://wa.me/'.$mustericek['mTel2'].'"><i class="fa-solid fa-phone fa-2xl"></i></a> :'  .  $mustericek['mTel2'] .'</div>';
                }

              $output .= '  
              </p>
   </div>
   <div class="col-6">
   <p> ';
  
                if (!empty($mustericek['mTel1'])) {
                    $output .= ' <div class="p-2" style="font-size:17px;"><a href="https://wa.me/'.$mustericek['mTel1'].'"><i class="fa-brands fa-whatsapp fa-2xl"></i></a> :'  .  $mustericek['mTel1'] .'</div>';
                } if (!empty($mustericek['mTel2'])) {
                    $output .= ' <div class="p-2" style="font-size:17px;"><a href="https://wa.me/'.$mustericek['mTel2'].'"><i class="fa-brands fa-whatsapp fa-2xl"></i></a> :'  .  $mustericek['mTel2'] .'</div>';
                }
                $output .= '
   </p>
   </div> ';
    
    $output .= ' <br><br>
   <div class="row g-1">
   <input type="hidden" data-adsoyad="'.$mustericek['mAdSoyad'].'" id="madsoyad">
   <div class="form-group col-12">
   <label for="exampleFormControlInput1">Adres</label>
   <textarea type="text" readonly style="height:60px;text-transform:uppercase;" class="form-control contact-modal" id="exampleFormControlInput1">'. $mustericek['mAdres'] .'</textarea>
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Bölge </label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mustericek['mBolge'].'">
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
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mustericek['mPeriyot'] . ' Ay">
   </div>
   <div class="form-group col-12">
   <label for="exampleFormControlInput1">Son Bakımda Değişen Parçalar??</label>
   <textarea  readonly class="form-control contact-modal">
';
 if(!empty($islemurun)){$kullanilanurunler = implode(", ", $islemurun);}else{$kullanilanurunler = "Bakım Bilgisi Yok";}
 $output.= ' '. $kullanilanurunler .' </textarea>
        </div>
        </div>
    ';  
    echo $output;  
    
}
