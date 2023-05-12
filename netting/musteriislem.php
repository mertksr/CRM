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


        $num_of_digits = 6;
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
        $query = "INSERT INTO musteriler(mDurum,mMusteriNo, mAdSoyad, mTel1, mTel2, mKonum, mAdres, mBolge, mNot, mPeriyot) VALUES(:durum,:musterino, :adsoyad, :tel1, :tel2, :konum, :adres, :bolge, :notlar, :periyot)";
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

        $insert = $statement->execute();
        if($insert){
            header("Location: ../views/musteriler.php?yt=basarili");
            exit();
        } else {
            header("Location: ../views/musteriler.php?yt=basarisiz");
            exit();
        }
        
    }

