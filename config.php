<?php
$kasutaja = "kasutaja";
$dbserver = "localhost";
$andmebaas ="kasutajatugi";
$passwd = "Passw0rd";

$yhendus = mysqli_connect ($dbserver, $kasutaja, $passwd, $andmebaas);

if (!$yhendus) {
    die("Viga: " . $yhendus->connect_error);
}
?>