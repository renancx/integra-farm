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