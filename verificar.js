function validar1() {
    let cont=document.getElementById("contrasena");

    if(cont.value.length === 0) {
        cont.style.borderColor="red";
    }
    else {
        cont.style.borderColor="green";
    }
}

function validar2() {
    let cont=document.getElementById("contrasena");
    let confir=document.getElementById("contConfir");

    if(cont.value.length === 0 || confir.value.length === 0 || cont.value !== confir.value) {
        cont.style.borderColor="red";
        confir.style.borderColor="red";
    }
    else {
        cont.style.borderColor="green";
        confir.style.borderColor="green";
        document.getElementById("save").disabled=false;
    }
}