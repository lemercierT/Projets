import { ConnectSQL } from "./ConnectSQL.class";

let db = new ConnectSQL("localhost", "root", "", "db_myscanner");

let pseudo = "Job";
let mdp = "cracked645";

let requete = "INSERT INTO data_login VALUES (6, '" + pseudo + "', '" + mdp + "')";
db.execSQL(requete);