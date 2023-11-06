import string

code = "63,72,79,70,74,6f,7b,59,6f,75,5f,77,69,6c,6c,5f,62,65,5f,77,6f,72,6b,69,6e,67,5f,77,69,74,68,5f,68,65,78,5f,73,74,72,69,6e,67,73,5f,61,5f,6c,6f,74,7d";
tab_code = code.split(",");
print(tab_code);
taille_code = len(code);
char = "";
flag = [];

for i in range(0, len(tab_code)):
    print(bytes.fromhex(tab_code[i]));
    flag.append(bytes.fromhex(tab_code[i]));

print(f"flag: {flag}");




    
