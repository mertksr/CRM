<?php
if(isset($_POST["islemId"]))  
{  
    include 'connect.php';

                           
                                $urunsor = $db->prepare("SELECT * FROM urunler");
                                $urunsor->execute();
                                $urunler = $urunsor->fetchAll(PDO::FETCH_ASSOC);
                                
                                $islemno = $_POST["islemId"];
                                $islemsor = $db->prepare("SELECT * FROM islemler WHERE islemId = :islemNo");
                                $islemsor->execute(array('islemNo' => $islemno));
                                $islemcek = $islemsor->fetch(PDO::FETCH_ASSOC);
                                $islemturu = unserialize($islemcek['islemTuru']);
                                $kullanilanurun = unserialize($islemcek['islemKullanilanUrun']);
                                $islemurun = [];

                                $islemmusterino = $islemcek['islemMusteriNo'];
                                $musterisor = $db->prepare("SELECT * from musteriler where mMusteriNo =  ?");
                                $musterisor->execute(array($islemmusterino));
                                $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);

                                foreach ($kullanilanurun as $urunid) {
                                    foreach ($urunler as $urun) {
                                        if ($urunid == $urun['urunid']) {
                                            array_push($islemurun, $urun['urunAd']);
                                        }
                                    }
                                }
                                if( $islemcek['islemIndirimliFiyat'] != 0){
                               $indirimtutarı =  $islemcek['islemUcret'] - $islemcek['islemIndirimliFiyat'];}
                               else{
                                $indirimtutarı =  0;
                               }
    $output = '';  

    
    $output .= '  
    

    <div class="col-12 col-lg-6 col-md-6">
    <label for="inputAddress" class="form-label">Müşteri Adı Soyadı</label>
    <input type="text" readonly value="'. $mustericek['mAdSoyad'].'" class="form-control info-input " id="inputAddress">
</div>
<div class="col-12 col-lg-6 col-md-6">
<label for="inputAddress" class="form-label">Bölge</label>
<input type="text" readonly value="'. $mustericek['mBolge'].'" class="form-control info-input " id="inputAddress">
</div>


<div class="col-12">
    <label for="inputAddress2" class="form-label">Hizmet Türü</label>
    <input type="text" value="'.  implode(", ", $islemturu).'" readonly class="form-control info-input" name="islemnotlari" id="inputAddress2">
</div>


<div class="col-12">
    <label for="inputAddress2" class="form-label">Kulanılan Ürünler</label>
<textarea  readonly class="form-control info-input">
'.  implode(", ", $islemurun).'
</textarea>
</div>


<div class="col-6">
    <label for="inputAddress" class="form-label">İşlem Ücreti</label>

    <div class="input-group">
        <input type="text" class="form-control info-input" value="'. $islemcek['islemUcret'].' TL" id="cost" name="islemucreti" readonly style="color:#505463;">                                            </div>
</div>
<div class="col-6">
    <label for="inputAddress" class="form-label">Yapılan İndirim</label>

    <div class="input-group">
        <input type="text" class="form-control info-input" value="'. $indirimtutarı .' TL" id="cost" name="islemucreti" readonly style="color:#505463;">                                            </div>
</div>

<div class="col-6">
    <label for="inputAddress2" class="form-label">İşlem Yapan</label>
    <input type="text" readonly class="form-control info-input" value="'.$islemcek['islemYapanKisi'].'" name="islemnotlari" id="inputAddress2">
</div>


<div class="col-6">
    <label for="inputAddress2" class="form-label">Periyot</label>
    <input type="text" readonly class="form-control info-input" value="'.$islemcek['islemPeriyot'].'" name="islemnotlari" id="inputAddress2">
</div>

<div class="col-12">
    <label for="inputAddress2" class="form-label">Notlar</label>
    <input type="text" readonly class="form-control info-input" value="'. $islemcek['islemNot'].'" name="islemnotlari" id="inputAddress2">
</div>

';  
    echo $output;
    $adsoyad = $mustericek['mAdSoyad'];
}
