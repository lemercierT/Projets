fn u32_to_char(code: u32) -> char {
    return char::from_u32(code).expect("Invalid code.");
}

fn char_to_u32(character: char) -> u32 {
    return character as u32;
}

fn main() {
    const ASCII_LEN: u32 = 255;
    let cypher = "L|k€y+*^*zo‚*€kvsno|*k€om*vo*zk}}*cyvksr";

    for i in 0..ASCII_LEN {
        let mut flag = String::new();
        for letter in cypher.chars() {
            let rang_ascii = char_to_u32(letter);
            let n_rang = (rang_ascii + i) % ASCII_LEN;
            let new_letter = u32_to_char(n_rang);
            flag.push(new_letter);
        }
        println!("{}", flag);
    }
}
