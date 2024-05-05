<?php

include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/db/db_connect.php');

$community = $_POST['community'];
// echo $community;

$sql = "SELECT province
        FROM places
        WHERE community = '$community'";

    $result = mysqli_query($conn,$sql);
    
    $provinces = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // devolver la respuesta para el html
    foreach($provinces as $province){
        echo '<option value="'.$province['province'].'">'.$province['province'].'</option>';
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
?>