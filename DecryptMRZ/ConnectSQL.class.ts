import mysql from "mysql2";
import { Connection } from "mysql2/typings/mysql/lib/Connection";

export class ConnectSQL{
    protected _db: Connection;

    public constructor(host: string, user: string, passwd: string, bdd: string){
        this._db = mysql.createConnection({
            host: host,
            user: user,
            password: passwd, 
            database: bdd
        })

        this._db.connect((error) => {
            if(error) throw new Error("connection error.");
        })
    }

    public execSQL(requete: string): boolean{
        this._db.query(requete, (error: any) => {
            if(error) return false;
        })
        this._db.end((error) => {
            if(error) return false;
        })
        return true;
    }

    public async execSQLGetValue(requete: string): Promise<string>{
        return new Promise<string>((resolve) => {
            this._db.query(requete, (error: any, results: string | any[]) => {
                if(error) throw new Error("Error requete.");
                else{
                    if(Array.isArray(results) && results.length > 0){
                        const temp = results[0];
                        if("id" in temp){
                            const end = temp.id;
                            resolve(end);
                        }
                    }else throw new Error("No results")
                }
            })
            this._db.end((error) => {
                if(error) throw new Error("erreur fermeture.");
            })
        })
    }

     public async execSQLValue(requete: string): Promise<boolean>{
        return new Promise<boolean>((resolve) => {
            this._db.query(requete, (error: any, results: string | any[]) => {
                if(error) throw new Error("Error requete.")
                else{
                    if(Array.isArray(results) && results.length > 0){
                        resolve(true);
                    }else{
                        resolve(false);
                    }
                }
            })
            this._db.end((error) => {
                if(error) throw new Error("erreur fermeture");
            })
        }
    )}
}

