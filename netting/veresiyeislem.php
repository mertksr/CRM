<?php
include 'connect.php';

if (isset($_POST['tahsilatekle'])) {

    $tutar = $_POST['tutar'];
    $alinan = $_POST['tahsilat'];
    $not = $_POST['not'];
    $tarih = $_POST['tarih'];
    $veresiyeno = $_POST['veresiyeno'];
    $kalan = $tutar - $alinan;

    $query = $db->prepare("UPDATE veresiye SET vAlinan=:alinan,vNot=:vnot,vKalan=:kalan WHERE vId=:veresiyeno");
    $query->bindParam(':alinan', $alinan);
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
if (isset($_POST['veresiyesil'])) {

    $durum = 0;
    $veresiyeno = $_POST['veresiyeno'];
    $query = $db->prepare("UPDATE veresiye SET vDurum=:durum WHERE vId=:veresiyeno");
    $query->bindParam(':durum', $durum);
    $query->bindParam(':veresiyeno', $veresiyeno);
    $update = $query->execute();


    if ($insert) {
        $last_id = $db->lastInsertId();
        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarili");
        exit();
    } else {

        header("Location:../views/veresiye.php?no=$veresiyeno&yt=basarisiz");
        exit();
    }
}
