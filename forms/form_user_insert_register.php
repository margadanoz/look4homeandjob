<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/header.php') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    #errorPwds,#nombreExistente,#codigoMalicia,#errorPwd2,#errorPwd1,#errorEmail,#errorUser,#errorEmailPatron{
        display: none;
        color: red;
    }
     /* estilos para formulario */
     #divRegister{
            width: 100%;
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
          }
          #divSearcher{
            width: 100%;
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
            margin-bottom: 50px;
          }
          #formRegister{
            justify-content: center;
            width: 30%;  
            /* align-items: center;       */
          }
          .btn{
            background-color: #77C7F8 !important;
            margin: 0 auto;
          }
          #btnSearch{
            background-color: #FCA311 !important;
            color: white;
          }
          #btnRegister:hover{
            transform: scale(1.2);
            transform: transition 0.3 ease;
          }
          #btnSearch:hover{
            transform: scale(1.1);
            transform: transition 0.3 ease;
          }
          #footerEstilo{
            background-color: #586F7C;
          }
          img{
            width: 30px;
            height: 30px;
            cursor: pointer;
          }
</style>

<div class="container-fluid">
    <div id="divRegister">
        <form id="formRegister" method="post">
            <label for="user_name" class="form-label">Nombre de usuario:</label>
            <input type="text" class="form-control" name="user_name">
            <small id="errorUser">Rellene el campo,porfavor</small><br>
            <small id="nombreExistente">Su nombre ya existe, porfavor elija otro</small>
            <label for="user_email" class="form-label">Email de contacto:</label>
            <input type="text" class="form-control" name="user_email">
            <small id="errorEmail">Rellene el campo,porfavor</small><br>
            <small id="errorEmailPatron">El formato de su email no es correcto</small><br>

            <small id="requisitosPwd">Contraseña de mínimo 5 caracteres.1 minúscula,1 mayúscula y 1 número</small><br>
            <label for="user_pwd1" class="form-label">Password:</label>
            <img src="../img/ojocerrado.png" alt="">
            <input type="password" class="form-control" name="user_pwd1">
            <small id="errorPwd1">Rellene el campo,porfavor</small><br>

            <label for="user_pwd2" class="form-label">Confirme el password:</label>
            <input type="password" class="form-control" name="user_pwd2">
            <small id="errorPwd2">Rellene el campo,porfavor</small><br>
            <small id="errorPwds">Sus contraseñas no coinciden</small><br>
            <small id="codigoMalicia">Hay caracteres maliciosos en los datos insertados</small>
            <div id="respuestaServidor" style="color: black;"></div>
            <div id="divSearcher">
            <button id="btnRegister" class="btn btn-primary" style="margin:0 auto;margin-top: 30px;">Registrarse</button>
            </div>
        </form>
    </div>
</div>

<script src="../scripts/script_user_insert_register.js"></script>

