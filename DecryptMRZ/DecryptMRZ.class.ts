import * as mrz_decrypt from "mrz";

export class DecryptMRZ{
    protected _mrz: Array<string>;
    protected _data: any;

    public constructor(mrz: Array<string>){
        this._mrz = mrz;
        this._data = mrz_decrypt.parse(this._mrz);
        this._data = JSON.stringify(this._data);
        this._data = JSON.parse(this._data);
    }

    private dateToSqlDate(date: string): Date{
        let jour: number, mois: number, annee: number, ajust_year: number, end_date: Date; 
        if(date.length == 6){
            jour = parseInt(date.substring(4, 6), 10);
            mois = parseInt(date.substring(2, 4), 10);
            annee = parseInt(date.substring(0, 2), 10);
        
            ajust_year = annee < 70 ? 2000 + annee : 1900 + annee;
            end_date = new Date(ajust_year, mois - 1, jour + 1);
        }else if(date.length == 4){
            mois = parseInt(date.substring(2, 4), 10);
            annee = parseInt(date.substring(0, 2), 10);

            ajust_year = annee < 70 ? 2000 + annee : 1900 + annee;
            end_date = new Date(ajust_year, mois);
        }else throw new Error("format invalid.");

       return end_date;
    }

    public decryptMRZ(): Map<string, string>{
        let info_perso: Map<string, string> = new Map();
        let format = this._data.format;
        let issuing_state = this._data.details[1].value;
        let administrative_code = this._data.details[3].value;
        let issue_date = this.dateToSqlDate(this._data.details[4].value).toISOString().split("T")[0];
        let nom = this._data.fields.lastName;
        let prenom = this._data.fields.firstName;
        let birth = this.dateToSqlDate(this._data.fields.birthDate).toISOString().split("T")[0];
        let sex = this._data.fields.sex;

        info_perso.set("format", format);
        info_perso.set("issuing_state", issuing_state);
        info_perso.set("administrative_code", administrative_code);
        info_perso.set("surname", nom);
        info_perso.set("name", prenom);
        info_perso.set("birth", birth);
        info_perso.set("sex", sex);
        info_perso.set("issue_date", issue_date);

        return info_perso;
    }
}