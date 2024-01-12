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

cypher = 31d6cfe0d16ae931b73c59d7e0c089c0

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 1000 correspond au hash.<br>

1000	NTLM	b4b9b02e6f09a9bd760f388b67351e2b<br>

## Crack du hash avec hashcat 

```
echo "31d6cfe0d16ae931b73c59d7e0c089c0" > /tmp/hash_nt.txt
hashcat -m 1000 /tmp/hash_nt.txt /usr/share/wordlists/rockyou.txt
```