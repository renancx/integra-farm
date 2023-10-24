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

function showLoteEdit(loteID) {
    var loteEdit = document.getElementById("lote-edit-" + loteID);
    var loteEditButton = document.getElementById("lote-edit-button");

    if (loteEdit.style.display === "none") {
        loteEdit.style.display = "block";
        loteEditButton.style.display = "none";
    } else {
        loteEdit.style.display = "none";
    }
}

function hideLoteEdit(loteID) {
    var loteEdit = document.getElementById("lote-edit-" + loteID);
    var loteEditButton = document.getElementById("lote-edit-button");

    if (loteEdit.style.display === "block") {
        loteEdit.style.display = "none";
        loteEditButton.style.display = "block";
    } else {
        loteEdit.style.display = "block";
    }
}
