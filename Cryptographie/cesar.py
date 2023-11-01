import string
from crypto_utile import *

def cesar(text, key, S):
    text_crypt = ""
    n = len(S)
    for s in text: 
        rang_s = S.index(s)
        rang_c = (rang_s + key) % n
        c = S[rang_c]
        text_crypt = text_crypt + c
    return text_crypt

texte = "FIPPLKQCLRPZBPOLIXFKP"
S = string.ascii_uppercase
crypt = cesar(texte, 10, S)
print(crypt)

def cesar_brutorce(text, S):
    for key in range(1, len(S)):
        print(cesar(text, -key, S))

cesar_brutorce(texte, S)
