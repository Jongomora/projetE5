<?php

try
{
    $con = new PDO('mysql:host=localhost;dbname=bd_gsb;charset=utf8','root','');

} catch (Exception $e) {
    die('Erreur :'. $e->getMessage());
}
finally{

    }