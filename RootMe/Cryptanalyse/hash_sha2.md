# Hash SHA-256

## Chaîne a décoder :

cypher = 96719db60d8e3f498c98d94155e1296aac105ck4923290c89eeeb3ba26d3eef92

## Règle pour SHA2

La chaîne est normalement constitué des caractères 0-9A-F et l'on apperçoit un k dans la chaîne.<br>

## Nouvelle chaîne 

cypher = 96719db60d8e3f498c98d94155e1296aac105c4923290c89eeeb3ba26d3eef92

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 1400 correspond au hash.<br>

1400	SHA2-256	127e6fbfe24a750e72930c220a8e138275656b8e5d8f48a98c3c92df2caba935

## Crack du hash avec hashcat

```
echo "96719db60d8e3f498c98d94155e1296aac105c4923290c89eeeb3ba26d3eef92" > /tmp/hash_sha256.txt
hashcat -m 1400 /tmp/hash_sha256.txt /usr/share/wordlists/rockyou.txt
```