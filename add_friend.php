<div class="add-friend-wrapper">
    <h1 class="friend-h1">AÑADIR AMIGO</h1>
    <p>Puedes añadir a un amigo con su Discord Tag. iDistingue entre mAyÚsCuLaS y MiNúScUlAs!</p>
    <form method="post" action="friend_request.php" id="friend-form">
        <input type="text" id="addfriend" name="friend_info" required placeholder="Introduce un nombre de usuario#0000"  class="friend-black">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input class="add-friend-submit"  type="button" value="Enviar solicitud de amistad" id="add-friend-button">
    </form>
    <p id="err-msg"></p>
</div>

<script>
    let almo = false;
    const addbutton = document.getElementById("add-friend-button");
    const inputUsuario = document.getElementById("addfriend");
    const err_place = document.getElementById("err-msg");
    const form = document.getElementById("friend-form");

    inputUsuario.addEventListener("input", () => {
        const usuario = inputUsuario.value;
        err_place.classList.remove("block");
        form.classList.remove("form-friend-error");
        if(usuario != ""){
            addbutton.classList.add("add-friend-active");
        }
        else{
            addbutton.classList.remove("add-friend-active");
        }
        inputUsuario.placeholder = "hola";
        if (usuario.includes("#")) {
            almo = true;
            let digits = usuario.split("#")[1];
            if (isNaN(digits) || digits.length == 5) {
                inputUsuario.value = usuario.slice(0, -1); // elimina el último carácter del input
            }
            if(digits.length == 4){
                addbutton.setAttribute('type', 'submit');
            }
            else{
                addbutton.setAttribute('type', 'button');
            }
        }
        else{
            almo = false;
        }
    });

    addbutton.addEventListener('click', () => {
        if(addbutton.type == 'button'){
            form.classList.add("form-friend-error");
            form.classList.remove("friend-black");
            err_place.classList.add("block");
            if(almo){
                err_place.innerHTML = "Mmm, no ha funcionado. Asegúrate de que el uso de las mayúsculas, Ia ortografía, los espacios y los números sean correctos.";
            }
            else{
                err_place.innerHTML = "Necesitamos la etiqueta de cuatro dígitos de a para saber cuál de todos es.";
            }
        }
    });
</script>