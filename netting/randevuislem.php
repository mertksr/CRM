<?php
include 'connect.php';

if (isset($_POST['randevuduzenle'])) {
    $rno = $_POST['rNo'];
    $query = $db->prepare("UPDATE randevular SET 
                rGorusmeTarihi = :gorusmetarihi,
                rTemsilci = :temsilci,
                rHizmetTuru = :hizmetturu,
                rTarih = :randevutarihi,
                rTeklif = :teklif,
                rNot = :notlar
                WHERE rNo = :rid
    ");
    $update = $query->execute(array(
        "gorusmetarihi" => $_POST['gorusmetarihi'],
        "temsilci" => $_POST['temsilci'],
        "hizmetturu" => $_POST['hizmetturu'],
        "randevutarihi" => $_POST['randevutarihi'],
        "teklif" => $_POST['teklif'],
        "notlar" => $_POST['notlar'],
        "rid" => $rno
    ));
    if ($update) {
        header("Location:../views/randevuduzenle.php?rno=$rno=ok");
    } else {
        header("Location:../views/randevuduzenle.php?rno=$rnod=no");
    }
}

if (isset($_POST['randevuekle'])) {

    $musterino = $_POST['musterino'];
    $query = $db->prepare("INSERT INTO randevular SET
      	rMID = :musteriid,
          rGorusmeTarihi = :gorusmetarihi,
          rTemsilci = :temsilci,
          rHizmetTuru = :hizmetturu,
          rTarih = :tarih,
          rDurum = :durum,
          rNot = :notlar
                ");

    $insert = $query->execute(array(
        "musteriid" => $musterino,
        "gorusmetarihi" => $_POST['gorusmetarihi'],
        "temsilci" => $_POST['temsilci'],
        "hizmetturu" => $_POST['hizmetturu'],
        "tarih" => $_POST['randevutarihi'],
        "durum" => 1,
        "notlar" => $_POST['notlar']
    ));


    if ($insert) {
        $last_id = $db->lastInsertId();
        header("Location:../views/mrandevular.php?no=$musterino&yt=basarili");
        exit();
    } else {

        header("Location:../views/mrandevular.php?no=$musterino&yt=basarisiz");
        exit();
    }
}



if (isset($_POST['islemekle'])) {

    $randevuid = $_POST['randevuid'];

    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM islemler WHERE islemNo = '$number'";
    $result = $db->query($sql);

    // Sonuç var mı yok mu kontrol et
    if ($result->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    } else {

        $hizmetler = $_POST['hizmetler'];
        $hizmetler = explode(",", $hizmetler);
        $hizmetler_str = serialize($hizmetler);
        if (isset($_POST['urunler'])) {
            $yapilanislem = $_POST['urunler'];
            $yapilanislem = explode(",", $yapilanislem);
            $yapilanislem_str = serialize($yapilanislem);
        }

        $query = $db->prepare("INSERT INTO islemler SET
      	islemNo = :islemno,
    	islemMusteriNo = :musterino,
        islemYapanKisi = :yapankisi,
        islemUcret = :ucret,
        islemIndirimliFiyat = :indirimlifiyat,
        islemTuru = :hizmetturu,
        islemKullanilanUrun = :kullanilanurunler,
        islemNot = :islemnot,
        islemRandevu = :islemrandevu

                ");

        $insert = $query->execute(array(
            "islemno" => $number,
            "musterino" => $_POST['musterino'],
            "yapankisi" =>  $_SESSION['kullanici'],
            "ucret" =>  $_POST['tamfiyat'],
            "indirimlifiyat" => $_POST['indirimlifiyat'],
            "hizmetturu" => $hizmetler_str,
            "kullanilanurunler" => $yapilanislem_str,
            "islemnot" => $_POST['islemnotlari'],
            "islemrandevu" => $_POST['randevuid']

        ));



        $musterino = $_POST['musterino'];
        $bakim = "Bakım";



        if ($insert) {
            if (in_array($bakim, $hizmetler)) {
                $yapilanislem = $_POST['urunler'];
                $yapilanislem = explode(",", $yapilanislem);
                $yapilanislem_json = json_encode($yapilanislem);
                // 'Bakım' seçildiyse işlemleri yap
                $islemtarihi = date("Y-m-d");
                $periyot = $_POST['periyot'];
                $query = $db->prepare("UPDATE musteriler SET  mSonrakiBakim = :sonrakibakimtarihi,mSonIslem =:sonislem,mKullanilanUrun = :urun WHERE mMusteriNo = :musterino");

                $insert = $query->execute(array(
                    "sonrakibakimtarihi" => date("Y-m-d", strtotime($islemtarihi . ' + ' . $periyot . ' month')),
                    "musterino" => $musterino,
                    "sonislem" => $islemtarihi,
                    "urun" => $yapilanislem_json

                ));
            }
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
            if (!empty($_POST['indirimlifiyat'])) {
                $fiyat = $_POST['tamfiyat'];
                $indirimlifiyat = $_POST['indirimlifiyat'];
                $indirim = $fiyat - $indirimlifiyat;
            } else if (empty($_POST['indirimlifiyat'])) {
                $indirim = 0;
            }
            $query = $db->prepare("INSERT INTO servismuhasebe SET
    sIslemNo = :islemno,
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
                "tutar" =>  $_POST['tamfiyat'],
                "indirim" => $_POST['indirimlifiyat'],
                "yapilanindirim" => $indirim,
                "tahsilat" => $_POST['tahsilat'],
                "veresiye" => $_POST['veresiye'],
                "tarih" => date("Y-m-d"),
                "servisturu" => $hizmetler_str,
                "personel" => $_SESSION['kullanici']

            ));
            $durum = "2";
            $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
            $query->bindParam(':durum', $durum);
            $query->bindParam(':id', $randevuid);
            $update = $query->execute();
            $last_id = $db->lastInsertId();
            header("Location:../views/randevular.php?no=$musterino&yt=basarili");
            exit();
        } else {

            header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
            exit();
        }
    }
}

// if (isset($_POST['randevukapat'])) {
//     $randevuid = $_POST['randevuid'];
//     $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
//     $query->bindParam(':durum', $durum);
//     $query->bindParam(':id', $randevuid);
//     $durum = "0";
//     $update = $query->execute();
//     if ($update) {
//         header("Location: ../views/randevular.php?no=$musterino&yt=basarili");
//         exit();
//     } else {
//         header("Location: ../views/randevular.php?no=$musterino&yt=basarisiz");
//         exit();
//     }
// }
if (isset($_POST['randevuata'])) {
    print_r($_POST);
    $randevuid = $_POST['randevuid'];
    $personel = $_POST['randevupersonel'];
    $query = $db->prepare("UPDATE randevular SET rTeknisyen=:personel WHERE rNo=:id");
    $query->bindParam(':personel', $personel);
    $query->bindParam(':id', $randevuid);

    $update = $query->execute();
    if ($update) {
        header("Location: ../views/randevular.php?yt=basarili");
        exit();
    } else {
        header("Location: ../views/randevular.php?yt=basarisiz");
        exit();
    }
}

$randevuid = $_POST['randevuid'];
$randevusor = $db->prepare("SELECT * FROM randevular WHERE rNo =:id");
$randevusor->execute(array(
    "id" => $randevuid
));
$randevucek = $randevusor->fetch(PDO::FETCH_ASSOC);
$musterino = $randevucek['rMID'];

if (isset($_POST['randevuertele'])) {
    $musterino = $_POST['musterino'];
    $randevuid = $_POST['randevuid'];

    if (!empty($_POST['sonrakibakimerteleay'])) {

        $sonrakibakimerteleay = $_POST['sonrakibakimerteleay'];
        $musterisor = $db->prepare("SELECT * FROM musteriler WHERE mMusterino =:mid");
        $musterisor->execute(array(
            "mid" => $musterino
        ));
        $mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);
        $yeni_sonrakibakim = date('Y-m-d', strtotime($mustericek['mSonrakiBakim'] . '+' . $sonrakibakimerteleay . 'months'));

        $query = $db->prepare("UPDATE musteriler SET mSonrakiBakim=:sonrakibakim WHERE mMusteriNo=:mid");
        $query->bindParam(':sonrakibakim', $yeni_sonrakibakim);
        $query->bindParam(':mid', $musterino);
        $update = $query->execute();

        $deletequery = $db->prepare("DELETE FROM randevular WHERE rNo = :rid");
        $delete = $deletequery->execute(array(
            'rid' => $randevuid
        ));
    }else if (!empty($_POST['erteletarih'])) {
    $erteletarih = $_POST['erteletarih'];

    if (!empty($erteleay) && is_numeric($erteleay) && isset($erteleay)) {
        $tarih = $randevucek['rTarih'];
        $yeni_tarih = date('Y-m-d', strtotime($tarih . '+' . $erteleay . 'months'));
    } else if (!empty($erteletarih)) {
        $yeni_tarih = date('Y-m-d', strtotime($erteletarih));
    }
    $query = $db->prepare("UPDATE randevular SET rTarih=:tarih WHERE rNo=:randevuid");
    $query->bindParam(':tarih', $yeni_tarih);
    $query->bindParam(':randevuid', $randevuid);
    $insert = $query->execute();
    }
    if ($insert) {
        header("Location:../views/randevular.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
        exit();
    }
}

if (isset($_POST['islemeklepersonel'])) {
    $randevuid = $_POST['randevuid'];
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM islemler WHERE islemNo = '$number'";
    $result = $db->query($sql);

    // Sonuç var mı yok mu kontrol et
    if ($result->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    } else {
        $hizmetler = $_POST['hizmetler'];
        $hizmetler = explode(",", $hizmetler);
        $hizmetler_str = serialize($hizmetler);

        $yapilanislem = $_POST['urunler'];
        $yapilanislem = explode(",", $yapilanislem);
        $yapilanislem_str = serialize($yapilanislem);
        //
        $query = $db->prepare("INSERT INTO islemler SET
      	islemNo = :islemno,
    	islemMusteriNo = :musterino,
        islemYapanKisi = :yapankisi,
        islemUcret = :ucret,
        islemIndirimliFiyat = :indirimlifiyat,
        islemTuru = :hizmetturu,
        islemKullanilanUrun = :kullanilanurunler,
        islemNot = :islemnot,
        islemRandevu = :islemrandevu
                ");

        $insert = $query->execute(array(
            "islemno" => $number,
            "musterino" => $_POST['musterino'],
            "yapankisi" =>  $_SESSION['kullanici'],
            "ucret" =>  $_POST['tamfiyat'],
            "indirimlifiyat" => $_POST['indirimlifiyat'],
            "hizmetturu" => $hizmetler_str,
            "kullanilanurunler" => $yapilanislem_str,
            "islemnot" => $_POST['islemnotlari'],
            "islemrandevu" => $_POST['randevuid']
        ));


        $musterino = $_POST['musterino'];
    }
    if ($insert) {
        if (in_array("Bakım", $hizmetler)) {
            $yapilanislem = $_POST['urunler'];
            $yapilanislem = explode(",", $yapilanislem);

            $yapilanislem_json = json_encode($yapilanislem);
            $islemtarihi = date("Y-m-d");
            $periyot = $_POST['periyot'];
            $query = $db->prepare("UPDATE musteriler SET  mSonrakiBakim = :sonrakibakimtarihi,mSonIslem =:sonislem,mKullanilanUrun = :urun WHERE mMusteriNo = :musterino");

            $insert = $query->execute(array(
                "sonrakibakimtarihi" => date("Y-m-d", strtotime($islemtarihi . ' + ' . $periyot . ' month')),
                "sonislem" => $islemtarihi,
                "urun" => $yapilanislem_json,
                "musterino" => $musterino

            ));
        }
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
        if (!empty($_POST['indirimlifiyat'])) {
            $fiyat = $_POST['tamfiyat'];
            $indirimlifiyat = $_POST['indirimlifiyat'];
            $indirim = $fiyat - $indirimlifiyat;
        } else if (empty($_POST['indirimlifiyat'])) {
            $indirim = 0;
        }
        $query = $db->prepare("INSERT INTO servismuhasebe SET
                 sIslemNo = :islemno,
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
            "tutar" =>  $_POST['tamfiyat'],
            "indirim" => $_POST['indirimlifiyat'],
            "yapilanindirim" => $indirim,
            "tahsilat" => $_POST['tahsilat'],
            "veresiye" => $_POST['veresiye'],
            "tarih" => date("Y-m-d"),
            "servisturu" => $hizmetler_str,
            "personel" => $_SESSION['kullanici']
        ));

        $durum = "2";
        $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
        $query->bindParam(':durum', $durum);
        $query->bindParam(':id', $randevuid);
        $update = $query->execute();
        $last_id = $db->lastInsertId();
        header("Location:../views/personel/index.php?no=$musterino&yt=basarili");
        exit();
    } else {

        header("Location:../views/personel/index.php?no=$musterino&yt=basarisiz");
        exit();
    }
}

if (isset($_POST['satisekle'])) {
    $randevuid = $_POST['randevuid'];
    $bugun = date("Y-m-d");
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);

    // SatisNo'nun benzersiz olduğundan emin olun
    $query = $db->prepare("SELECT * FROM satislar WHERE satisNo = :satisno");
    $query->bindParam(':satisno', $number);
    $query->execute();

    while ($query->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
        $query->execute();
    }

    $musterino = $_POST['musterino'];
    $urunler = $_POST['satisurunler'];
    $urunler = explode(",", $urunler);
    $urunler_str = serialize($urunler);
    $satis = array("Satış");
    $satis = serialize($satis);

    // Satislar tablosuna yeni kayıt ekle
    $query = $db->prepare("INSERT INTO satislar SET
        satisNo = :satisno,
        sMID = :musterino,
        sUrun = :kullanilanurunler,
        sGarantiSuresi = :garanti,
        sGarantiBitis = :gbitis,
        sTutar = :ucret,
        sIndirimliTutar = :indirimlifiyat,
        sReferans = :referans,
        sNot = :notlar,
        sRandevu = :randevu
    ");

    $insert = $query->execute(array(
        "satisno" => $number,
        "musterino" => $_POST['musterino'],
        "kullanilanurunler" => $urunler_str,
        "garanti" => $_POST['garanti'],
        "gbitis" => date('Y-m-d', strtotime(' + ' . $_POST['garanti'] . ' years')),
        "ucret" => $_POST['stamfiyat'],
        "indirimlifiyat" => $_POST['sindirimlifiyat'],
        "referans" => $_POST['referans'],
        "notlar" => $_POST['notlar'],
        "randevu" => $_POST['randevuid']
    ));

    if ($insert) {
        $indirim = 0;

        if (!empty($_POST['sindirimlifiyat'])) {
            $fiyat = $_POST['stamfiyat'];
            $indirimlifiyat = $_POST['sindirimlifiyat'];
            $indirim = $fiyat - $indirimlifiyat;
            $indirimlifiyat = $_POST['sindirimlifiyat'];
        } else {
            $indirimlifiyat = null;
        }

        // Servismuhasebe tablosuna yeni kayıt ekle
        $query2 = $db->prepare("INSERT INTO servismuhasebe SET
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

        $query2->execute(array(
            "islemno" => $number,
            "musterino" => $_POST['musterino'],
            "tutar" => $_POST['stamfiyat'],
            "indirim" => $indirimlifiyat,
            "yapilanindirim" => $indirim,
            "tahsilat" => $_POST['satistahsilat'],
            "veresiye" => $_POST['veresiye'],
            "tarih" => $bugun,
            "servisturu" => $satis,
            "personel" => $_SESSION['kullanici']
        ));
        if ($query2->errorCode() != "00000") {
            $errorInfo = $query2->errorInfo();
            echo "Hata: " . $errorInfo[2];
        }
        if (!empty($_POST['veresiye'])) {
            // Veresiye tablosuna yeni kayıt ekle
            $query = $db->prepare("INSERT INTO veresiye SET
                vSatisNo = :islemno,
                vMusteriNo = :musterino,
                vTutar = :veresiye,
                vDurum = :durum,
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

        $durum = "3";

        // Randevular tablosunu güncelle
        $query = $db->prepare("UPDATE randevular SET rDurum = :durum WHERE rNo = :id");
        $query->bindParam(':durum', $durum);
        $query->bindParam(':id', $randevuid);
        $update = $query->execute();
        $last_id = $db->lastInsertId();
        header("Location:../views/randevular.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
        exit();
    }
}

if (isset($_POST['satiseklepersonel'])) {
    $randevuid = $_POST['randevuid'];
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM satislar WHERE satisNo= '$number'";
    $result = $db->query($sql);

    if ($result->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    } else {
        $musterino = $_POST['musterino'];
        $urunler = $_POST['satisurunler'];
        $urunler = explode(",", $urunler);
        $urunler_str = serialize($urunler);
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
            sRandevu = :randevu
                    ");

        $insert = $query->execute(array(
            "satisno" => $number,
            "musterino" => $_POST['musterino'],
            "kullanilanurunler" => $urunler_str,
            "garanti" => $_POST['garanti'],
            "gbitis" => date('Y-m-d', strtotime(' + ' . $_POST['garanti'] . ' years')),
            "ucret" =>  $_POST['stamfiyat'],
            "indirimlifiyat" => $_POST['sindirimlifiyat'],
            "referans" => $_POST['referans'],
            "randevu" => $_POST['randevuid']
        ));



        if ($insert) {

            $indirim = 0;

            if (!empty($_POST['sindirimlifiyat'])) {
                $fiyat = $_POST['stamfiyat'];
                $indirimlifiyat = $_POST['sindirimlifiyat'];
                $indirim = $fiyat - $indirimlifiyat;
                $indirimlifiyat = $_POST['sindirimlifiyat'];
            } else {
                $indirimlifiyat = null;
            }

            // Servismuhasebe tablosuna yeni kayıt ekle
            $query2 = $db->prepare("INSERT INTO servismuhasebe SET
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

            $query2->execute(array(
                "islemno" => $number,
                "musterino" => $_POST['musterino'],
                "tutar" => $_POST['stamfiyat'],
                "indirim" => $indirimlifiyat,
                "yapilanindirim" => $indirim,
                "tahsilat" => $_POST['satistahsilat'],
                "veresiye" => $_POST['veresiye'],
                "tarih" => $bugun,
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
            $durum = "3";
            $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
            $query->bindParam(':durum', $durum);
            $query->bindParam(':id', $randevuid);
            $update = $query->execute();
            $last_id = $db->lastInsertId();
            header("Location:../views/randevular.php?no=$musterino&yt=basarili");
            exit();
        } else {

            header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
            exit();
        }
    }
}
if ($_GET['iptal'] == "evet") {
    $query1 = $db->prepare("DELETE FROM randevular WHERE rNo = :rid");
    $delete = $query1->execute(array(
        'rid' => $_GET['randevuid']
    ));


    if ($delete) {
        header("Location:../views/randevular.php?yt=basarili");
        exit();
    } else {
        header("Location:../views/randevular.php?yt=basarisiz");
        exit();
    }
}
