<?php
$db = new mysqli('localhost', 'root', '', 'telefon_rehberi');
if($db->connect_error){
    die("Bağlantı hatası: " . $db->connect_error);
}
?>
