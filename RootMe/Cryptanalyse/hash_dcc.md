# Hash DCC

## Dump

[*] Dumping cached domain logon information (domain/username:hash)<br>
ROOTME.LOCAL/PODALIRIUS:$DCC2$10240#PODALIRIUS#9d3e8dbe4d9816fa1a5dda431ef2f6f1<br>
ROOTME.LOCAL/SHUTDOWN:$DCC2$10240#SHUTDOWN#9d3e8dbe4d9816fa1a5dda431ef2f6f1<br>
ROOTME.LOCAL/Administrator:15a57c279ebdfea574ad1ff91eb6ef0c:Administrator<br>

cypher = 15a57c279ebdfea574ad1ff91eb6ef0c:Administrator<br>

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 1100 correspond au hash.<br>

1100	Domain Cached Credentials (DCC), MS Cache	4dd8965d1d476fa0d026722989a6b772:3060147285011<br>

## Crack du hash avec hashcat 

```
echo "15a57c279ebdfea574ad1ff91eb6ef0c:Administrator" > /tmp/hash_dcc.txt
hashcat -m 1100 /tmp/hash_dcc.txt /usr/share/wordlists/rockyou.txt
```
