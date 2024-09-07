<?php
include 'connect.php';

if (isset($_POST["avanskaydet"])) {
    $query = $db->prepare("INSERT INTO personelavans SET
  avansPersonel = :personel,
  avansTarih = :tarih,
  avansMiktar = :miktar
          ");

    $insert = $query->execute(array(
        "personel" => $_POST['avanspersonel'],
        "tarih" => $_POST['avanstarih'],
        "miktar" => $_POST['avansmiktar']


    ));
    if ($insert) {
        header("Location:../views/avans.php?islem=basarili");
    } else {
        header("Location:../views/avans.php?islem=basarisiz");
    }
}

if (isset($_POST["primkaydet"])) {
    $query = $db->prepare("INSERT INTO personelavans SET
        avansPersonel = :personel,
        avansTarih = :tarih,
        avansPrimMiktar = :miktar


          ");

    $insert = $query->execute(array(
        "personel" => $_POST['primpersonel'],
        "tarih" => $_POST['primtarih'],
        "miktar" => $_POST['primmiktar'],


    ));
    if ($insert) {
        header("Location:../views/avans.php?islem=basarili");
    } else {
        header("Location:../views/avans.php?islem=basarisiz");
    }
}
if (isset($_POST["maaskaydet"])) {
    $query = $db->prepare("INSERT INTO personelmaas SET
  maasPersonel = :personel,
  maasMiktar = :miktar


          ");

    $insert = $query->execute(array(
        "personel" => $_POST['maaspersonel'],
        "miktar" => $_POST['maasmiktar']


    ));
    if ($insert) {
        header("Location:../views/avans.php?islem=basarili");
    } else {
        header("Location:../views/avans.php?islem=basarisiz");
    }
}



?>