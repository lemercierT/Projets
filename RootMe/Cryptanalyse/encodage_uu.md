# Encodage UU 

## Chaîne a décoder :

cypher : B5F5R>2!S:6UP;&4@.RD*4$%34R`](%5,5%)!4TE-4$Q%\"@``

## Code python

```import binascii

cypher = "B5F5R>2!S:6UP;&4@.RD*4$%34R`](%5,5%)!4TE-4$Q%\"@``"
flag = binascii.a2b_uu(cypher)

print(f"flag is {flag}")
```
