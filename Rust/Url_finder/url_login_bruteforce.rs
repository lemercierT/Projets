use std;
use regex;
use reqwest;

// fn choose_attack_method() -> String{
//     let mut choice: String = String::with_capacity(1);
//     let mut buffer: String = String::with_capacity(1);

//     if let Ok(_) = std::io::stdin().read_line(&mut buffer){
//         if buffer.trim().is_empty(){
//             eprintln!("[-] Empty number!");
//         }else{
//             choice = buffer;
//         }
//     }

//     return choice;
// }

fn wordlist_login_attack(){
    let mut url: String = String::with_capacity(20);
    let mut path_wordlist_file: String = String::with_capacity(20);
    let mut payload: String = String::with_capacity(30);
    let mut buffer: String = String::with_capacity(20);

    println!("[x] Enter the URL to attack :");

    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            eprintln!("[-] Empty URL input.");
        }else{
            println!("[+] URL selected : {}", &buffer);
            url = buffer;
            buffer = String::with_capacity(20);
        }
    }


    println!("[x] Enter the path of your worlist :");
    
    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            eprintln!("[-] Empty wordlist input.");
        }else{
            println!("[+] Wordlist selected : {}", &buffer);
            path_wordlist_file = buffer;
            buffer = String::with_capacity(30);
        }
    }

    println!("[x] Enter the form element in the HTML page : \nExample : uname=NAME&pass=PASS[&selected=click]");

    let payload_regex = regex::Regex::new(r"[a-z=][NAME&][a-z=][PASS]").unwrap();
    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            eprintln!("[-] No wordlist match for : {}", &buffer);
        }else if payload_regex.is_match(&buffer){
            payload = buffer;
        }
    }

    attack(url, path_wordlist_file, payload);
}

fn attack(url: String, path_wordlist_file: String, payload: String){
    println!("{}{}{}", &url, &path_wordlist_file, &payload);

    if let Ok(response) = reqwest::blocking::get(&url){
        if response.status().is_success(){
            println!("[+] Connected to URL : {}", &url);
        }else{
            eprintln!("[-] URL not found : {}", &url);
        }
    }else{
        eprintln!("[-] Error reqwest");
    }
}

fn main() {
    wordlist_login_attack();
}
