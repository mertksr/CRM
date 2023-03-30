<?php
 include 'connect.php';

 if (isset($_POST['musteriekle'])) {
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM musteriler WHERE mMusteriNo = '$number'";
    $result = $db->query($sql);
    // Sonuç var mı yok mu kontrol et
    if ($result->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    } else {
        
   


    $query = $db->prepare("INSERT INTO musteriler SET
    mMusteriNo = :musterino,
    mDurum = :durum,
    mRefNo = :refno,
    mKayitTuru = :kayitturu,
    mVergiDairesi = :vergidairesi,
    mVergiNo = :vergino,
    mTcNo = :tcno,
    mMarkaAdi = :markaadi,
    mSubeAdi =:subeadi,
    mKisaltmasi = :kisaltmasi,
    mFirmaUnvani = :firmaunvani,	
    mUnvanDevami = :unvandevami,
    mAdSoyad =:adsoyad,
    mDogumGunu = :dogumgunu,
    mCalistigiFirma = :calistigifirma,
    mUnvan = :unvan,
    mTicaretSicilNo =:ticsicilno,
    mOdaSicilNo = :odasicilno,
    mMersisNo = :mersisno,
    mBolge = :bolge,
    mAdres =:adres,
    mIlce =:ilce,
    mIl = :il,
    mKonum = :konum,
    mNot = :mnot
                ");

    $insert = $query->execute(array(
        "musterino" => $number,
        "durum" => 1,
        "refno" => $_POST['refno'],
        "kayitturu" => $_POST['kayitturu'],
        "vergidairesi" => $_POST['vergidairesi'],
        "vergino" => $_POST['vergino'],
        "tcno" => $_POST['tcno'],
        "markaadi" => $_POST['markaadi'],
        "subeadi" =>$_POST['subeadi'],
        "kisaltmasi" => $_POST['musterikisaltmasi'],
        "firmaunvani" => $_POST['firmaticariunvani'],
        "unvandevami" =>$_POST['unvandevami'],
        "adsoyad" =>$_POST['adsoyad'],
        "dogumgunu" => $_POST['dogumgunu'],
        "calistigifirma" => $_POST['calistigifirma'],
        "unvan" => $_POST['musteriunvani'],
        "ticsicilno" => $_POST['ticaretsicilno'],
        "odasicilno" => $_POST['odasicilno'],
        "mersisno" => $_POST['mersisno'],
        "bolge" => $_POST['bolge'],
        "adres" => $_POST['adres'],
        "ilce" => $_POST['ilce'],
        "il" => $_POST['il'],
        "konum" => $_POST['konum'],
        "mnot" =>$_POST['not']


    ));
    $iletisimBilgisi = $_POST['ibilgi'];
    $iletisimTuru = $_POST['ituru'];
    $last_id = $db->lastInsertId();
    for($i=0; $i<count($iletisimBilgisi); $i++){
        $query = $db->prepare("INSERT INTO iletisim SET
        iletisimBilgisi = :iletisimBilgisi,
        iletisimTuru = :iletisimTuru,
        iletisimMusteriNo = :iletisimMusteriNo
        ");
        $insert = $query->execute(array(
            "iletisimBilgisi" => $iletisimBilgisi[$i],
            "iletisimTuru" => $iletisimTuru[$i],
            "iletisimMusteriNo" => $number
        ));
    } }
    if ($insert) {
        $last_id = $db->lastInsertId();
          header("Location:../views/musteriekle.php?yt=basarili");
          exit();

    } else {

         header("Location:../views/musteriekle.php?yt=basarisiz");
         exit();
    }
}
