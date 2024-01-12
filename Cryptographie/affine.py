import string
from crypto_utile import *

def affine(mess, a, b, S):
    n = len(S)
    mc = ""
    for s in mess:
        rang_s = S.index(s)
        rang_c = (rang_s * a + b) % n
        mc += S[rang_c]
    return mc

    (aa, bb) = affine_inverse(a, b, len(S))
    return chiffrement_affine(mess, aa, bb, S)

def brutus(mess, S):
    L = premiers_avec(len(S))
    for a in L:
        for b in range(len(S)):
            print(affine(mess, a, b, S))

S = string.ascii_letters        
a= int(input("a : "))
b = int(input("b : "))
n = len(S)
inva = inverse_modulo(a, b)
if(inva == None):
    sys.exit("Fonction non inversible")

print()
mess = input("saisir un message :")
A = string.ascii_letters
mess_chiffre = affine(mess, a, b, A)
print()
print("message chiffre : ", mess_chiffre)

(aa, bb) = affine_inverse(a, b, n)
mess_dechiffre = affine(mess_chiffre, aa, bb, A)
print()
print("message dechiffre : ", mess_dechiffre)
print()

brutus(mess_chiffre, S);