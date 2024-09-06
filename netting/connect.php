<?php
date_default_timezone_set('Europe/Istanbul');
ob_start();
session_start();
        try {
         $db = new PDO("mysql:host=localhost;dbname=pinarmy1_pinarmys;charset=utf8", "root", "");
        } catch (PDOException $e) {
         print $e->getMessage();
        }


?>