<?php
if(isset($_POST["sno"]))  
{  
include 'connect.php';
$sno =  $_POST["sno"];

$satissor = $db->prepare("SELECT * from satislar WHERE sNo = $sno");
$satissor->execute();
$satiscek = $satissor->fetch(PDO::FETCH_ASSOC);

$musterisor = $db->prepare("SELECT * from musteriler WHERE mMusteriNo = $satiscek[sMID]");
$musterisor->execute();
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


    $output = '';  


        $output .= '

   <div class="row g-1">
   <input type="hidden" data-adsoyad="'.$mustericek['mAdSoyad'].'" id="madsoyad">
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Ad Soyad </label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mustericek['mAdSoyad'].'">
   </div>
   <div class="form-group col-6">
   <label for="exampleFormControlInput1">Bölge </label>
   <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $mustericek['mBolge'].'">
   </div>
   <div class="form-group col-12">
   <label for="exampleFormControlInput1">Adres</label>
   <textarea type="text" readonly style="height:60px;text-transform:uppercase;" class="form-control contact-modal" id="exampleFormControlInput1">'. $mustericek['mAdres'] .'</textarea>
   </div>
   <hr>
  <div class="form-group col-12">
   <label for="exampleFormControlInput1">Satılan Ürünler</label>
   <textarea  readonly class="form-control contact-modal">
';
 if(!empty($islemurun)){$kullanilanurunler = implode(", ", $islemurun);}else{$kullanilanurunler = "Kayıt Bulunamadı";}
 $output.= ' '. $kullanilanurunler .' </textarea>
        </div>
        <div class="form-group col-5">
        <label for="exampleFormControlInput1">Satış Tarihi</label>
        <input type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'. date("d.m.Y",strtotime($satiscek['sTarih'])).'">
        </div>
        <div class="form-group col-2">
        <label for="exampleFormControlInput1">Garanti</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1" value="'. $satiscek['sGarantiSuresi'] .' ">
        </div>
        <div class="form-group col-5">
        <label for="exampleFormControlInput1">Garanti Bitiş</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'.date("d.m.Y", strtotime($satiscek['sGarantiBitis'])).'">
        </div>

        '; 
        $ucret = intval($satiscek['sTutar']);
$indirim=intval($satiscek['sIndirimliTutar']); 
$tutar = $ucret - $indirim;
        $output .= '
        <div class="form-group col-4">
        <label for="exampleFormControlInput1">Tutar</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'. $satiscek['sTutar'] .'">
        </div>
        <div class="form-group col-4">
        <label for="exampleFormControlInput1">İndirim</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="-'. $satiscek['sIndirimliTutar'] .'">
        </div>
        <div class="form-group col-4">
        <label for="exampleFormControlInput1">Ücret</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'.$tutar .'">
        </div>
        <div class="form-group col-lg-5">
        <label for="exampleFormControlInput1">Referans</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'. $satiscek['sReferans'] .'">
        </div>
        <div class="form-group col-7">
        <label for="exampleFormControlInput1">Satış Notları</label>
        <input  type="text" readonly class="form-control contact-modal" id="exampleFormControlInput1"value="'. $satiscek['sNot'] .'">
        </div>


        </div>
    ';  
    echo $output;  
    
}
