# Python - PyJail 1

## Procédure

L'objectif de ce challenge est de sortir de l'environnement python.

1. Test des fonctions de base

```
Welcome to my Python sandbox! Everything is in exit() function (arg == get the flag!)
>>> exit()
TypeError : exit() takes exactly 1 argument (0 given)
>>> exit(1)
You cannot escape !
>>>
```

2. Examination des constantes présente dans la fonction exit()

```
>>> print(exit.func_code.co_consts)
(None, 'flag-WQ0dSFrab3LGADS1ypA1', -1, 'cat .passwd', 'You cannot escape !')
```

3. Exit la PyJail 

```
exit(exit.func_code.co_consts[1])
Well done flag : YjXXXXXXXXXXXubR
Connection to challenge02.root-me.org closed.
```