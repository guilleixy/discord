let active_div = "en-linea";

document.getElementById(active_div).style.display = "block";

document.getElementById("all-friends").style.display = "none";
document.getElementById("pendientes").style.display = "none";
document.getElementById("bloqueados").style.display = "none";
document.getElementById("anadir-amigos").style.display = "none";

let old = document.getElementById(active_div);

let old_button = document.querySelector('.en-linea');

old_button.classList.add('nav-button-active');

function handle_nav(id){
    const dir = "." + id;
    const active = document.getElementById(id);
    const boton = document.querySelector(dir);
    if(boton == old_button){
        console.log("mismo boton");
    }else{
        if(boton.classList.contains('anadir-amigos-boton')){
            boton.classList.add('anadir-amigos-boton-active');
        }
        else{
            boton.classList.add('nav-button-active');
        }

        if(old_button.classList.contains('anadir-amigos-boton-active')){
            old_button.classList.remove('anadir-amigos-boton-active')
        }
        else{
            old_button.classList.remove('nav-button-active');
        }
    }

    old.style.display = "none";

    active.style.display = "block";

    old = document.getElementById(id);

    old_button = boton;
}