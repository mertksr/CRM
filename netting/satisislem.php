<?php
include 'connect.php';

if (isset($_POST['satisekle'])) {

        $num_of_digits = 6;
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);

        // Aynı numara ile veritabanında kayıt var mı kontrol et
        $sql = "SELECT * FROM satislar WHERE satisNo = :satisno";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":satisno", $number);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Eğer aynı numara ile bir kayıt varsa, farklı bir numara oluşturun
            $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
        }else {
    $musterino = $_POST['musterino'];

    $yapilanislem = $_POST['kullanilanurunler'];
    $yapilanislem_str = serialize($yapilanislem);
    $satis = array("Satış");
    $satis = serialize($satis);
    $query = $db->prepare("INSERT INTO satislar SET
        satisNo = :satisno,
    	sMID = :musterino,
        sUrun = :kullanilanurunler,
        sGarantiSuresi = :garanti,
        sGarantiBitis = :gbitis,
        sTutar = :ucret,
        sIndirimliTutar = :indirimlifiyat,
        sReferans = :referans,
        sNot = :notlar
                ");

    $insert = $query->execute(array(
        "satisno" => $number,
        "musterino" => $_POST['musterino'],
        "kullanilanurunler" => $yapilanislem_str,
        "garanti" => $_POST['garanti'],
        "gbitis" => date('Y-m-d', strtotime(' + ' . $_POST['garanti'] . ' years')),
        "ucret" =>  $_POST['tamfiyat'],
        "indirimlifiyat" => $_POST['indirimlifiyat'],
        "referans" => $_POST['referans'],
        "notlar" => $_POST['notlar']
    ));



    if ($insert) {
        $query = $db->prepare("INSERT INTO servismuhasebe SET
        sSatisNo = :islemno,
        sMusteriNo = :musterino,
        sTutar = :tutar,
        sIndirim = :indirim,
        sTahsilat = :tahsilat,
        sVeresiye = :veresiye,
        sTarih = :tarih,
        sTuru = :servisturu,
        sPersonel = :personel
        
        
              ");

        $insert = $query->execute(array(
            "islemno" => $number,
            "musterino" => $_POST['musterino'],
            "tutar" =>  $_POST['stamfiyat'],
            "indirim" => $_POST['sindirimlifiyat'],
            "tahsilat" => $_POST['tahsilat'],
            "veresiye" => $_POST['veresiye'],
            "tarih" => date("Y-m-d"),
            "servisturu" => $satis,
            "personel" => $_SESSION['kullanici']

        ));


        if (!empty($_POST['veresiye'])) {
            $query = $db->prepare("INSERT INTO veresiye SET
                vSatisNo = :islemno,
                vMusteriNo = :musterino,
                vTutar = :veresiye,
                vDurum= :durum
            
                      ");

            $insert = $query->execute(array(
                "islemno" => $number,
                "musterino" => $_POST['musterino'],
                "veresiye" => $_POST['veresiye'],
                "durum" => 1
            ));
        }
        $last_id = $db->lastInsertId();
        header("Location:../views/satislar.php?no=$musterino&yt=basarili");
        exit();
    } else {

        header("Location:../views/satislar.php?no=$musterino&yt=basarisiz");
        exit();
    }
}};
