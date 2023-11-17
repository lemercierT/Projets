type formAjout = {
    exces: HTMLInputElement;
    outrage: HTMLInputElement;
    feu: HTMLInputElement;
    ivresse: HTMLInputElement;
    fuite: HTMLInputElement;
    refus: HTMLInputElement;
    nature: HTMLInputElement;
}

class Ajout{
    private _form;
    private _exces;
    private _feu;
    private _outrage;
    private _ivresse;
    private _fuite;
    private _refus;
    private _nature;

    Init(form: formAjout){
        this._form = form;
        this._form.exces.onclick = () => this._form.nature.value = this._form.exces.value;
        this._form.feu.onclick = () => this._form.nature.value = this._form.feu.value;
        this._form.outrage.onclick = () => this._form.nature.value = this._form.outrage.value;
        this._form.ivresse.onclick = () => this._form.nature.value = this._form.ivresse.value;
        this._form.fuite.onclick = () => this._form.nature.value = this._form.fuite.value;
        this._form.refus.onclick = () => this._form.nature.value = this._form.refus.value;
        
    }
}

let ajout = new Ajout();
ajout.Init({
    exces: document.querySelector("[id=exces]")!,
    feu: document.querySelector("[id=feu]")!,
    outrage: document.querySelector("[id=outrage]")!,
    ivresse: document.querySelector("[id=ivresse]")!,
    fuite: document.querySelector("[id=fuite]")!,
    refus: document.querySelector("[id=refus]")!,
    nature: document.querySelector("[id=nature_res]")!
})