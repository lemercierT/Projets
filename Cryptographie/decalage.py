import os

with open('crypt.txt', 'rb') as file:
    data = file.read()

out_bytes = bytearray()

for byte in data:
    new_byte = byte - 3
    out_bytes.append(new_byte)
    out = out_bytes.decode('utf-8')
    print(byte, new_byte, out + "\n")

out = out_bytes.decode('utf-8')

print(out)