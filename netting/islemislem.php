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
        
    
    $query = $db->prepare("INSERT INTO islemler SET
      	islemNo = :islemno,
    	islemMusteriNo = :musterino,
        islemYapanKisi = :yapankisi,
        islemUcret = :ucret,
        islemPeriyot = :periyot,
        islemNot = :islemnot
                ");

    $insert = $query->execute(array(
        "islemno" =>$number,
        "musterino" =>$_POST['musterino'],
        "yapankisi" => $_POST['islemyapan'],
        "ucret" => $_POST['islemucreti'],
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