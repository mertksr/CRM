<?php
include 'connect.php';

if (isset($_POST['musteriekle'])) {
    $durum = 1;

    $adsoyad = $_POST["adsoyad"];
    $tel1 = $_POST["tel1"];
    $tel2 = $_POST["tel2"];
    $bolge = $_POST["bolge"];
    $konum = $_POST["konum"];
    $adres = $_POST["adres"];
    $bolge = $_POST["bolge"];
    $notlar = $_POST["notlar"];
    $periyot = $_POST["periyot"];
    $cihaz = $_POST["cihaz"];

$sonrakibakim = date('Y-m-d', strtotime('+' . $periyot . ' months'));
        $num_of_digits = 6;
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
        $query = "INSERT INTO musteriler(mDurum,mMusteriNo, mAdSoyad, mTel1, mTel2, mKonum, mAdres, mBolge, mNot, mPeriyot,mCihaz,mSonrakiBakim) VALUES(:durum,:musterino, :adsoyad, :tel1, :tel2, :konum, :adres, :bolge, :notlar, :periyot, :cihaz,:sonrakibakim)";
        $statement = $db->prepare($query);
        $statement->bindParam(':durum', $durum);
        $statement->bindParam(':musterino', $number);
        $statement->bindParam(':adsoyad', $adsoyad);
        $statement->bindParam(':tel1', $tel1);
        $statement->bindParam(':tel2', $tel2);
        $statement->bindParam(':bolge', $bolge);
        $statement->bindParam(':konum', $konum);
        $statement->bindParam(':adres', $adres);
        $statement->bindParam(':notlar', $notlar);
        $statement->bindParam(':periyot', $periyot);
        $statement->bindParam(':cihaz', $cihaz);
        $statement->bindParam(':sonrakibakim', $sonrakibakim);

        $insert = $statement->execute();
        if($insert){
            header("Location: ../views/musteriler.php?yt=basarili");
            exit();
        } else {
            header("Location: ../views/musteriler.php?yt=basarisiz");
            exit();
        }
        
    }
if (isset($_POST['personelmusteriekle'])) {
    $durum = 1;

    $adsoyad = $_POST["adsoyad"];
    $tel1 = $_POST["tel1"];
    $tel2 = $_POST["tel2"];
    $bolge = $_POST["bolge"];
    $konum = $_POST["konum"];
    $adres = $_POST["adres"];
    $cihaz = $_POST["cihaz"];
    $notlar = $_POST["notlar"];
    $periyot = $_POST["periyot"];

    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $query = "INSERT INTO musteriler(mDurum, mMusteriNo, mAdSoyad, mTel1, mTel2, mKonum, mAdres, mBolge, mCihaz, mNot, mPeriyot) VALUES(:durum, :musterino, :adsoyad, :tel1, :tel2, :konum, :adres, :bolge, :cihaz, :notlar, :periyot)";
    $statement = $db->prepare($query);
    $statement->bindParam(':durum', $durum);
    $statement->bindParam(':musterino', $number);
    $statement->bindParam(':adsoyad', $adsoyad);
    $statement->bindParam(':tel1', $tel1);
    $statement->bindParam(':tel2', $tel2);
    $statement->bindParam(':bolge', $bolge);
    $statement->bindParam(':konum', $konum);
    $statement->bindParam(':adres', $adres);
    $statement->bindParam(':cihaz', $cihaz);
    $statement->bindParam(':notlar', $notlar);
    $statement->bindParam(':periyot', $periyot);

    $insert = $statement->execute();
    if($insert){
        header("Location: ../views/personel/index.php?yt=basarili");
        exit();
    } else {
        header("Location: ../views/personel/index.php?yt=basarisiz");
        exit();
    }
}

    if (isset($_POST['bakimertele'])) {
        $erteleay = $_POST['erteleay'];
        $erteletarih = $_POST['erteletarih'];
        $musterino = $_POST['musterino'];
        $sonrakibakim = $_POST['sonrakibakimtarihi'];
            if (!empty($erteleay) && is_numeric($erteleay)) {
                $yeni_tarih = date('Y-m-d', strtotime($sonrakibakim . '+' . $erteleay . 'months'));
            } else if (!empty($erteletarih)) {
                $yeni_tarih = date('Y-m-d', strtotime($erteletarih));
            }
            $query = $db->prepare("UPDATE musteriler SET mSonrakiBakim=:tarih WHERE mMusteriNo=:mno");
            $query->bindParam(':tarih', $yeni_tarih);
            $query->bindParam(':mno', $musterino);
            $insert = $query->execute();
        
            if ($insert) {
                header("Location:../views/musteriler.php?no=$musterino&yt=basarili");
                exit();
            } else {
                header("Location:../views/musteriler.php?no=$musterino&yt=basarisiz");
                exit();
            }
        }
        if (isset($_POST['konumduzenle'])) {
            $konum = $_POST['konum'];
            $musterino = $_POST['musterino'];

                $query = $db->prepare("UPDATE musteriler SET mKonum=:konum WHERE mMusteriNo=:mno");
                $query->bindParam(':konum', $konum);
                $query->bindParam(':mno', $musterino);
                $insert = $query->execute();
            
                if ($insert) {
                    header("Location:../views/personel/index.php?no=$musterino&yt=basarili");
                    exit();
                } else {
                    header("Location:../views/personel/index.php?no=$musterino&yt=basarisiz");
                    exit();
                }
            }
?>