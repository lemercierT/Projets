import { Connection } from "./Connection.class";
import { Client } from "./Client.class";
import { MatchClient } from "./MatchClient.class";

//Exemple de bon déroulement: 

//username et password sont dans la base de donnée.
const username_valid: string = "usertest";
const password_valid: string = "passtest";
async function connect(){
    console.log("Test 1 -> Connection OK:");
    if(await (new Connection(username_valid, password_valid)).Connect()) console.log("You're logged.\n");
    else console.log("Wrong password or username\n");
}

//Exemple de mauvais déroulement: 

//username et password ne sont pas dans la base de donnée.
const username_no_valid: string = "usertest04";
const password_no_valid: string = "passtest04";
async function noConnect(){
    console.log("Test 2 -> Connection no OK:");
    if(await (new Connection(username_no_valid, password_no_valid)).Connect()) console.log("Your're logged.\n");
    else console.log("Wrong password or username.\n");
}

//Exemple de recuperation de donnée d'un client à partir de la bande MRZ:

const client = new Client(["your id card"]);

const client1 = new Client(['I<UTOD23145890<1233<<<<<<<<<<<',
                            '7408122F1204159UTO<<<<<<<<<<<6',
                            'ERIKSSON<<ANNA<MARIA<<<<<<<<<<']);

async function bddAdd(){
    console.log("Test 4 -> Add to database with no problem.");
    if(await client.addToBdD()) console.log("Added with no error.\n");
    else console.log("Add error.\n")
}    

async function Matched(){
    console.log("Test 5 -> Match client OK:");
    if(await (new MatchClient(client)).MatchClient()) console.log("Matched !\n");
    else console.log("No matched.\n");
}

async function noMatched(){
    console.log("Test 6 -> No match client:");
    if(await (new MatchClient(client1)).MatchClient()) console.log("Matched !\n");
    else console.log("No matched.\n");
}

async function main(){
    //Page de login.
    await connect();
    await noConnect();

    //Recup infos client.
    console.log("Test 3 -> Genere infos for database:\n" + client.genereLogs() + "\n");

    //Ajoute client à BdD.
    await bddAdd();

    //Match Client.
    await Matched();
    await noMatched();
    
}
main();