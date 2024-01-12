import string;
from crypto_utile import *
import matrix

def cesar(texte, decalage, alphabet):
    text_crypt = "";
    alpha_size = len(alphabet);
    for lettre in texte:
        rang_lettre = alphabet.index(lettre);
        rang_crypt = (rang_lettre + decalage) % alpha_size;
        lettre_crypt = alphabet[rang_crypt];
        text_crypt+=lettre_crypt;
    return text_crypt;

texte = "SALUTJEMAPELLEROOTTT";
all_letters = string.ascii_uppercase;
text_crypt = cesar(texte, 1, all_letters);
print(f"texte : ${texte}\ntexte crypté : ${text_crypt}");

def cesar_bruteForce(texte_crypt, alphabet): 
    for decalage in range(1, len(alphabet)):
        print(cesar(text_crypt, decalage, alphabet));

cesar_bruteForce(text_crypt, all_letters);