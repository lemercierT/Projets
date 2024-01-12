import string
import math
from crypto_utile import *

class Figure:
    longeur = 0
    largeur = 0
    
    def __init__(self, longeur, largeur):
        self.longeur = longeur
        self.largeur = largeur
    
    def calcultaille(self):
        return self.longeur * self.largeur
    
    
figure = Figure(10, 10)
print(figure.calcultaille())