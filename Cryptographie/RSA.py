from crypto_utile import * 
import string

p = 11;
q = 23;
n = p*q;

print(f"{p} est premier : {est_premier(p)}");
print(f"{q} est premier : {est_premier(q)}");

e = 3;
phi = (p - 1) * (q - 1);

print(f"le PGCD de e = {e} et phi = {phi} est {pgcd(e, phi)}");
print(f"cle publique : n = {n} e = {e}");

#chiffrement
alphabet = string.ascii_uppercase;
mess = "BONJOUR";
mess_num = [alphabet.index(s) for s in mess];
mess_chiffre = [pow(m, e, n) for m in mess_num];

print();
print("chiffrement du message : ");
print(f"0) message à envoyer : {mess}");
print(f"1) message numérisé : {mess_num}");
print(f"2) message chiffre : {mess_chiffre}");

#cle privé
d = inverse_modulo(e, phi);
print(f"cle prive pour dechiffrement : n = {n} | d = {d}");

#dechiffrement
mess_dechiffre_num = [pow(m, d, n) for m in mess_chiffre];
mess_dechiffre = "".join(alphabet[c] for c in mess_dechiffre_num);
print();
print("dechiffrement du message : ");
print(f"0) message chiffre recu : {mess_chiffre}");
print(f"1) message dechiffre numérisé : {mess_dechiffre_num}");
print(f"2) message dechiffre : {mess_dechiffre}");

mess_num = 1141309142017;
mess_chiffre = pow(mess_num, e, n);
print(f"message numérisé: {mess_num}");
print(f"message chiffre: {mess_chiffre}");

mess_dechiffre = pow(mess_chiffre, d, n);
print(f"message dechiffre: {mess_dechiffre}");

p = 9760959751111112041886431;
q = 8345523998678341256491111;
e = 45879256903;
n = p*q;
phi = (p - 1) * (q - 1);
d = inverse_modulo(e, phi);
print();
print(f"cle publique : \nn = {n}\ne = {e}");
print(f"cle privee: \nn = {n}\nd = {d}");
