use std;

fn ask_name_project() -> String{
    let mut name_project: String = String::with_capacity(10);
    println!("[+] Enter your name project : ");

    let mut buffer: String = String::with_capacity(10);
    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            println!("[-] Empty input!");
        }else{
            name_project = buffer;
            
        }
    }else{
        eprintln!("[-] Error std::io::stdin");
    }

    return name_project;
}

fn classic_mvc_model(){
    let name_project = ask_name_project();

    let main_directory = std::format!("./{}", name_project);
    if let Ok(_) = std::fs::create_dir(&main_directory){
        println!("[+] Main directory created. Path: {}", &main_directory);
        let readme: String = std::format!("{}/readme.md", &main_directory);
        if let Ok(_) = std::fs::File::create(&readme){
            println!("[+] Automatically add readme.md in : {}", &readme);
        }

        let model_dir: String = std::format!("{}/model", &main_directory);
        if let Ok(_) = std::fs::create_dir(&model_dir){
            println!("[+] Model directory created. Path: {}", &model_dir);
        }

        let view_dir: String = std::format!("{}/view", &main_directory);
        if let Ok(_) = std::fs::create_dir(&view_dir){
            println!("[+] View directory created. Path: {}", &view_dir);
        }

        let controller_dir: String = std::format!("{}/controller", &main_directory);
        if let Ok(_) = std::fs::create_dir(&controller_dir){
            println!("[+] Controller directory created. Path: {}", &controller_dir);
        }
        
    }else{
        eprintln!("[-] Error creating main directory in {}", &main_directory);
    }
}

fn php_mvc_model(){
    let name_project = ask_name_project();

    let main_directory = std::format!("./{}", name_project);
    if let Ok(_) = std::fs::create_dir(&main_directory){
        println!("[+] Main directory created. Path: {}", &main_directory);
        let app_dir: String = std::format!("{}/app", &main_directory);
        if let Ok(_) = std::fs::create_dir(&app_dir){
            println!("[+] App directory created. Path: {}", &app_dir);

            let model_dir: String = std::format!("{}/model", &main_directory);
            std::fs::create_dir(&model_dir).unwrap_or_else(|err|{
            if err.kind() == std::io::ErrorKind::AlreadyExists{
                println!("[-] File already exist");
            }
            });

            let view_dir: String = std::format!("{}/view", &main_directory);
            if let Ok(_) = std::fs::create_dir(&view_dir){
                let main_dir: String = std::format!("{}/main", &view_dir);
                    println!("{}", &view_dir);
                    std::fs::create_dir(&main_dir).unwrap_or_else(|err|{
                    if err.kind() == std::io::ErrorKind::AlreadyExists{
                        println!("[-] File already exist");
                    }
                    });

                    let shared_dir: String = std::format!("{}/shared", &view_dir);
                    std::fs::create_dir(&shared_dir).unwrap_or_else(|err|{
                    if err.kind() == std::io::ErrorKind::AlreadyExists{
                        println!("[-] File already exist");
                    }
                    });
            }

            let controller_dir: String = std::format!("{}/controller", &main_directory);
            std::fs::create_dir(&controller_dir).unwrap_or_else(|err|{
            if err.kind() == std::io::ErrorKind::AlreadyExists{
                println!("[-] File already exist");
            }
            });

            let config_dir: String = std::format!("{}/config", &main_directory);
            std::fs::create_dir(&config_dir).unwrap_or_else(|err|{
            if err.kind() == std::io::ErrorKind::AlreadyExists{
                println!("[-] File already exist");
            }
            });
        }

        let public_dir: String = std::format!("{}/public", &main_directory);
        if let Ok(_) = std::fs::create_dir(&public_dir){
            println!("[+] Public directory created. Path: {}", &public_dir);
        }

        let tests_dir: String = std::format!("{}/tests", &main_directory);
        if let Ok(_) = std::fs::create_dir(&tests_dir){
            println!("[+] Tests directory created. Path: {}", &tests_dir);
        }
    }else{
        eprintln!("[-] Error creating main directory in {}", &main_directory);
    }
}

fn main(){
    let mut choice: String = String::with_capacity(1);
    let mut buffer: String = String::with_capacity(1);

    println!("[+][+] Welcome to design patern creator ! [+][+]\n\nWhich model you want to created ?\n\n[1]Classic MVC\n[2] PHP MVC\n[3]In work...");

    if let Ok(_) = std::io::stdin().read_line(&mut buffer){
        if buffer.trim().is_empty(){
            println!("[+] Empty number! ");
        }else{
            choice = buffer.trim().to_string();
        }
    }

    if choice == "1"{
        classic_mvc_model();
    }else if choice == "2"{
        php_mvc_model();
    }
}
