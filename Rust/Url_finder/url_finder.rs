use std;
use std::error::Error;
use regex::Regex;

fn input_url() -> Result<String, Box<dyn Error>> {
    let mut url = String::new();
    println!("[x] Enter URL : ");

    match std::io::stdin().read_line(&mut url){
        Ok(_) => {
            let res: String = url.trim().to_string();
            if res != ""{
                Ok(res)
            }else {
                Err("".into())
            }
        }
        Err(error) => {
            Err(Box::new(error))
        }
    }
}

fn choose_attack_mod() -> Result<String, Box<dyn Error>>{
    let mut choice: String = String::new();
    println!("[x] Choose you attack mod : \n[1] Wordlist\n[2] Bruteforce");

    match std::io::stdin().read_line(&mut choice){
        Ok(_) => {
            let res: String = choice.trim().to_string();
            if res != ""{
                Ok(res)
            }else{
                Err("".into())
            }
        }
        Err(error) => {
            Err(Box::new(error))
        }
    }
}

fn wordlist_attack() ->  Result<String, Box<dyn Error>>{
    let mut path_wordlist: String = String::new();
    println!("[x] Enter the path of your wordlist : \nExample : /usr/share/wordlist/rockyou.txt");

    match std::io::stdin().read_line(&mut path_wordlist){
        Ok(_) => {
            Ok(path_wordlist.trim().to_string())
        }
        Err(error) => {
            Err(Box::new(error))
        }
    }
}

// fn url_wordlist_attack(url: String, path_wordlist: String) -> Result<String, Box<dyn Error>>{
//     // Attentre wordlist_attack
// }

fn bruteforce_attack() -> Result<String, Box<dyn Error>>{
    let mut selected_char: String = String::new();
    println!("[x] Enter character you want : \nExample : [a-f][0-9]");

    match std::io::stdin().read_line(&mut selected_char){
        Ok(_) => {
            let char_regex: Regex = Regex::new(r"[a-zA-Z0-9\[\]]").unwrap();
            if char_regex.is_match(&selected_char){
                Ok(selected_char.trim().to_string())
            }
            else{
                Err("".into())
            }
        }
        Err(error) => {
            Err(Box::new(error))
        }
    }
}

// fn url_bruteforce_attack(url: String, selected_char: String) -> Result<String, Box<dyn Error>>{
//     // Attentre bruteforce_attack
// }
fn main(){
    let mut _url: String = String::new();
    match input_url(){
        Ok(url) => {
            _url = url;
            println!("[+] URL selected : {}", _url);
        }
        Err(error) => {
            let _error: Box<dyn Error> = error;
            println!("[-] Error selected URL : {}", _error);
        }
    }

    let mut _choice: String = String::new();
    match choose_attack_mod(){
        Ok(choice) => {
            _choice = choice;
            println!("[+] Choice selected : {}", _choice);
        }
        Err(error) => {
            let mut _error: Box<dyn Error> = error;
            println!("[-] Error choice => use 1 or 2 : {}", _error);
        }
    }

    let mut _path_wordlist: String = String::new();
    let mut _selected_char: String = String::new();
    if _choice == "1"{
        match wordlist_attack(){
            Ok(path_wordlist) => {
                println!("[+] Wordlist selected : {}", path_wordlist);
                _path_wordlist = path_wordlist;
            }
            Err(error) => {
                let _error: Box<dyn Error> = error;
                println!("[-] Error searching wordlist : {}", _error);
            }
        }
    }else if _choice == "2" {
        match bruteforce_attack(){
            Ok(selected_char) => {
                println!("[+] Selected character : {}", selected_char);
                _selected_char = selected_char;
            }
            Err(error) => {
                let _error: Box<dyn Error> = error;
                println!("[-] Error selected character : {}", _error);
            }
        }
    }

}
