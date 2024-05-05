<?php

    $conn = mysqli_connect('localhost','root','','look4home_and_job');
    // para codificacion en utf8
    mysqli_set_charset($conn, 'utf8');
    return $conn;
?>