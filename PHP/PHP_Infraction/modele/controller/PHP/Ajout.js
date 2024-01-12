var Ajout = /** @class */ (function () {
    function Ajout() {
    }
    Ajout.prototype.Init = function (form) {
        var _this = this;
        this._form = form;
        this._form.exces.onclick = function () { return _this._form.nature.value = _this._form.exces.value; };
        this._form.feu.onclick = function () {
            _this._form.nature.value = _this._form.feu.value;
            console.log(_this._form.nature.value);
        };
        this._form.outrage.onclick = function () { return _this._form.nature.value = _this._form.outrage.value; };
        this._form.ivresse.onclick = function () { return _this._form.nature.value = _this._form.ivresse.value; };
        this._form.fuite.onclick = function () { return _this._form.nature.value = _this._form.fuite.value; };
        this._form.refus.onclick = function () { return _this._form.nature.value = _this._form.refus.value; };
    };
    return Ajout;
}());
var ajout = new Ajout();
ajout.Init({
    exces: document.querySelector("[id=exces]"),
    feu: document.querySelector("[id=feu]"),
    outrage: document.querySelector("[id=outrage]"),
    ivresse: document.querySelector("[id=ivresse]"),
    fuite: document.querySelector("[id=fuite]"),
    refus: document.querySelector("[id=refus]"),
    nature: document.querySelector("[id=nature_res]")
});
