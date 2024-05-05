<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/header.php'); ?>

<style>
    .container-main {
        line-height: 20px; 
        border: 1px solid #ccc;
        padding: 10px; 
    }
    /* Estilos para los botones */
    #btnPersonalPage1{
        margin-top: 10px;
        background-color: #77C7F8 !important;
        color: white;
    }
    #btnPersonalPage1:hover {
        transform: scale(1.1);
            transform: transition 0.3 ease;
    }

    #btnPersonalPage2{
        margin-top: 10px;
        background-color: #77C7F8 !important;
        color: white;
    }
    #btnPersonalPage2:hover {
        transform: scale(1.1);
            transform: transition 0.3 ease;
    }
</style>

<div class="container-fluid pt-3 pb-3 text-center">
    <div class="row text-center">
        <div class="col">
            <div class="container-main">
                <h5>Información de tu cuenta:</h5>
                <p>Nombre de usuario: <?php echo $_SESSION['user_name']; ?></p>
                <p>Email: <?php echo $_SESSION['user_email']; ?></p>
                <p>Contraseña: <?php echo $_SESSION['user_pwd']; ?></p>
            </div>
        </div>
        <div class="col">
            <button id="btnPersonalPage1" class="btn btn-primary" onclick="location.href='#'">Mis Favoritos</button>
            <br><br>
            <button id="btnPersonalPage2" class="btn btn-primary mt-2" onclick="location.href='#'">Cambiar mis datos</button>
        </div>
    </div>
</div>


