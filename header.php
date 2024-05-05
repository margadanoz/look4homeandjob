<?php
    session_start();
    if (isset($_SESSION['user_role'])) {
        $user_role = $_SESSION['user_role'];
        $user_name = $_SESSION['user_name'];
    }else{
        $user_role = 'anonymous';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="../css/header.css"> -->
    <style>
        #barraNavegacion {
            background-color: #D8EFFD !important; 
            /* border-bottom: 4px solid #808080;  */
            height: 150px;
        }
    </style>
</head>
<body style="background-color: #D8EFFD">
    <!-- barra de navegación -->
    <?php if($user_role == 'anonymous'): ?>
    <nav id="barraNavegacion" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto"> <!-- Añadida clase ms-auto para alinear a la derecha -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/proyecto_scrapeo/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proyecto_scrapeo/forms/form_user_insert_register.php">Registrarme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proyecto_scrapeo/forms/form_user_login.php">Acceder</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>


<?php if($user_role == 'user'): ?>
    <nav id="barraNavegacion" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
       
            <a class="navbar-brand"> <h6>Bienvenido </h6><?php echo $_SESSION['user_name']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto"> <!-- Añadida clase ms-auto para alinear a la derecha -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/proyecto_scrapeo/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proyecto_scrapeo/forms/form_user_personal_page.php">Mi cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proyecto_scrapeo/db/db_logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>

<!-- </body> -->

