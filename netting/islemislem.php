<?php
 include 'connect.php';

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
    
    $query = $db->prepare("INSERT INTO islemler SET
      	islemNo = :islemno,
    	islemMusteriNo = :musterino,
        islemYapanKisi = :yapankisi,
        islemUcret = :ucret,
        islemTuru = :hizmetturu,
        islemPeriyot = :periyot,
        islemNot = :islemnot
                ");

    $insert = $query->execute(array(
        "islemno" =>$number,
        "musterino" =>$_POST['musterino'],
        "yapankisi" => $_POST['islemyapan'],
        "ucret" => $_POST['islemucreti'],
        "hizmetturu" => $hizmetler_str,
        "periyot" => $_POST['periyot'],
        "islemnot" => $_POST['islemnotlari']
    ));
    
    $yapilanislem = $_POST['kullanilanurunler'];
    $last_id = $db->lastInsertId();
    for($i=0; $i<count($yapilanislem); $i++){
        $query = $db->prepare("INSERT INTO kullanilanurun SET
        musteriNo = :musterino,
        islemNo = :islemno,
        kullanilanUrunId = :urunid
        ");
        $insert = $query->execute(array(
            "musterino" => $_POST['musterino'],
            "islemno" => $number,
            "urunid" => $yapilanislem[$i]
        ));
        } 
        $musterino = $_POST['musterino'];

        $izin_verilen_uzantilar = array("jpg", "jpeg", "png", "gif");
        $dosya_sayisi = count($_FILES["resimler"]["name"]);
        $dosya_adlari = array(); // resim dosya adlarını depolamak için bir dizi oluşturun
    
        for($i=0; $i < $dosya_sayisi; $i++) {
            $basamak= 10;
            $num = str_pad(mt_rand(1, pow(10, $basamak) - 1), $basamak, '0', STR_PAD_LEFT);
            $dosya_adi = $num . $_FILES["resimler"]["name"][$i];
            $gecici_dosya = $_FILES["resimler"]["tmp_name"][$i];
            $hata = $_FILES["resimler"]["error"][$i];
    
            if($hata > 0) {
                die("Resimler yüklenirken bir hata oluştu.");
            }
            else {
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
          header("Location:../views/islemler.php?no=$musterino&yt=basarili");
          exit();

    } else {

         header("Location:../views/islemekle.php?no=$musterino&yt=basarisiz");
         exit();
    }
}
?>