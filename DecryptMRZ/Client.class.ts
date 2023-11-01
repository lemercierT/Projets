import { DecryptMRZ } from "./DecryptMRZ.class";
import { ConnectSQL } from "./ConnectSQL.class";

export class Client{
    protected _id: number;
    private _format: string;
    private _issuing_state: string;
    private _administrative_code: string;
    private _surname: string;
    private _name: string;
    private _birth: string;
    private _sex: string;
    private _issue_date: string;
    protected _mrz: DecryptMRZ;

    public constructor(mrz: Array<string>){
        this._mrz = new DecryptMRZ(mrz);
        this._id = 0;
        this._format = this._mrz.decryptMRZ().get("format")!;
        this._issuing_state = this._mrz.decryptMRZ().get("issuing_state")!;
        this._issue_date = this._mrz.decryptMRZ().get("issue_date")!;
        this._administrative_code = this._mrz.decryptMRZ().get("administrative_code")!;
        this._surname = this._mrz.decryptMRZ().get("surname")!;
        this._name = this._mrz.decryptMRZ().get("name")!;
        this._birth = this._mrz.decryptMRZ().get("birth")!;
        this._sex = this._mrz.decryptMRZ().get("sex")!;
    }

    public get surname(): string{return this._surname!}
    public set surname(surname: string){this._surname = surname}

    public get name(): string{return this._name!}
    public set name(name: string){this._name = name}

    public get birth(): string{return this._birth!}
    public set birth(birth: string){this._birth = birth}

    public async addToBdD(): Promise<boolean>{
        let db = new ConnectSQL("localhost", "root", "", "db_myscanner");
        this._id = parseInt(await this.getID()) + 1;
        let requete = "INSERT INTO `data_clients` (`id`, `format`, `issuing_state`, `administrative_code`, `surname`, `name`, `birth`, `sex`, `issue_date`) VALUES (" + this._id + ", '" + this._mrz.decryptMRZ().get("format") + "', '" + this._mrz.decryptMRZ().get("issuing_state") + "', '" + this._mrz.decryptMRZ().get("administrative_code") + "', '" + this._mrz.decryptMRZ().get("surname") + "', '" + this._mrz.decryptMRZ().get("name") + "', '" + this._mrz.decryptMRZ().get("birth") + "', '" + this._mrz.decryptMRZ().get("sex") + "', '" + this._mrz.decryptMRZ().get("issue_date") + "');"
        if(!db.execSQL(requete)) return false;
        return true;
    }

    public genereLogs(): string{
        let logs: string = this._format + " " + this._issuing_state + " " + this._issue_date + " " + this._administrative_code + " " +  this._surname + " " + this._name + " " + this._birth + " " + this._sex;
        return logs;
    }

    private async getID(): Promise<string>{
        let db = new ConnectSQL("localhost", "root", "", "db_myscanner");
        let requete = "SELECT COUNT(data_clients.id) as id FROM data_clients";
        try{
            const rep = await db.execSQLGetValue(requete);
            return rep;
        }catch(error){
            return "error";
        }
    }
}