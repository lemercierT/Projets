use std::{self, thread::{self, JoinHandle}};

fn level1_thread() -> (){
    let handler = thread::spawn(|| {
       for i in 1..=5{
        println!("[+] Thread: {}", i);
       }
    });

    for i in 1..=3{
        println!("[+] Main thread: {}", i);
       }

    handler.join().unwrap();

    println!("[+] End of program.");
}

fn level2_thread() -> (){
    let (send, receive) = std::sync::mpsc::channel::<String>();

    let sender = std::thread::spawn(move || {
        if let Ok(_) = send.send("I'm the sender".to_owned()){
            println!("[+] Data sent !");
        }else{
            println!("[-] Error sending data.")
        }
    });

    let receiver: JoinHandle<()> = std::thread::spawn(move || {
        if let Ok(data) = receive.recv(){
            println!("[+] Data received !\nData: {}", data);
        }else{
            println!("[-] Error receiving data");
        }
    });

    sender.join().unwrap();
    receiver.join().unwrap();
}

fn level3_thread() -> (){
    let (send, receive) = std::sync::mpsc::channel::<String>();
    let (rep_send, rep_receive) = std::sync::mpsc::channel::<String>();

    let sender = std::thread::spawn(move || {
        if let Ok(_) = send.send("[Sender] Salut".into()){
            println!("[+] Data sent !");
        }
    });

    let receiver = std::thread::spawn(move ||{
        if let Ok(data) = receive.recv(){
            println!("[+] Data received !\n{}", data);
            println!("[+] Enter the string to send back : ");
            let mut buffer: String = String::with_capacity(50);
            if let Ok(_) = std::io::stdin().read_line(&mut buffer){
                if buffer.trim().is_empty(){
                    println!("[-] Empty string");
                }else{
                    let reponse = std::thread::spawn(move || {
                        if let Ok(_) = rep_send.send(buffer){
                            println!("[+] Data sent !");
                        }
                    });
                    reponse.join().unwrap();
                }
            }
        }
    });

    let rep_receiver = std::thread::spawn(move || {
        if let Ok(data) = rep_receive.recv(){
            println!("[Receiver] {}", data);
        }
    });

    sender.join().unwrap();
    receiver.join().unwrap();
    rep_receiver.join().unwrap();
}

fn level4_thread(string: String) -> (){
    const ALPHABET: &'static str = "abcdefghijklmnopqrstuvwxyz";
    let (send, _receive) = std::sync::mpsc::channel::<String>();

    let sender = std::thread::spawn(move || {
        for letter in ALPHABET.chars(){
            let payload = std::format!("{}{}", &string, letter);
            if let Ok(_) = send.send(payload.clone()){
                println!("[+] Payload : {}", &payload);
            }
        }
    });

    sender.join().unwrap();
}
fn main() {
    level1_thread();
    println!();
    level2_thread();
    println!();
    level3_thread();
    println!();
    level4_thread("test".to_string());
}

