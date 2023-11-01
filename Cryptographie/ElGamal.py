import math
import string
from crypto_utile import *

alphabet = string.ascii_lowercase;
message = 'f';
rang_lettre = alphabet.index(message);
lettre_no_crypt = message;
print(f"lettre non crypt : {message}");
print(rang_lettre);

p = int(input("saisir un entier :"));
g = int(input("saisir un entier inversible g modulo p :"));
private_key = int(input("saisir clé privée : "));
A = pow(g, private_key);
public_key = (p, g, A);

private_key_my = int(input("saisir votre clé privée : "));
rang_crypt = rang_lettre * pow(A, private_key_my);
print(f"mess crypt before %26 : ", rang_crypt);
rang_crypt = rang_crypt % p - 1;
print(f"mess crypt after %26 : ", rang_crypt);
lettre_crypt = alphabet[rang_crypt];
print(f"lettre crypt : {lettre_crypt}");

rang_decrypt = (rang_crypt * pow(A, private_key_my)) * pow(pow(A, private_key_my), -1);
print(rang_decrypt);




