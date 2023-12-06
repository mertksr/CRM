<?php
include 'connect.php';

if (isset($_POST['tahsilatekle'])) {

    $eskialinan = $_POST['alinan'];
    $tutar = $_POST['tutar'];
    $alinan = $_POST['tahsilat'];
    $not = $_POST['not'];
    $tarih = $_POST['tarih'];
    $veresiyeno = $_POST['veresiyeno'];

    $tahsilat;
    if (!empty($eskialinan)) {
        $tahsilat = $eskialinan + $alinan;
        $kalan = $tutar - $tahsilat;
    } else {
        $tahsilat = $alinan;
        $kalan = $tutar - $tahsilat;
    }
    $query = $db->prepare("UPDATE veresiye SET vAlinan=:alinan,vNot=:vnot,vKalan=:kalan WHERE vId=:veresiyeno");
    $query->bindParam(':alinan', $tahsilat);
    $query->bindParam(':vnot', $not);
    $query->bindParam(':kalan', $kalan);
    $query->bindParam(':veresiyeno', $veresiyeno);
    $update = $query->execute();



    $iquery = $db->prepare("INSERT INTO veresiyetahsilat SET
    	vtVeresiyeNo = :veresiyeno,
        vtTahsilat = :tahsilat,
        vtTarih = :tarih

");

    $insert = $iquery->execute(array(
        "veresiyeno" => $_POST['veresiyeno'],
        "tahsilat" => $_POST['tahsilat'],
        "tarih" => $_POST['tarih']
    ));
    if ($insert) {
        $last_id = $db->lastInsertId();
        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarili");
        exit();
    } else {

        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarisiz");
        exit();
    }
}
if (isset($_POST['veresiyeiptal'])) {
    $veresiyeno = $_POST['veresiyeno'];
    $query = $db->prepare("DELETE FROM veresiye WHERE vId = :vid");
    $delete = $query->execute(array(
        'vid' => $veresiyeno
    ));
    if ($delete) {

        header("Location:../views/veresiye.php?yt=basarili");
        exit();
    } else {

        header("Location:../views/veresiye.php?yt=basarisiz");
        exit();
    }
}
if (isset($_POST['veresiyesil'])) {
    $bugun = date("Y-m-d");
    $durum = 0;
    $veresiyeno = $_POST['veresiyeno'];
    $query = $db->prepare("UPDATE veresiye SET vDurum=:durum WHERE vId=:veresiyeno");
    $query->bindParam(':durum', $durum);
    $query->bindParam(':veresiyeno', $veresiyeno);
    $update = $query->execute();
    $odenen;
    if (!empty($_POST['veresiyekalan'])) {
        $odenen = $_POST['veresiyekalan'];
    } else {
        $odenen = $_POST['veresiyetoplam'];
    }
    $iquery = $db->prepare("INSERT INTO veresiyetahsilat SET
    vtVeresiyeNo = :veresiyeno,
    vtTahsilat = :tahsilat,
    vtTarih = :tarih

");

    $insert = $iquery->execute(array(
        "veresiyeno" => $_POST['veresiyeno'],
        "tahsilat" => $odenen,
        "tarih" => $bugun
    ));

    if ($insert) {

        $last_id = $db->lastInsertId();
        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarili");
        exit();
    } else {

        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarisiz");
        exit();
    }
}
if (isset($_POST['notduzenle'])) {
    $vnot = $_POST['vnot'];
    $rid = $_POST['veresiyeid'];
    $query = $db->prepare("UPDATE veresiye SET vNot=:vnot WHERE vId=:vid");
    $query->bindParam(':vnot', $vnot);
    $query->bindParam(':vid', $rid);
    $insert = $query->execute();

    if ($insert) {

        $last_id = $db->lastInsertId();
        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarili");
        exit();
    } else {

        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarisiz");
        exit();
    }
}
