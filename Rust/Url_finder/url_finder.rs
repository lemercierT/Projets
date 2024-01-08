use std::{self, fs::File, io::{BufReader, BufRead}};
use regex::Regex;
use reqwest::{self, Error};

fn input_url() -> String {
    let mut url: String = String::with_capacity(20);
    println!("[x] Enter URL : ");

    while url.is_empty(){
        let mut buffer = String::new();
        if let Ok(_) = std::io::stdin().read_line(&mut buffer){
            if buffer.trim().is_empty(){
                println!("[-] Empty URL");
            }else{
                url = buffer.trim().to_string();
            }
        }else{
            println!("[-] Error std::io::stdin");
        }
    }

    println!("[+] Selected URL : {}", url);
    return url;
}

fn choose_attack_mod() -> String{
    let mut choice: String = String::with_capacity(1);
    println!("[x] Choose you attack mod : \n[1] Wordlist\n[2] Bruteforce");

    while choice.is_empty(){
        let mut buffer: String = String::with_capacity(1);
        if let Ok(_) = std::io::stdin().read_line(&mut buffer){
            if buffer.trim().is_empty(){
                println!("[-] Empty number");
            }else{
                let check_number: Regex = Regex::new(r"[12]").unwrap();
                if check_number.is_match(buffer.trim()){
                    choice = buffer.trim().to_string();
                }else{
                    println!("[-] Not valid number");
                }
            }
        }else{
            println!("[-] Error std::io::stdin");
        }
    }

    println!("[+] Selected choice : {}", choice);
    return choice;
}

fn wordlist_attack() ->  String{
    let mut path_wordlist: String = String::new();
    println!("[x] Enter the path of your wordlist : \nExample : /usr/share/wordlist/rockyou.txt");

    while path_wordlist.trim().is_empty(){
        let mut buffer: String = String::new();
        if let Ok(_) = std::io::stdin().read_line(&mut buffer){
            if buffer.trim().is_empty(){
                println!("[-] Empty input !")
            }else{
                path_wordlist = buffer;
            }
        }else{
            println!("[-] Error std::io::stdin");
        }
    }

    println!("[+] Selected path worlist : {}", path_wordlist);
    return path_wordlist;
}

fn url_wordlist_attack(url: String, path_wordlist: String) -> &'static str{
    let file_path: String = path_wordlist.trim().to_string();
    let file: File = std::fs::File::open(file_path).expect("[-] File not found.");
    let buffer_reader: BufReader<File> = std::io::BufReader::new(file); 

    for line in buffer_reader.lines(){
        let payload_url = url.clone() + line.unwrap().trim();
        println!("[+] Test -> {}", payload_url);
        match attack_url(payload_url){
            Ok(_) => {
                continue;
            }
            Err(error) => {
                let _error: Error = error;
                println!("[-] Error fetching URL : {}.", _error);
            }
        }
    }

    return "[+] Not found.";
}

fn attack_url(payload: String) -> Result<(), reqwest::Error>{
    let body = reqwest::blocking::get(payload)?.text()?;

    println!("{:?}", body);
    Ok(())
}

fn bruteforce_attack() -> String{
    let mut selected_char: String = String::new();
    println!("[x] Enter character you want : \nExample : [a-f][0-9]");

    while selected_char.is_empty(){
        let mut buffer: String = String::new();
        if let Ok(_) = std::io::stdin().read_line(&mut buffer){
            if buffer.trim().is_empty(){
                println!("[-] Empty input !");
            }else{
                let char_regex: Regex = Regex::new(r"[a-zA-Z0-9\[\]]").unwrap();
                if char_regex.is_match(buffer.trim()){
                    selected_char = buffer;
                }else{
                    println!("[-] Invalid character !");
                }
            }
        }else{
            println!("[-] Error std::io::stdin");
        }
    }

    println!("[+] Selected character : {}", selected_char);
    return selected_char;
}

// fn url_bruteforce_attack(url: String, selected_char: String) -> Result<String, Box<dyn Error>>{
//     // Attentre bruteforce_attack
// }

fn main(){
    let mut _url: String = String::new();
    _url = input_url();

    let mut _choice: String = String::new();
    _choice = choose_attack_mod();

    let mut _path_wordlist: String = String::new();
    let mut _selected_char: String = String::new();
    if _choice == "1"{
        _path_wordlist = wordlist_attack();
        url_wordlist_attack(_url, _path_wordlist);
    }else if _choice == "2" {
        _selected_char = bruteforce_attack();
    }

}