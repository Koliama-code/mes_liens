<?php
include("bd.php");

if (isset($_POST['recherche'])) {
    $Descri = $_POST['recherche'];

    $sql = "SELECT * FROM liste WHERE Descri Like '$recherche%'";
    $query = mysqli_query($conn, $sql);
    $data = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $data .= "<tr><td>" . $row['id'] . "</td><td>" . $row['Descri'] . "</td><td>" . $row['liens'] . "</td></tr>";
    }
    echo $data;
}
