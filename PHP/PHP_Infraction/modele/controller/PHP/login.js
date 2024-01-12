document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let num_permis = document.querySelector("#num_permis");
        let password = document.querySelector("#password");
        let error = document.querySelector(".error");
        const login = new Login(document.querySelector("#num_permis"));
        login.num_permis = "JFIEOJFOIEZ";
        if (num_permis.value === "" || password.value === "") {
            error.hidden = false;
            event.preventDefault();
        }
    });
});