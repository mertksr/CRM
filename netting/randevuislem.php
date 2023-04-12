<?php
 include 'connect.php';

 $randevuid = $_POST['randevuid'];

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
        "musteriid" =>$musterino,
        "gorusmetarihi" =>$_POST['gorusmetarihi'],
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


 if (isset($_POST['randevukapat'])) {
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



 $randevusor = $db->prepare("SELECT * FROM randevular WHERE rNo =:id");
 $randevusor->execute(array(
    "id" => $randevuid
));
 $randevucek = $randevusor->fetch(PDO::FETCH_ASSOC);
 $musterino = $randevucek['rMID'];
 $erteleay = $_POST['erteleay'];
 $erteletarih = $_POST['erteletarih'];
 if (isset($_POST['randevuertele'])) {
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
 


