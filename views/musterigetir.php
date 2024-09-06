<?php
header('Content-Type: application/json; charset=utf-8');

$table = "musteriler";
$primaryKey = 'mSatirId';

setlocale(LC_TIME, 'tr_TR.UTF-8');
date_default_timezone_set('Europe/Istanbul'); // Türkiye için zaman dilimini ayarla

$columns = array(
    array('db' => 'mAdSoyad', 'dt' => 0),
    array('db' => 'mBolge', 'dt' => 1),
    array('db' => 'mSonIslem', 'dt' => 2, 'formatter' => function($date, $row) {
        if (!empty($date)) {
            return date('d.m.Y', strtotime($date));
        } else {
            return 'Bakım Bilgisi Yok';
        }
    }),
    array('db' => 'mPeriyot', 'dt' => 3, 'formatter' => function($periyot, $row) {
        return $periyot . ' Ay';
    }),
    array('db' => 'mSonrakiBakim', 'dt' => 4, 'formatter' => function($sonrakiBakim, $row) {
        if (!empty($sonrakiBakim)) {
            $tarih = new DateTime($sonrakiBakim);
            $aylar = array(
                'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran',
                'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
            );
            $formattedTarih = $aylar[$tarih->format('n') - 1] . ' ' . $tarih->format('Y');
            return mb_strtoupper($formattedTarih, 'UTF-8');
        } else {
            return 'Bakım Bilgisi Yok';
        }
    }),
    array('db'=>'mMusteriNo','dt'=>5, 'formatter'=>function($id,$row){
        return "<div class='text-center'  style='max-width:25px;'>
                    <button type='button' name='detay' value='detay' data-id='{$id}' id='{$id}' class='btn btn-ozel mr-2 detay'>
                        <i class='fa-solid fa-address-book'></i>
                    </button>
                </div>";
    }),
    array('db'=>'mMusteriNo','dt'=>6, 'formatter'=>function($id){
        return "<div class='text-center' style='max-width:25px;'>
                 <button type='button' id='randevueklemodalbtn' class='btn special1 mr-2' style='color:#EFF5F5;' data-musterino='{$id}' data-bs-toggle='modal' data-bs-target='#randevueklemodal'>
                    <i class='fa-solid fa-calendar-plus'></i>
                </button>
                </div>";
    }),
    array('db'=>'mMusteriNo','dt'=>7, 'formatter'=>function($id){
        return "<div class='text-center' style='max-width:25px;'>
         <a class='btn btn-ozel mr-2 musteriduzenlebtn' href='islemler.php?no={$id}'>
            <i class='fa-solid fa-gears'></i>
        </a>
    </div>";
    }),
    array('db'=>'mMusteriNo','dt'=>8, 'formatter'=>function($id){
        return "<div class='text-center' style='max-width:25px;'>
        <a  class='btn btn-ozel mr-2' style='color:#EFF5F5;' href='satislar.php?no={$id}'>
        <i class='fas fa-sack-dollar'></i>
        </a>
    </div>";
    }),
    array('db'=>'mMusteriNo','dt'=>9, 'formatter'=>function($id,$row){
        return "<div class='btn-group dznlertele' style='max-width:200px;'>
        <a class='btn btn-dark btn-sm btn-ozel' href='musteriduzenle.php?no={$id}'>DÜZENLE</a>
        <a class='btn btn-sm btn-ozel btn-outline' data-bs-toggle='modal' id='ertelemodalbtn' data-musterino='{$id}' data-bakimtarihi='{$row['mSonrakiBakim']}' data-bs-target='#ertele'>
    ERTELE
    </a>
    </div>";
    })
);

require '../public/serverSide/ssp.class.php';

$dbhDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'pinarmy1_pinarmys',
    'charset' => 'utf8mb4'
);

echo json_encode(
    SSP::simple($_GET, $dbhDetails, $table, $primaryKey, $columns),
    JSON_UNESCAPED_UNICODE
);