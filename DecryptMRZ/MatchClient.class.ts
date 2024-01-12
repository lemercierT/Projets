import { Client } from "./Client.class";
import { ConnectSQL } from "./ConnectSQL.class";

export class MatchClient{
    protected _client: Client;
    protected _db: ConnectSQL;

    public constructor(client: Client){
        this._client = client;
        this._db = new ConnectSQL("localhost", "root", "", "db_myscanner")
    }

    public async MatchClient(): Promise<boolean>{
        let requete = "SELECT data_api.surname, data_api.name, data_api.birth FROM data_api WHERE data_api.surname = '" + this._client.surname + "'and data_api.name = '" + this._client.name + "'and data_api.birth = '" + this._client.birth + "'";
        const mod = this._db.execSQLValue(requete);
        return mod;
    }   
}