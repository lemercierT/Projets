# Hash DCC2

## Dump

[*] Dumping cached domain logon information (domain/username:hash)<br>
ROOTME.LOCAL/PODALIRIUS:$DCC2$10240#PODALIRIUS#9d3e8dbe4d9816fa1a5dda431ef2f6f1<br>
ROOTME.LOCAL/SHUTDOWN:$DCC2$10240#SHUTDOWN#9d3e8dbe4d9816fa1a5dda431ef2f6f1<br>
ROOTME.LOCAL/Administrator:$DCC2$10240#Administrator#23d97555681813db79b2ade4b4a6ff25<br>

cypher = $DCC2$10240#Administrator#23d97555681813db79b2ade4b4a6ff25<br>

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 2100 correspond au hash.<br>

2100	Domain Cached Credentials 2 (DCC2), MS Cache 2	$DCC2$10240#tom#e4e938d12fe5974dc42a90120bd9c90f<br>

## Crack du hash avec hashcat 

```
echo "$DCC2$10240#tom#e4e938d12fe5974dc42a90120bd9c90f" > /tmp/hash_dcc2.txt
hashcat -m 2100 /tmp/hash_dcc2.txt /usr/share/wordlists/rockyou.txt
```