import { ConnectSQL } from "./ConnectSQL.class";

export class Connection{
    protected _db: ConnectSQL;
    private _username: string;
    protected _password: string;

    public constructor(username: string, password: string){
        this._db = new ConnectSQL("localhost", "root", "", "db_myscanner")
        this._username = username;
        this._password = password;
    }

    public get username(): string{return this._username}
    public set username(username){this._username = username}

    public async Connect(): Promise<boolean>{
        try{
            let requete = "SELECT data_login.username, data_login.password FROM data_login WHERE data_login.username = '" + this._username + "' AND data_login.password = '" + this._password + "'";
            const result = await this._db.execSQLValue(requete);
            return result;
        }catch(error){
            return false;
        }
    }
}