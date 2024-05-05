let btnVerPwd = document.querySelector('img');
let campoPassword = document.querySelector('input[name="user_pwd1"]');
let campoPassword2 = document.querySelector('input[name="user_pwd2"]');
// campos para comprobar:
let campoUserName = document.querySelector('input[name="user_name"]');
let campoEmail = document.querySelector('input[name="user_email"]');
let errorEmailPatron = document.getElementById('errorEmailPatron');
let btnSubmit = document.getElementById('btnRegister');
let errorUser = document.querySelector('#errorUser');
let errorEmail = document.querySelector('#errorEmail');
let errorPwd1 = document.querySelector('#errorPwd1');
let errorPwd2 = document.querySelector('#errorPwd2');
let errorPwds = document.querySelector('#errorPwds');
let requisitosPwd = document.getElementById('requisitosPwd');
let codigoMalicia = document.getElementById('codigoMalicia');
let respuestaServidor = document.querySelector('#respuestaServidor');

let patronPwd = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}/;
let patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
let validoEmailPatron = false;
let pwdValidaPatron = false;
let hayMalicioso = false;
let patronMalicioso = /[\"'<>&]/;


btnVerPwd.addEventListener('click',()=>{
    // Si los campos están en tipo password les damos visibilidad:
    if(campoPassword.type === 'password' && campoPassword2.type === 'password'){

        campoPassword.type = 'text';
        campoPassword2.type = 'text';
        btnVerPwd.src = '../img/ojoabierto.png';
        
        // sino retornamos a estado original:
    }else{
        campoPassword.type = 'password';
        campoPassword2.type = 'password';
        btnVerPwd.src = '../img/ojocerrado.png';
    }
});

// comprobación de si falta algo de los campos y coinciden contraseñas
// con formato adecuado:
btnSubmit.addEventListener('click',(e)=>{

    document.querySelector('#respuestaServidor').innerHTML = '';
    e.preventDefault();

    // COMPRUEBA CAMPOS VACIOS
    // ternarios para mostrar u ocultar el mensaje de error
    // valido contiene none o block dependiendo de si ha sido true (none) 
    // o false(block porque muestra el mensaje)
    let validoName = campoUserName.value.length !== 0 ? errorUser.style.display = 'none' : errorUser.style.display = 'block';

    let validoEmail = campoEmail.value.length !== 0 ? errorEmail.style.display = 'none' : errorEmail.style.display = 'block';
  
    let validoPwd1 = campoPassword.value.length !== 0 ? errorPwd1.style.display = 'none' : errorPwd1.style.display = 'block';

    let validoPwd2 = campoPassword2.value.length !== 0 ? errorPwd2.style.display = 'none' : errorPwd2.style.display = 'block';

    // COMPRUEBA SI CUMPLEN PATRONES Y SON IGUALES LAS CONTRASEÑAS:
    if(validoPwd1 && validoPwd2){

       let sonIgualesPwd = campoPassword.value === campoPassword2.value ? true : false;

       if(!sonIgualesPwd){
            errorPwds.style.display = 'block';

       }else{

        errorPwds.style.display = 'none';
        // comprobamos los patrones de pwd
        pwdValidaPatron = patronPwd.test(campoPassword.value) ? true : false;

        if(!pwdValidaPatron){
            requisitosPwd.style.color = 'red';
            requisitosPwd.style.border = '1px solid red';
        }else{
            // comprobamos patron malicioso
            if(patronMalicioso.test(campoPassword.value)){
                hayMalicioso = true;
                codigoMalicia.style.display = 'block';
                return;
               }else{
                hayMalicioso = false;
                codigoMalicia.style.display = 'none';
               }
            requisitosPwd.style.color = 'black';
            requisitosPwd.style.border = 'none';
        }
       }
    }
    // comprobamos patrón del email
    if(validoEmail){

            validoEmailPatron = patronEmail.test(campoEmail.value) ? true : false;

            if(!validoEmailPatron){
                errorEmailPatron.style.display = 'block';

            }else{
                
                errorEmailPatron.style.display = 'none';
            }
            
           if(patronMalicioso.test(campoEmail.value)){
            hayMalicioso = true;
            codigoMalicia.style.display = 'block';
            return;
           }else{
            hayMalicioso = false;
            codigoMalicia.style.display = 'none';
           }
    }

    if(patronMalicioso.test(campoUserName.value)){
        hayMalicioso = true;
        codigoMalicia.style.display = 'block';
        return;
       }else{
        hayMalicioso = false;
        codigoMalicia.style.display = 'none';
       }
    
    // si todo esto el form está correcto llamamos a la función ajax que hace el envio del form:
    if(validoEmailPatron && pwdValidaPatron && validoName
        && !hayMalicioso){
            console.log('todo correcto');
            sendAjaxForm();
    }
});


function sendAjaxForm() {
    let formData = new FormData(document.getElementById('formRegister'));
    // console.log(formData);
    let respuestaServidor = document.querySelector('#respuestaServidor');

    // envio de datos del form
    fetch('/proyecto_scrapeo/db/db_user_insert_register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Error al insertar datos');
        }
    })
    .then(data => {  
        // console.log(data);
      respuestaServidor.innerHTML = data;
       window.location.href = '/proyecto_scrapeo/forms/form_user_login.php';
    })

    .catch(error => {
        console.error('Error en la solicitud al servidor:', error);
    });
}
