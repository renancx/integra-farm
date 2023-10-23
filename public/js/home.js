function showLogin() {
    var loginForms = document.getElementById("login");
    var registerForms = document.getElementById("register");

    if (loginForms.style.display === "none") {
        loginForms.style.display = "block";
        registerForms.style.display = "none";
    } else {
        loginForms.style.display = "none";
    }
}

function showRegister() {
    var loginForms = document.getElementById("login");
    var registerForms = document.getElementById("register");

    if (registerForms.style.display === "none") {
        registerForms.style.display = "block";
        loginForms.style.display = "none";
    } else {
        registerForms.style.display = "none";
    }
}

function showLoteRegister() {
    var loteRegister = document.getElementById("lote-register");
    var loteRegisterButton = document.getElementById("lote-button");

    if (loteRegister.style.display === "none") {
        loteRegister.style.display = "block";
        loteRegisterButton.style.display = "none";
    } else {
        loteRegister.style.display = "none";
    }
}

function hideLoteRegister() {
    var loteRegister = document.getElementById("lote-register");
    var loteRegisterButton = document.getElementById("lote-button");

    if (loteRegister.style.display === "block") {
        loteRegister.style.display = "none";
        loteRegisterButton.style.display = "block";
    } else {
        loteRegister.style.display = "block";
    }
}