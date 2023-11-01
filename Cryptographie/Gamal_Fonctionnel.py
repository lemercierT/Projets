import random as rnd
from crypto_utile import *
import string
S = string.ascii_uppercase

mess = "SALUTATIONSMONTRESHCERECOMMENTCAVA"
L = [S.index(c)+1 for c in mess]
print("Liste des rangs des caractères du message : L =", L)
p = genere_premier(200)
a = rnd.randint(1, 1000)
g = rnd.randint(1, p-1)
A = pow(g, a, p)
print(f"clef privée d'Alice : a = {a}")
print(f"clef publique d'Alice : p = {p}\t g = {g}\t A = {A}")

b = rnd.randint(1, 1000)
B = pow(g, b, p)
print(f"clef privée de Bob   : b = {b}")
print(f"clef publique de Bob : p = {p}\t g = {g}\t B = {B}")

m = 0
for c in L:
    m = m * 27 + c
print(f"Message numérisé chiffré est m = {m}")
M = m * pow(A, b, p)
M = M % p
print(f"Message chiffré par Bob : {M}")

aux = inverse_modulo(B, p) # pow(B, -1, p) pour python 9 ou plus
md = M * pow(aux, a, p)
md = md % p
print(f"Message numérisé déchiffré par Alice : {md}")
mess = ""
while md > 0:
    (md, c) = divmod(md, 27)
    mess = S[c-1] + mess
print(f"Message déchiffré est : {mess}")