<?php
$con = new PDO('mysql:host=localhost; dbname=mes_liens', "root", "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn = mysqli_connect("localhost", "root", "", "mes_liens");
if (mysqli_connect_errno()) {
    echo "Erreur de connexion : " . mysqli_connect_errno();
    exit();
}
