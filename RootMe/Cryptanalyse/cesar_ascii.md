# Chiffrement par décalage - Cesar Ascii

## Récupération du fichier et traitement

Pour ce challenge un fichier .bin nous est passé.<br>

Utilisation de hexedit (permet de manipuler un fichier binaire) : 

```
hexedit ch7.bin
L|k€y+*^*zo‚*€kvsno|*k€om*vo*zk}}*cyvksr
```

## Code Python

```
cypher = "L|k€y+*^*zo‚*€kvsno|*k€om*vo*zk}}*cyvksr"

ascii_len = 255

for i in range(ascii_len):
    flag = ""
    for letter in cypher:
        rang_ascii = ord(letter)
        n_rang = (rang_ascii + i) % ascii_len
        
        flag += chr(n_rang)
    print(flag, end="\n")
```

## 2ème version en Rust

```
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
```

Au décalage 245 on obtient la phrase flag.
