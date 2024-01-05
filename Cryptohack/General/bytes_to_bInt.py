import base64

base10_string = 11515195063862318899931685488813747395775516287289682636499965282714637259206269
base16_string = format(base10_string, 'X')
hex_bytes = [];

for i in range(0, len(base16_string), 2):
    hex_bytes.append(base16_string[i] + base16_string[i + 1]);

code_to_ascii = [];
for i in range(0, len(hex_bytes)):
    code_to_ascii.append(int(hex_bytes[i], 16));

decoded_code = [];
for i in range(0, len(code_to_ascii)):
    decoded_code.append("".join(chr(code_to_ascii[i])))
    
chaine = "";
for i in range(0, len(decoded_code)):
    chaine += decoded_code[i];

print(f"Base-10: {base10_string}")
print(f"Decoded Code: {decoded_code}")
print(f"chaine: {chaine}");

b16 = format(base10_string, "X");
print(b16);
