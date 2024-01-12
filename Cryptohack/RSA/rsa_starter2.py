import math

p = 17;
q = 23;

N = p * q;
e = 65537;
res = pow(12, e, N);

print(res);