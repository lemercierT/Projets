import { DecryptMRZ } from "./DecryptMRZ.class";
import { Client } from "./Client.class";
import { Connection } from "./Connection.class";
import { MatchClient } from "./MatchClient.class";
//import { ConnectSQL } from "./ConnectSQL.class";



//let db = new ConnectSQL("localhost", "root", "", "db_myscanner");

let decrypt_idCard = new DecryptMRZ( ["bande carte id"]);

let info_thibault = new Map();
info_thibault = decrypt_idCard.decryptMRZ();
info_thibault.forEach(value => {
    console.log(value);
})

let nom = info_thibault.get("surname");
let prenom = info_thibault.get("name");
let date_de_naissance_js = info_thibault.get("birth");
let format = info_thibault.get("sex");
console.log("FORMMMMMATTTTTTT: " + format);
let requete = "INSERT INTO data_clients VALUES (20, '" + nom + "', '" + prenom + "', '" + date_de_naissance_js + "')";

console.log(date_de_naissance_js);
//db.execSQL(requete);

let decrypt_passePort = new DecryptMRZ(['I<UTOD23145890<1233<<<<<<<<<<<',
                                        '7408122F1204159UTO<<<<<<<<<<<6',
                                        'ERIKSSON<<ANNA<MARIA<<<<<<<<<<'
]);
let info_anna = new Map();
info_anna = decrypt_passePort.decryptMRZ();
info_anna.forEach(value => {
    console.log(value);
})

let client: Client = new Client(["bande carte id"]);
console.log("CLIENT: " + client.genereLogs());

let client1: MatchClient = new MatchClient(client);

async function main(){
    let connect = new Connection("titi", "mypass");
    if (await connect.Connect()) console.log("ok");
    else console.log("pas ok");

    if(await client1.MatchClient()) console.log("ok requete")
    else console.log("non ok requete");

    console.log("FORMMMMMATTTTTTT: " + format);
}
main();





