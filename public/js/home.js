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

function showLoteSell(loteID) {
    var loteSell = document.getElementById("lote-sell-" + loteID);
    var loteSellButton = document.getElementById("lote-sell-button");

    if (loteSell.style.display === "none") {
        loteSell.style.display = "block";
        loteSellButton.style.display = "none";
    } else {
        loteSell.style.display = "none";
    }
}

function hideLoteSell(loteID) {
    var loteSell = document.getElementById("lote-sell-" + loteID);
    var loteSellButton = document.getElementById("lote-sell-button");

    if (loteSell.style.display === "block") {
        loteSell.style.display = "none";
        loteSellButton.style.display = "block";
    } else {
        loteSell.style.display = "block";
    }
}

function changeDescription(titleNumber) {
    const descriptions = [
    'Tenha acesso a uma plataforma de gerenciamento de lotes, onde você pode cadastrar, editar e vender lotes de forma simples e rápida.',
    'Acesse a plataforma de gerenciamento de lotes de qualquer lugar, a qualquer hora, com qualquer dispositivo.',
    'Mantenha o controle de todos os seus lotes',
    'Cadastre as vacinas aplicadas em cada lote e tenha acesso a um histórico de vacinação.'
    ];

    document.getElementById('description').innerHTML = descriptions[titleNumber - 1];
}

function showVacinas(loteID) {
    var vacinas = document.getElementById("vacina-list-" + loteID);

    if (vacinas.style.display === "none") {
        vacinas.style.display = "block";
    } else {
        vacinas.style.display = "none";
    }
}

function hideVacinas(loteID) { //fechar
    var vacinas = document.getElementById("vacina-list-" + loteID);
    var vacinaRegister = document.getElementById("new-vacina-" + loteID);

    if (vacinas.style.display === "block") {
        vacinas.style.display = "none";
        vacinaRegister.style.display = "none";
    } else {
        vacinas.style.display = "block";
    }
}

function registerVacina(loteID) {
    var vacinaRegister = document.getElementById("new-vacina-" + loteID);
    var vacinaRegisterButton = document.getElementById("vacina-register-button-" + loteID);

    if (vacinaRegister.style.display === "none") {
        vacinaRegister.style.display = "block";
        vacinaRegisterButton.style.display = "block";
    } else {
        vacinaRegister.style.display = "none";
    }
}

function hideRegisterVacinas(loteID) {
    var vacinaRegister = document.getElementById("new-vacina-" + loteID);
    var vacinaRegisterButton = document.getElementById("vacina-register-button-" + loteID);

    if (vacinaRegister.style.display === "block") {
        vacinaRegister.style.display = "none";
        vacinaRegisterButton.style.display = "block";
    } else {
        vacinaRegister.style.display = "block";
    }
}