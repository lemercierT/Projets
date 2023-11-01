# sympy n'est pas utilisé ici
import random as rd
import sys

########################################################################
# division euclidienne de a par b dans Z
# retourne le quotient q et le reste r > 0
def div_euc(a,b):
	(q, r) = divmod(a, abs(b)) # q = a // abs(r), r = a % abs(b)
	if b < 0:
		return (-q, r)
	else:
		return (q, r)

########################################################################
# retourne le pgcd de a et b
def pgcd(a, b):
	a, b = abs(a), abs(b)
	if a < b:
		a, b = b, a
	while b != 0:
		a, b = b, a % b
	return a

########################################################################
# algorithme d'Euclide étendu, retourne le pgcd de a et b ainsi que
# les coefficients de Bézout u et v vérifiant au + bv = pgcd(a,b)
def euclid(a,b):
	u0, u1 = 1, 0
	v0, v1 = 0, 1
	r0, r1 = a, b
	while r1 != 0:
		(q, r) = div_euc(r0, r1)
		r0, r1 = r1, r
		u0, u1 =  u1, u0 - q * u1
		v0, v1 =  v1, v0 - q * v1
	return(u0, v0, r0)

########################################################################
# algorithme naïf de test de primalité
# retourne True si n est premier, False sinon
def est_premier_naif(n):
	if n < 2:
		return False
	elif n == 2:
		return True
	elif n % 2 == 0:
		return False
	else:
		k = 3
		while k * k <= n:
			if n % k == 0:
				return False
			else:
				k = k + 2
		return True

########################################################################
# retourne tous les nombres premiers inférieurs ou égaux à n
def eratosthene(n):
	L = list(range(n+1)) # liste des entiers de 0 à n
	L[1] = 0 # 1 n'est pas premier
	k = 2
	while k*k <= n:
		if L[k] != 0:
		# k est premier : on elimine k*2, k*3, etc
			for i in range(2, n // k + 1):
				L[k * i] = 0
		k += 1
	return [k for k in L if k !=0]

########################################################################
# algorithme naïf de décomposition de n en facteurs premiers
def facteurs_premiers(n):
	i = 2
	L = []
	while i * i <= n:
		if n % i:
			i += 1
		else:
			n //= i
			L.append(i)
	if n > 1:
		L.append(n)
	return {x : L.count(x) for x in L}

########################################################################
# retourne l'inverse de a modulo n
def inverse_modulo(a, n):
	(u, v, m) = euclid(a,n)
	if m == 1:
		return u % n # au cas où u < 0
	else:
		return None

########################################################################
# retourne la liste des nombres premiers avec n
def premiers_avec(n):
	if est_premier(n):
		return [a for a in range(1, n)]
	L = [1]
	for a in range(2, n):
		if pgcd(a,n) == 1:
			L.append(a)
	return L

########################################################################
# retourne la fonction d'Euler de n
# phi(n) est le nombre d'entiers inférieurs à n et premiers avec n
def phi_de(n):
	if est_premier(n):
		return n-1
	else:
		return len(premiers_avec(n))

########################################################################
# fonction affine inverse
def affine_inverse(a, b, m):
	aa = inverse_modulo(a, m)
	if aa != None:
		bb = (aa * (-b)) % m
		return (aa, bb)
	else:
		return (None, None)

########################################################################
# retourne la racine carrée entière de n
# c.à-d. le plus grand entier x tel que x*x <= n
def iracine(n):
	if n == 1:
		return 1
	x = n
	y = (x + n // 2) // 2
	while y < x:
		x = y
		y = (x + n // x) // 2
	return x
	
########################################################################
# retourne la décomposition de n = p*q, p et q premiers
# utilisable quand |p - q| est petit (sinon trop long)
def fermat(n):
	a = iracine(n)
	a = a + 1
	b2 = a*a - n
	b = iracine(b2)
	while b*b != a*a - n:
		a = a + 1
		b2 = b2 + 2*a + 1 # <==> b2 = a * a - n
		b = iracine(b2)
	return (a+b, a-b)
	

########################################################################
# réalise un permutation des éléments de la liste L
def permut(L):
	N = len(L)
	for i in range(N-1):
# 		nombre au hasard entre i et N-1 inclus
		v = rd.randint(i,N-1) # N-1 est inclus
		yam = L[i]
		L[i] = L[v]
		L[v] = yam
	return L

########################################################################
# algorithme de Rabin Miller : test la primalité d'un nombre n
# n doit être un entier IMPAIR >= 3
def rabinMiller(n):
	if n == 3:
		return True
	s = n - 1
	t = 0
	while s % 2 == 0:
		s = s // 2
		t += 1
	for essais in range(25):
		a = rd.randrange(2, n - 1)
		v = pow(a, s, n)
		if v != 1:
			i = 0
			while v != (n - 1):
				if i == t - 1:
					return False
				else:
					i = i + 1
					v = (v ** 2) % n
	return True


########################################################################
# test de primalité
# 1) existence d'un diviseur dans l'ensemble eratosthene(1000)
# 2) puis Rabin Miller
def est_premier(n):
	L = eratosthene(1000)
	if n < 2:
		return False
	if n in L:
		return True
# 	if n < 1000 :
# 		return False
	for p in L:
		if n % p == 0:
			return False
	return rabinMiller(n)
# remarque : si n > 10 et si n%10 not in {1,3,7,9} => n non premier

########################################################################
# génère et retourne un nombre premier de taille t bits
# pour t = 5 : [2**4, 2**5 - 1] = [16, 31]
# pour t = 10 : [2**9, 2**10 - 1] = [512, 1023]
def genere_premier(t):
	if t < 2:
		sys.exit("taille minimale : 2 bits")
	while True:
		x = rd.randint(2**(t-1), 2**t - 1)
		if est_premier(x):
			return x

########################################################################
# génère retourne un module de taille de taille t bits
def genere_module(t):
	trials = 0
	while trials < 20 :
		p = genere_premier(t // 2)
		q = genere_premier(t - t // 2)
		if q == p:
			continue
		n = p * q
		if n.bit_length() != t:
			trials += 1
			continue
		return n, p, q
	sys.exit("ATTENTION : impossible de générer un module de cette taille")

########################################################################
# génération de clés RSA pour n de longueur t bits
# limitation de la cle publique : e in {3, 5, 17, 257, 65537}
def genere_cles_rsa(t = 256):
	n, p, q = genere_module(t)
	phi = (p - 1) * (q - 1)
	E = permut([3, 5, 17, 257, 65537])
	for e in E:
		(d, v, m) = euclid(e, phi)
		if e < phi and m == 1:
			d = d % phi
			return n, e, d
	sys.exit("ATTENTION : génération impossible avec ce paramètre")
	
########################################################################
# génération de clés RSA pour n de longueur t bits
# la clé publique e est un paramètre
def genere_cles_rsa_exp(t = 256, e = 3):
	if e < 3 or e % 2 == 0:
		sys.exit("ATTENTION : l'exposant doit être impair et >= à 3")
	for i in range(25): # 25 tentatives au plus
		n, p, q = genere_module(t)
		phi = (p - 1) * (q - 1)
		(d, v, m) = euclid(e, phi)
		if e < phi and m == 1:
			return n, d % phi
	sys.exit("ATTENTION : échec de la génération avec ces deux paramètres")


if __name__ == '__main__':
    print("Module crypto_utile : des fonctions pour le chiffrement")