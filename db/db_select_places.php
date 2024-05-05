<?php

include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/db/db_connect.php');

$sql = "SELECT DISTINCT community 
        FROM places";

    $result = mysqli_query($conn,$sql);
    $communities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>