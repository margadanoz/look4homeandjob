
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Llevará a parte del insert del registro una previa de si los campos son seguros mediante función de comprobado de código malicioso -->
<?php

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_pwd = $_POST['user_pwd1'];
$existeUsuario = false;


include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/db/db_connect.php');

    // primero comprobamos que no haya el mismo nombre de usuario, qie no se repita en la web:
    $sql = "SELECT user_name
    FROM `users`
    WHERE user_name = '$user_name'";

    $resultado = mysqli_query($conn,$sql);

    $usuariosExistentes = mysqli_fetch_all($resultado,MYSQLI_ASSOC);

    // si nos devuelve más de una linea es que hay coincidencia:
    if(!empty($usuariosExistentes)){

        echo 'Ya hay un usuario registrado con su nombre, porfavor, elija otro nombre de usuario';
        
    }else{

        $sql2 = "INSERT INTO `users`
        (user_name, user_email, user_pwd)
        VALUES
        ('$user_name', '$user_email', '$user_pwd')";

        if (mysqli_query($conn, $sql2)) {
            echo "Datos insertados correctamente";
            
        } else {
            echo "Error al insertar datos: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }   
?>
