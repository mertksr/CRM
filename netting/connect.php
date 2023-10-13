<?php
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR.UTF-8');

ob_start();
session_start();
        try {
         $db = new PDO("mysql:host=localhost;dbname=pnr;charset=utf8", "root", "");
        } catch (PDOException $e) {
         print $e->getMessage();
        }


?>