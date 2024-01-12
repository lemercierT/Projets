# Hash MD5

## Chaîne a décoder :

cypher : 7ecc19e1a0be36ba2c6f05d06b5d3058

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 0 correspond au hash.<br>

0	MD5	8743b52063cd84097a65d1633f5c74f5<br>

## Crack du hash avec hashcat

```
echo "7ecc19e1a0be36ba2c6f05d06b5d3058" > /tmp/hash_md5.txt
hashcat -m 0 /tmp/hash_md5.txt /usr/share/wordlists/rockyou.txt
```