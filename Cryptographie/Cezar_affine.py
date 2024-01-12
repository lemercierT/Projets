import string
from crypto_utile import *

def affine(texte, a, b, alphabet):
    texte_crypt = "";
    alpha_size = len(alphabet);
    for lettre in texte: 
        rang_lettre = alphabet.index(lettre);
        rang_crypt = (a * rang_lettre + b) % alpha_size;
        lettre_crypt = alphabet[rang_crypt];
        texte_crypt+=lettre_crypt;
    return texte_crypt;

def affine_bruteForce(texte, alphabet):
    nbr_premier = premiers_avec(len(alphabet));
    for premier in nbr_premier:
        for value in range(len(alphabet)):
            print(affine(texte, premier, value, alphabet));

all_letters = string.ascii_uppercase;
a = int(input("a : "));
b = int(input("b : "));
inversible = inverse_modulo(a, b);
if(inversible == None):
    sys.exit("Fonction non inversible");

texte = input("saisir un texte : ");
texte_crypt = affine(texte, a, b, all_letters);
print(texte_crypt);

affine_bruteForce(texte_crypt, all_letters);