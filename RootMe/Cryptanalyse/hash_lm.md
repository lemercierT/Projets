# Hash LM

## Dump 

[*] Target system bootKey: 0xf1527e4742bbac097f937cc4ac8508e4
[*] Dumping local SAM hashes (uid:rid:lmhash:nthash)
Administrator:500:d3bf255c530633b9aad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::
Guest:501:aad3b435b51404eeaad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::
ASPNET:1025:aad3b435b51404eeaad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::
DBAdmin:1028:aad3b435b51404eeaad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::
sshd:1037:aad3b435b51404eeaad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::
service_user:1038:aad3b435b51404eeaad3b435b51404ee:31d6cfe0d16ae931b73c59d7e0c089c0:::

cypher = d3bf255c530633b9aad3b435b51404ee

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 3000 correspond au hash.<br>

3000	LM	299bd128c1101fd6<br>

## Crack du hash avec hashcat 

```
echo "$DCC2$10240#tom#e4e938d12fe5974dc42a90120bd9c90f" > /tmp/hash_lm.txt
hashcat -m 2100 /tmp/hash_lm.txt /usr/share/wordlists/rockyou.txt
```