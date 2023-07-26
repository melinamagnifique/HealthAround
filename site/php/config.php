<?php

const HOST = 'localhost';
const DB_NAME = 'healtharound';
const USER = 'root';
const PASS = '';


try {
    $db = new PDO("mysql:host=" . HOST . ";dbname" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connexion failed";
}
?>