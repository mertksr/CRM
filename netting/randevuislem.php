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
        islemNot = :islemnot,
        islemRandevu = :islemrandevu

                ");

    $insert = $query->execute(array(
        "islemno" =>$number,
        "musterino" =>$_POST['musterino'],
        "yapankisi" =>  $_SESSION['kullanici'],
        "ucret" =>  $_POST['tamfiyat'],
        "indirimlifiyat" => $_POST['indirimlifiyat'],
        "hizmetturu" => $hizmetler_str,
        "kullanilanurunler" => $yapilanislem_str,
        "islemnot" => $_POST['islemnotlari'],
        "islemrandevu" => $_POST['randevuid']

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


    //     $izin_verilen_uzantilar = array("jpg", "jpeg", "png", "gif");
    //     $dosya_sayisi = count($_FILES["resimler"]["name"]);
    //     $dosya_adlari = array(); // resim dosya adlarını depolamak için bir dizi oluşturun
    
    //     for($i=0; $i < $dosya_sayisi; $i++) {
    //         $basamak= 10;
    //         $num = str_pad(mt_rand(1, pow(10, $basamak) - 1), $basamak, '0', STR_PAD_LEFT);
    //         $dosya_adi = $num . $_FILES["resimler"]["name"][$i];
    //         $gecici_dosya = $_FILES["resimler"]["tmp_name"][$i];
    //         $hata = $_FILES["resimler"]["error"][$i];
    
    //         if($hata > 0 && $hata != 4) {
    //             die("Resimler yüklenirken bir hata oluştu.");
    //         }
    //         else if($hata != 4) {
    //             $dosya_uzantisi = pathinfo($dosya_adi, PATHINFO_EXTENSION);
    
    //             if(in_array($dosya_uzantisi, $izin_verilen_uzantilar)) {
    //                 move_uploaded_file($gecici_dosya, "../public/uploads/" . $dosya_adi);
    //                 echo $dosya_adi . " isimli dosya yüklendi.<br>";
    //                 $dosya_adlari[] = $dosya_adi; // dosya adını dizide depolayın
    //             }
    //             else {
    //                 die("Yalnızca JPG, JPEG, PNG ve GIF formatındaki dosyalar yüklenebilir.");
    //             }
    //         }
    //     }
    
    //     veritabanına kaydetme işlemini gerçekleştirin
    //  veritabanına bağlanmak için gerekli dosyayı çağırın
    //  $stmt = $db->prepare("INSERT INTO dosyalar (dosyaAdi , dosyaIslemID) VALUES (:dosya_adi, :islemid)");

    //  foreach($dosya_adlari as $dosya_adi) {
    //      $stmt->execute(array(
    //          ':dosya_adi' => $dosya_adi,
    //          ':islemid' => $number
    //      ));
    }
    
    // }if ($insert) {
    //     $last_id = $db->lastInsertId();
    //       header("Location:../views/randevular.php?no=$musterino&yt=basarili");
    //       exit();

    // } else {

    //      header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
    //      exit();
    // }
}


if (isset($_POST['randevukapat'])) {
    $randevuid = $_POST['randevuid'];
    $query = $db->prepare("UPDATE randevular SET rDurum=:durum WHERE rNo=:id");
    $query->bindParam(':durum', $durum);
    $query->bindParam(':id', $randevuid);
    $durum = "0";
    $update = $query->execute();
    if ($update) {
        header("Location: ../views/randevular.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location: ../views/randevular.php?no=$musterino&yt=basarisiz");
        exit();
    }
}
if (isset($_POST['randevuata'])) {
    print_r($_POST);
    $randevuid = $_POST['randevuid'];
    $personel = $_POST['randevupersonel'];
    $query = $db->prepare("UPDATE randevular SET rPersonel=:personel WHERE rNo=:id");
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
$erteleay = $_POST['erteleay'];
$erteletarih = $_POST['erteletarih'];

    if (!empty($erteleay) && is_numeric($erteleay)) {
        $tarih = $randevucek['rTarih'];
        $yeni_tarih = date('Y-m-d', strtotime($tarih . '+' . $erteleay . 'months'));
    } else if (!empty($erteletarih)) {
        $yeni_tarih = date('Y-m-d', strtotime($erteletarih));
    }
    $query = $db->prepare("UPDATE randevular SET rTarih=:tarih WHERE rNo=:randevuid");
    $query->bindParam(':tarih', $yeni_tarih);
    $query->bindParam(':randevuid', $randevuid);
    $insert = $query->execute();

    if ($insert) {
        header("Location:../views/randevular.php?no=$musterino&yt=basarili");
        exit();
    } else {
        header("Location:../views/randevular.php?no=$musterino&yt=basarisiz");
        exit();
    }
}
