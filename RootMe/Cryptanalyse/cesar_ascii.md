# Chiffrement par décalage - Cesar Ascii

## Récupération du fichier et traitement

Pour ce challenge un fichier .bin nous est passé.<br>

Utilisation de hexedit (permet de manipuler un fichier binaire) : 

```
hexedit ch7.bin
L|k€y+*^*zo‚*€kvsno|*k€om*vo*zk}}*cyvksr
```

## Code python

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

Au décalage 245 on obtient la phrase flag.