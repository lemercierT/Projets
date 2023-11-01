import { Client } from "./Client.class";
import { MatchClient } from "./MatchClient.class";

let client = new Client(["IDFRALEMERCIER<<<<<<<<<<<<<<<<057042", 
                         "1811579505934THIBAULT<<DANI0302209M1"]);

const logs = client.genereLogs();
console.log(logs);


let client1 = new Client(['I<UTOD23145890<1233<<<<<<<<<<<',
                          '7408122F1204159UTO<<<<<<<<<<<6',
                          'ERIKSSON<<ANNA<MARIA<<<<<<<<<<']);

const logs1 = client1.genereLogs();
console.log(logs1);
async function main(){
    await client.addToBdD();
    await client1.addToBdD();
}
main();


(new MatchClient(client)).MatchClient();

(new MatchClient(client1)).MatchClient();
