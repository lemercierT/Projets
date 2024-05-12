use std::{net::SocketAddr, time::{Duration, Instant}};
use reqwest::{header::HeaderMap, Client, StatusCode, Url, Version};

const MAX_BYTE: usize = 0xFF;
const NUMBER_THREAD: usize = 0x96; // 150 threads
const TIMEOUT: u64 = 0xCB; // 200ms

fn create_client() -> Client{
    let timeout_duration: Duration = std::time::Duration::from_millis(TIMEOUT);
    let client: Client = reqwest::Client::builder().timeout(timeout_duration).build().expect("[-] Error creating Client");

    return client;
}

async fn get_infos(client: Client, _url: &str) -> (){
    if let Ok(response) = client.get(_url).send().await{
        let url: &Url = response.url();
        let header: HeaderMap = response.headers().clone();
        let adress: Option<SocketAddr> = response.remote_addr();
        let status: StatusCode = response.status();
        let http_version: Version = response.version(); 

        println!("[+] {}\nurl : {}\nheader : {:?}\nadress : {:?}\nstatus : {}\nhttp-version : {:?}\n\n", _url, url, header, adress, status, http_version);      
    }
}

async fn _get_header(client: Client, url: &str) -> (){    
    if let Ok(response) = client.get(url).send().await{
        if response.status().is_success(){
            let header: HeaderMap = response.headers().clone();
            println!("[+] {} \n{:?}", url, header);
        }
    }
}

fn get_ip_list(_start_ip: Option<&str>) -> Vec<String>{
    if let Some(start_ip) = _start_ip{
        let ip_split: Vec<&str> = start_ip.split(".").collect();
        let ip_lenght: usize = ip_split.len();
        
        match ip_lenght{
            0x1 | 0x2 | 0x3 => return generate_ip_from_something(start_ip, ip_lenght),     
            _ => return Vec::new(),  
        }
    }else{
        return generate_ip_from_nothing();
    }
}

fn generate_ip_from_something(_start_ip: &str, ip_lenght: usize) -> Vec<String>{
    if ip_lenght == 0x3{
        let mut ip_list: Vec<String> = Vec::with_capacity(MAX_BYTE);
        for d in 0x1..=0xFF{
            ip_list.push(std::format!("http://{}.{}:80/", _start_ip, d));
        }
        return ip_list;
    }else if ip_lenght == 0x2{
        let mut ip_list: Vec<String> = Vec::with_capacity(MAX_BYTE * MAX_BYTE);
        for d in 0x1..=0xFF{
            for c in 0x1..=0xFF{
                ip_list.push(std::format!("http://{}.{}.{}:80/", _start_ip, c, d));
            }
        }
        return ip_list;
    }else{
        let mut ip_list: Vec<String> = Vec::with_capacity(MAX_BYTE * MAX_BYTE * MAX_BYTE);
        for d in 0x1..=0xFF{
            for c in 0x1..=0xFF{
                for b in 0x1..=0xFF{
                    ip_list.push(std::format!("http://{}.{}.{}.{}:80/", _start_ip, b, c, d));
                }
            }
        }
        return ip_list;
    }
}

fn generate_ip_from_nothing() -> Vec<String>{
    let mut ip_list: Vec<String> = Vec::with_capacity(MAX_BYTE * MAX_BYTE * MAX_BYTE * MAX_BYTE);

    for d in 0x1..=0xFF{
        for c in 0x1..=0xFF{
            for b in 0x1..=0xFF{
                for a in 0x1..=0xFF{
                    ip_list.push(std::format!("{}.{}.{}.{}", a, b, c, d));
                }
            }
        }
    }
    return ip_list;
} 

async fn multi_threading_exec(_ip_list: Vec<String>) -> (){
    let _client: Client = create_client();    
    let mut parts: Vec<Vec<String>> = Vec::with_capacity(NUMBER_THREAD);
    
    for list in _ip_list.chunks_exact(_ip_list.len() / NUMBER_THREAD){
        parts.push(list.to_vec());
    }

    let handle: Vec<_> = parts
        .into_iter()
        .map(|list: Vec<String>| {
            let client = _client.clone();
            tokio::task::spawn(async move {
                for url in list {
                    get_infos(client.clone(), &url).await;
                }
            })
        })
        .collect();

    for thread in handle{
        thread.await.expect("[-] Error stop thread.");
    }
}

async fn application(_start_ip: Option<&str>) -> (){
    let ip_list: Vec<String>;
    if let Some(start_ip) = _start_ip{
        ip_list = get_ip_list(Some(start_ip));
    }else{
        ip_list = get_ip_list(None);
    }

    // for url in ip_list{
    //     get_infos(create_client(), &url).await;
    // } // 13.047888871s

    multi_threading_exec(ip_list).await; // 1.644640904s
}

#[tokio::main]
async fn main(){
    let start_time: Instant = Instant::now();

    application(Some("90")).await;

    let end_time: Instant = Instant::now();
    println!("[+] Program success in {:?}", end_time - start_time);
}
