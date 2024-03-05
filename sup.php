<?php
$id = $_GET["id"];

if (!empty($id) && is_numeric($id)) {
    include('bd.php');
    $query = "delete from liste where id=$id";
    $con->query($query);
    header("Location:listes.php?id=$id");
}
