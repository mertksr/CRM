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
        
    
    $query = $db->prepare("INSERT INTO musteriler SET
    	islemMusteriNo = :musterino,
        islemYapanKisi = :yapankisi,
        islemPeriyot = :periyot,
        islemUcret = :ucret,
        islemNot = :islemnot,

                ");

    $insert = $query->execute(array(
        "musterino" =>$_POST['musterino'],
        "yapankisi" => $_POST['islemyapan'],
        "periyot" => $_POST['periyot'],
        "ucret" => $_POST['islemucreti'],
        "islemnot" => $_POST['islemnotlari'],
    ));
    $yapilanislem = $_POST['yapilanislem'];
    $last_id = $db->lastInsertId();
    for($i=0; $i<count($iletisimBilgisi); $i++){
        $query = $db->prepare("INSERT INTO kullanilanurun SET
        musteriNo = :musterino,
        islemNo = :islemno,
        kullanilan = :iletisimMusteriNo
        ");
        $insert = $query->execute(array(
            "musterino" => $yapilanislem[$i],
            "islemno" => $number,
            "iletisimMusteriNo" => $number
        ));
    } }
    if ($insert) {
        $last_id = $db->lastInsertId();
          header("Location:../views/islemekle.php?yt=basarili");
          exit();

    } else {

         header("Location:../views/islemekle.php?yt=basarisiz");
         exit();
    }
}
?>