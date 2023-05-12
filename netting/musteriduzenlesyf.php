<?php 
include 'connect.php'; 
if (isset($_POST['musteriduzenle'])) {
    $musterino = $_POST['musterino'];
    $adsoyad = $_POST['adsoyad'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $bolge = $_POST['bolge'];
    $adres = $_POST['adres'];
    $konum = $_POST['konum'];
    $periyot = $_POST['periyot'];
    $notlar = $_POST['notlar'];
    
    $query = $db->prepare("UPDATE musteriler SET mAdSoyad=:adsoyad,mTel1=:tel1,mTel2=:tel2,mBolge=:bolge,mAdres=:adres,mKonum=:konum,mPeriyot=:periyot,mNot=:notlar WHERE mMusteriNo=:musterino");
    $query->bindParam(':adsoyad', $adsoyad);
    $query->bindParam(':tel1', $tel1);
    $query->bindParam(':tel2', $tel2);
    $query->bindParam(':bolge', $bolge);
    $query->bindParam(':adres', $adres);
    $query->bindParam(':konum', $konum);
    $query->bindParam(':periyot', $periyot);
    $query->bindParam(':notlar', $notlar);
    $query->bindParam(':musterino', $musterino);
    
    $update = $query->execute();
    if ($update) {
        header("Location: ../views/musteriler.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location: ../views/musteriler.php?no=$musterino&yt=basarisiz");
        exit();
    }
}  ?>
