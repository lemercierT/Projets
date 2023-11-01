import string

class Gamal:
    def __init__(self, p, g, a):
        self.p = p
        self.g = g
        self.a = a

    def gamalCrypt(self, lettre, b):
        A = pow(self.g, self.a, self.p)
        alphabet = string.ascii_lowercase
        rang_lettre = alphabet.index(lettre)
        rang_crypt = (rang_lettre * pow(A, b, self.p)) % self.p
        lettre_crypt = alphabet[rang_crypt]
        return lettre_crypt

gamal = Gamal(7, 5, 3)
print(f"Lettre cryptée : {gamal.gamalCrypt('f', 2)}")
