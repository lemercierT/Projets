use std;
use reqwest;

const URL: &'static str = "http://challenge01.root-me.org:59088/";

fn post_api(endpoint: &'static str) -> (){
    let endpoint_url = std::format!("{}{}", URL, endpoint.clone());
    let client = reqwest::Client::new();
    let _res = client.post(endpoint_url).body("username=test&password=test").send();
}

fn get_api(endpoint: &'static str) -> (){
    let endpoint_url = std::format!("{}{}", URL, endpoint.clone());
    if let Ok(json) = reqwest::blocking::get(endpoint_url.clone()){
        println!("json : {:?}", json);
    }
}

fn put_api(endpoint: &'static str) -> (){
    let endpoint_url = std::format!("{}{}", URL, endpoint.clone());
    let client = reqwest::Client::new();
    let res = client.put(endpoint_url).body("temp").send();
}

fn choose_method() -> (){
    println!("which method you want to run ? \nPOST -> [1]\nGET -> [2]\nPUT -> [3]");
    let mut buffer: String = String::with_capacity(20);
    if let Ok() = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            println!("empty buffer");
        }else{
            if buffer.trim() == '1'.to_string(){
                post_api("api/signup");
            }else if buffer.trim() == '2'.to_string(){
                get_api("api/user");
            }else if buffer.trim() == '3'.to_string(){
                put_api("api/note");
            }else{
                println!("wrong number.");
            }
        }
    }
}

fn main() {
    let signup: &'static str = "/api/signup"; //POST : body : {"username": "test", "password": "test"}
    let login: &'static str = "/api/login";   //POST : body : {"username": "test", "password": "test"}
    let user: &'static str = "/api/user";     //GET : user informations : {"note": "test", "userid": 3, "username": "test"}
    let note: &'static str = "/api/note";     //PUT : user note : {"note": "temporary"} => {"note": "temporary", "userid": 3, "username": "test"}

    choose_method();
}