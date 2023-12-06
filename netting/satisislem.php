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
        "ucret" =>  $_POST['islemucreti'],
        "indirimlifiyat" => $_POST['sindirimlifiyat'],
        "referans" => $_POST['referans'],
        "notlar" => $_POST['notlar']
    ));



    if ($insert) {
        if (!empty($_POST['sindirimlifiyat'])) {
            $fiyat = $_POST['stamfiyat'];
            $indirimlifiyat = $_POST['sindirimlifiyat'];
            $indirim = $fiyat - $indirimlifiyat;
        } else if (empty($_POST['sindirimlifiyat'])) {
            $indirim = 0;
        }
        $query = $db->prepare("INSERT INTO servismuhasebe SET
        sSatisNo = :islemno,
        sMusteriNo = :musterino,
        sTutar = :tutar,
        sIndirim = :indirim,
        sYapilanIndirim = :yapilanindirim,
        sTahsilat = :tahsilat,
        sVeresiye = :veresiye,
        sTarih = :tarih,
        sTuru = :servisturu,
        sPersonel = :personel
        
        
              ");

        $insert = $query->execute(array(
            "islemno" => $number,
            "musterino" => $_POST['musterino'],
            "tutar" =>  $_POST['islemucreti'],
            "indirim" => $_POST['sindirimlifiyat'],
            "yapilanindirim" => $indirim,
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
            vDurum= :durum,
            vYapan= :yapan,
            vNot = :notlar
        
                  ");
    
            $insert = $query->execute(array(
                "islemno" => $number,
                "musterino" => $_POST['musterino'],
                "veresiye" => $_POST['veresiye'],
                "durum" => 1,
                "yapan" => $_SESSION['kullanici'],
                "notlar" => $_POST['notlar']
            ));
        }
        $last_id = $db->lastInsertId();
        header("Location:../views/satislar.php?no=$musterino&yt=basarili");
        exit();
    } else {

        header("Location:../views/satislar.php?no=$musterino&yt=basarisiz");
        exit();
    }
}
};


if (isset($_POST['muhasebedissatisekle'])) {
    $satis = array("Satış");
    $satis = serialize($satis);
    $query = $db->prepare("INSERT INTO servismuhasebe SET

    sTutar = :tutar,
    sTahsilat = :tahsilat,
    sYapilanIndirim = :indirim,
    sTarih = :tarih,
    sTuru = :tur
    
    
          ");

    $insert = $query->execute(array(
        "tutar" => $_POST['tutar'],
        "tahsilat" => $_POST['tutar'],
        "indirim" => 0,
        "tarih" => $_POST['tarih'],
        "tur" => $satis
    ));



if ($insert) {

    $last_id = $db->lastInsertId();
    header("Location:../views/muhasebe.php?yt=basarili");
    exit();
} else {

    header("Location:../views/muhasebe.php?yt=basarisiz");
    exit();
}
};
if ($_GET['satissil']=="ok") {
 $satisno = $_GET['satisno'];
    $query1 = $db->prepare("DELETE FROM satislar WHERE satisNo = :sno");
    $delete = $query1->execute(array(
        'sno' => $_GET['satisno']
    ));
    $query2 = $db->prepare("DELETE FROM veresiye WHERE vSatisNo = :mid");
    $delete2 = $query2->execute(array(
        'mid' =>$satisno
    ));
    $query3 = $db->prepare("DELETE FROM servismuhasebe WHERE sSatisNo = :smid");
    $delete3 = $query3->execute(array(
        'smid' =>$satisno
    ));


    if ($delete){
        header("Location:../views/satislar.php?yt=basarili");
        exit();
    } else {
        header("Location:../views/satislar.php?yt=basarisiz");
        exit();
    }
}
