<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/header.php'); ?>
<style>
    #btnLogin{
        margin-top: 10px;
        background-color: #77C7F8 !important;
        color: white;
    }
    #btnLogin:hover {
        transform: scale(1.1);
            transform: transition 0.3 ease;
    }
</style>
<div class="container-fluid pt-3 pb-3 text-center">
    <div class="row text-center" style="visibility: hidden;">div vacio</div>   
        <form action="../db/db_select_user_login.php" class="row justify-content-center" method="post">
        <div class="col-md-4 max-width:40%">
        <label for="user_name">Nombre de usuario:</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
            <br>
            <label for="password">Contraseña</label>
            <input type="text" class="form-control" id="password" name="password" required>
            <br>
            <div class="container-fluid d-flex justify-content-center">
              <button id="btnLogin" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
   </div>
   </div>

   <?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/footer.php'); ?>