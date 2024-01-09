use std;

fn modele_mvc(){
    let mut name_project: &str = "";
    println!("[+] Enter your name project : ");

    let mut buffer: String = String::with_capacity(10);
    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            println!("[-] Empty input!");
        }else{
            name_project = &buffer;
        }
    }

    let main_directory = std::format!("./{}", name_project);
    if let Ok(_) = std::fs::create_dir(&main_directory){
        println!("[+] Main directory created. Path: {}", &main_directory);
        let readme: String = std::format!("{}/readme.md", &main_directory);
        if let Ok(_) = std::fs::File::create(&readme){
            println!("[+] Automatically add readme.md in : {}", &readme);
        }

        let model_file: String = std::format!("{}/model", &main_directory);
        if let Ok(_) = std::fs::create_dir(&model_file){
            println!("[+] Model directory created. Path: {}", &model_file);
        }

        let view_file: String = std::format!("{}/view", &main_directory);
        if let Ok(_) = std::fs::create_dir(&view_file){
            println!("[+] View directory created. Path: {}", &view_file);
        }

        let controller_file: String = std::format!("{}/controller", &main_directory);
        if let Ok(_) = std::fs::create_dir(&controller_file){
            println!("[+] Controller directory created. Path: {}", &controller_file);
        }
        
    }else{
        eprintln!("[-] Error creating directory in {}", &main_directory);
    }
}

fn main(){
    let mut choice: String = String::with_capacity(1);
    let mut buffer: String = String::with_capacity(1);

    println!("[+][+] Welcome to design patern creator ! [+][+]\n\nWhich model you want to created ?\n\n[1] MVC \n[2] In work...");

    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            println!("[+] Empty number! ");
        }else{
            choice = buffer.trim().to_string();
        }
    }

    if choice == "1"{
        modele_mvc();
    }
}
