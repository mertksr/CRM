<?php 
include 'connect.php'; 
function formatPhoneNumber($phoneNumber) {
    // Sadece rakamları tutacak şekilde temizleme
    $cleaned = preg_replace('/\D/', '', $phoneNumber);

    // Eğer başında 0 varsa sadece 0'ı sil
    if (strlen($cleaned) > 0 && $cleaned[0] === '0') {
        $cleaned = substr($cleaned, 1);
    }

    return $cleaned;
}
if (isset($_POST['musteriduzenle'])) {
    $musterino = $_POST['musterino'];
    $adsoyad = $_POST['adsoyad'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $bolge = $_POST['bolge'];
    $adres = $_POST['adres'];
    $konum = $_POST['konum'];
    $periyot = $_POST['periyot'];
    $cihaz = $_POST['cihaz'];
$sonrakibakim = $_POST['sonrakibakim'];
    $notlar = $_POST['notlar'];
    $eskibakim = $_POST['eskibakim'];
    if($periyot!==$_POST['eskiperiyot']){
        $sonrakibakim = date('Y-m-d', strtotime($eskibakim . '+' . $periyot . 'months'));
    }
    $tel1 = formatPhoneNumber($tel1);
    $tel2 =formatPhoneNumber($tel2);
    $query = $db->prepare("UPDATE musteriler SET mAdSoyad=:adsoyad,mTel1=:tel1,mTel2=:tel2,mBolge=:bolge,mAdres=:adres,mKonum=:konum,mPeriyot=:periyot,mNot=:notlar,mCihaz=:cihaz,mSonrakiBakim=:sonrakibakim WHERE mMusteriNo=:musterino");
    $query->bindParam(':adsoyad', $adsoyad);
    $query->bindParam(':tel1', $tel1);
    $query->bindParam(':tel2', $tel2);
    $query->bindParam(':bolge', $bolge);
    $query->bindParam(':adres', $adres);
    $query->bindParam(':konum', $konum);
    $query->bindParam(':periyot', $periyot);
    $query->bindParam(':cihaz', $cihaz);
    $query->bindParam(':notlar', $notlar);
    $query->bindParam(':musterino', $musterino);
    $query->bindParam(':sonrakibakim', $sonrakibakim);

    $update = $query->execute();
    if ($update) {

        header("Location: ../views/musteriler.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location: ../views/musteriler.php?no=$musterino&yt=basarisiz");
        exit();
    }
}  ?>
