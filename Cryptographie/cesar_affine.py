import string
from crypto_utile import *

def cesar_affine(texte, S):
    text_crypt = ""
    n = len(S)
    for lettre in texte:
        rang_lettre = S.index(lettre)
        rang_chiffre = ((15 * rang_lettre) + 13) % n
        chiffre = S[rang_chiffre]
        text_crypt+=chiffre
    return text_crypt

def cesar_decrypt(texte, S):
    text_decrypt = ""
    n = len(S)
    for lettre in texte:
        rang_lettre = S.index(lettre)
        rang_dechiff = ((7 * rang_lettre) + 13) % n
        dechiff = S[rang_dechiff]
        text_decrypt+=dechiff
    return text_decrypt

S = string.ascii_uppercase
texte2 = "SALUTCOMMENTCAVA"
temp = cesar_affine(texte2, S)
print(temp)
temp1 = cesar_decrypt(temp, S)
print(temp1)