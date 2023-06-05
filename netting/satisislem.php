<?php
include 'connect.php';

if (isset($_POST['satisekle'])) {


    $musterino = $_POST['musterino'];

    $yapilanislem = $_POST['kullanilanurunler'];
    $yapilanislem_str = serialize($yapilanislem);
    $query = $db->prepare("INSERT INTO satislar SET
     
    	sMID = :musterino,
        sUrun = :kullanilanurunler,
        sGarantiSuresi = :garanti,
        sGarantiBitis = :gbitis,
        sTutar = :ucret,
        sIndirimliTutar = :indirimlifiyat,
sReferans = :referans,
        sNot = :notlar
                ");

    $insert = $query->execute(array(

        "musterino" => $_POST['musterino'],
        "kullanilanurunler" => $yapilanislem_str,
        "garanti" => $_POST['garanti'],
        "gbitis" => date('Y-m-d', strtotime(' + ' . $_POST['garanti'] . ' years')),
        "ucret" =>  $_POST['tamfiyat'],
        "indirimlifiyat" => $_POST['indirimlifiyat'],
        "referans" => $_POST['referans'],


        "notlar" => $_POST['notlar']
    ));



    if ($insert) {
        $last_id = $db->lastInsertId();
        header("Location:../views/satislar.php?no=$musterino&yt=basarili");
        exit();
    } else {

        header("Location:../views/satislar.php?no=$musterino&yt=basarisiz");
        exit();
    }
}
