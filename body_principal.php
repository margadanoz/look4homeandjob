
<script src="/proyecto_scrapeo/scripts/principalSearcher.js"></script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/db/db_select_places.php');
?>
<style> 
    #btnSearcher{
        background-color: #77C7F8 !important;
        color: white;
    }
    #btnSearcher:hover{
            transform: scale(1.1);
            transform: transition 0.3 ease;
          }
</style>
<!-- Buscador dinámico -->
<div class="row"></div>
<div class="container-fluid pt-3 pb-3 text-center">
    <div class="row justify-content-center">
            <label for="lugar">Introduce el lugar donde quieras buscar trabajo y residencia</label>
            <form name="formData" style="width:50%;">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="community">Comunidad Autónoma:</label>
                    <select class="form-select" name="community" id="community" required onchange="principalSearcher()">
                        <option value="" selected></option>
                        <?php                 
                        foreach($communities as $community):
                            echo '<option value="'.$community['community'].'">'.$community['community'].'</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
                <!-- resultado dinámico en función de la comunidad autónoma que seleccionen -->
                <div class="input-group mb-3 mx-auto">
                    <label class="input-group-text" for="provinces">Provincia:</label>
                    <select class="form-select" name="provinces" id="provinces" required>
                        <option name="province" value="province" selected></option>
                        <!-- <option name="province" value=""></option> -->
                    </select>
                </div>
            </form>
            <div class="row justify-content-center">   
            <form action="" method="post" style="width:50%;">
                <!-- Parte de buscador de sector laboral -->
                <div class="input-group mb-3 mx-auto">
                    <label class="input-group-text" for="job">Sector laboral:</label>
                    <select class="form-select" name="job" id="job" required>
                        <option name="job" value="job" selected></option>
                        <!-- <option name="province" value=""></option> -->
                    </select>
                </div>
                <button id="btnSearcher" type="submit" class="btn btn-primary">Buscar</button>
            </form>
            </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/proyecto_scrapeo/footer.php'); ?>


