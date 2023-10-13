<?php
include 'connect.php';

if (isset($_POST['islemekle'])) {
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM islemler WHERE islemNo = :number";

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':number', $number, PDO::PARAM_STR);
        $query->execute();

        // Sonuç var mı yok mu kontrol et
        if ($query->rowCount() > 0) {
            $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
        } else {
            // Diğer işlemleri burada devam ettirin
            // ...

            // Örnek: Veritabanına veri ekleme
            $hizmetler = $_POST['hizmetler'];
            $hizmetler_str = serialize($hizmetler);
            $yapilanislem = $_POST['kullanilanurunler'];
            $yapilanislem_str = serialize($yapilanislem);

            $query = $db->prepare("INSERT INTO islemler SET
                islemNo = :islemno,
                islemMusteriNo = :musterino,
                islemYapanKisi = :yapankisi,
                islemUcret = :ucret,
                islemIndirimliFiyat = :indirimlifiyat,
                islemTuru = :hizmetturu,
                islemKullanilanUrun = :kullanilanurunler,
                islemNot = :islemnot
            ");

            $insert = $query->execute(array(
                "islemno" => $number,
                "musterino" => $_POST['musterino'],
                "yapankisi" => $_POST['islemyapan'],
                "ucret" => $_POST['tamfiyat'],
                "indirimlifiyat" => $_POST['indirimlifiyat'],
                "hizmetturu" => $hizmetler_str,
                "kullanilanurunler" => $yapilanislem_str,
                "islemnot" => $_POST['islemnotlari']
            ));




            $musterino = $_POST['musterino'];



            if ($insert) {
                $yapilanislem = $_POST['kullanilanurunler'];
                $yapilanislem_json = json_encode($yapilanislem);
                if (in_array("Bakım", $_POST['hizmetler'])) {
                    $islemtarihi = date("Y-m-d");
                    $periyot = $_POST['periyot'];
                    $query = $db->prepare("UPDATE musteriler SET mSonrakiBakim = :sonrakibakimtarihi,mSonIslem =:sonislem,mKullanilanUrun = :urun WHERE mMusteriNo = :musterino");

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
                    vNot = :notlar
                
                          ");
            
                    $insert = $query->execute(array(
                        "islemno" => $number,
                        "musterino" => $_POST['musterino'],
                        "veresiye" => $_POST['veresiye'],
                        "durum" => 1,
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
                        sTuru = :tur,
                        sPersonel = :personel
                    ");

                $insert = $query->execute(array(
                    "islemno" => $number,
                    "musterino" => $_POST['musterino'],
                    "tutar" => $_POST['tamfiyat'],
                    "indirim" => $_POST['indirimlifiyat'],
                    "yapilanindirim" => $indirim,
                    "tahsilat" => $_POST['tahsilat'],
                    "veresiye" => $_POST['veresiye'],
                    "tarih" => date("Y-m-d"),
                    "tur" => $hizmetler_str,
                    "personel" => $_POST['islemyapan']
                ));
                $last_id = $db->lastInsertId();
                header("Location:../views/islemler.php?no=$musterino&yt=basarili");
                die(); // Skriptin sonunu işaretle
            } else {
                header("Location:../views/islemler.php?no=$musterino&yt=basarisiz");
                die(); // Skriptin sonunu işaretle
            }
        }
    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }
}
/*
if (isset($_POST['islemeklepersonel'])) {
    $num_of_digits = 6;
    $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    $sql = "SELECT * FROM islemler WHERE islemNo = '$number'";
    $result = $db->query($sql);
        
             // Sonuç var mı yok mu kontrol et
    if ($result->rowCount() > 0) {
        $number = str_pad(mt_rand(1, pow(10, $num_of_digits) - 1), $num_of_digits, '0', STR_PAD_LEFT);
    } else {
        
        $hizmetler = $_POST['hizmetler'];
        $hizmetler_str = serialize($hizmetler);
        $yapilanislem = $_POST['kullanilanurunler'];
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
        islemNot = :islemnot
                ");

    $insert = $query->execute(array(
        "islemno" =>$number,
        "musterino" =>$_POST['musterino'],
        "yapankisi" =>  $_SESSION['kullanici'],
        "ucret" =>  $_POST['tamfiyat'],
        "indirimlifiyat" => $_POST['indirimlifiyat'],
        "hizmetturu" => $hizmetler_str,
        "kullanilanurunler" => $yapilanislem_str,
        "islemnot" => $_POST['islemnotlari']
    ));
    

        $musterino = $_POST['musterino'];

if(in_array("Periyodik Bakım", $_POST['hizmetler'])){
    $islemtarihi = date("Y-m-d");
    $periyot= $_POST['periyot'];
    $query = $db->prepare("UPDATE musteriler SET mSonrakiBakim = :sonrakibakimtarihi WHERE mMusteriNo = :musterino");

$insert = $query->execute(array(
  "sonrakibakimtarihi" => date("Y-m-d", strtotime($islemtarihi . ' + '.$periyot.' month')),
  "musterino" =>$musterino

));
}

$rno = $_POST['rno'];

    $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
    $query->bindParam(':durum', $durum);
    $query->bindParam(':id', $rno);
    $durum = "0";
    $update = $query->execute();



        $izin_verilen_uzantilar = array("jpg", "jpeg", "png", "gif");
        $dosya_sayisi = count($_FILES["resimler"]["name"]);
        $dosya_adlari = array(); // resim dosya adlarını depolamak için bir dizi oluşturun
    
        for($i=0; $i < $dosya_sayisi; $i++) {
            $basamak= 10;
            $num = str_pad(mt_rand(1, pow(10, $basamak) - 1), $basamak, '0', STR_PAD_LEFT);
            $dosya_adi = $num . $_FILES["resimler"]["name"][$i];
            $gecici_dosya = $_FILES["resimler"]["tmp_name"][$i];
            $hata = $_FILES["resimler"]["error"][$i];
    
            if($hata > 0 && $hata != 4) {
                die("Resimler yüklenirken bir hata oluştu.");
            }
            else if($hata != 4) {
                $dosya_uzantisi = pathinfo($dosya_adi, PATHINFO_EXTENSION);
    
                if(in_array($dosya_uzantisi, $izin_verilen_uzantilar)) {
                    move_uploaded_file($gecici_dosya, "../public/uploads/" . $dosya_adi);
                    echo $dosya_adi . " isimli dosya yüklendi.<br>";
                    $dosya_adlari[] = $dosya_adi; // dosya adını dizide depolayın
                }
                else {
                    die("Yalnızca JPG, JPEG, PNG ve GIF formatındaki dosyalar yüklenebilir.");
                }
            }
        }
    
        // veritabanına kaydetme işlemini gerçekleştirin
     // veritabanına bağlanmak için gerekli dosyayı çağırın
     $stmt = $db->prepare("INSERT INTO dosyalar (dosyaAdi , dosyaIslemID) VALUES (:dosya_adi, :islemid)");

     foreach($dosya_adlari as $dosya_adi) {
         $stmt->execute(array(
             ':dosya_adi' => $dosya_adi,
             ':islemid' => $number
         ));
     }
    }
    if ($insert) {
        $last_id = $db->lastInsertId();
          header("Location:../views/personel/index.php?no=$musterino&yt=basarili");
          exit();

    } else {

         header("Location:../views/personel/islemekle.php?no=$musterino&yt=basarisiz");
         exit();
    }
}*/
