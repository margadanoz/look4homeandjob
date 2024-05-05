<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/header.php'); ?>

<?php

$user_name = $_POST['user_name'];
$password = $_POST['password'];

include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/db/db_connect.php');

if(isset($user_name) && isset($password)){

    $sql = "SELECT user_name, user_pwd,user_email,user_id,user_role
    FROM `users`
    WHERE user_name = '$user_name' AND user_pwd = '$password'";
    $result = mysqli_query($conn,$sql);

    $user = mysqli_fetch_assoc($result);

    if(!empty($user)){

        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_pwd'] = $user['user_pwd'];
        $_SESSION['user_role'] = $user['user_role'];

        include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/forms/form_user_personal_page.php');
    
    }else{
        echo 'No hay ningún usuario con ese nombre y contraseña, porfavor, vuelva a intentarlo o regístrese';
        echo '<a href="/proyecto_scrapeo/forms/form_user_login.php">Volver a intentarlo</a>';
        echo '<a href="/proyecto_scrapeo/forms/form_user_insert_register.php">Registrarse</a>';
    }

}else{
    echo 'Porfavor, introduzca un nombre de usuario y contraseña';
    echo '<a href="/proyecto_scrapeo/forms/form_user_login.php">Volver a intentarlo</a>';
}

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/footer.php'); ?>