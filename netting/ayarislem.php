<?php
include 'connect.php';
print_r($_POST);
if (isset($_POST['borcdegistir'])) {
    $borcekle = $_POST['borcekle'];
    $borcdus = $_POST['borcdus'];
    $not = $_POST['not'];
$borc = 0;
$tip = 0;
    if (!empty($borcekle) && empty($borcdus) && $borcekle > 0) {
        
        $borc = $borcekle;
        $tip = 0;
    } else if (!empty($borcdus) && empty($borcekle) && $borcdus > 0){
        $borc = $borcdus;
        $tip = 1;
    }
    $query = $db->prepare("INSERT INTO sirketborcu SET bMiktar=:borc, bTip=:tip, bNot=:bnot");
    $query->bindParam(':borc', $borc);
    $query->bindParam(':tip', $tip);
    $query->bindParam(':bnot', $not);
    $insert = $query->execute();

    if ($insert) {
        header("Location: ../views/muhasebe.php?yt=basarili");
        exit();
    } else {
        header("Location: ../views/muhasebe.php?yt=basarisiz");
        exit();
    }
}
?>
