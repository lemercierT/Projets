var Login = /** @class */ (function () {
    function Login(username) {
        this.username = username;
    }
    Object.defineProperty(Login.prototype, "newUsername", {
        set: function (newUsername) {
            var value = newUsername.value;
            var regex = /^(AZ|az)\d{2}$/;
            if (regex.test(value)) {
                console.log("Aucun problème");
            }
            else {
                console.log("Le nom d'utilisateur est invalde il doit être de la forme : AZ00");
            }
        },
        enumerable: false,
        configurable: true
    });
    return Login;
}());
