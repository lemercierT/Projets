import base64
import ascii_to_string

code = "HELLO";
print(f"code: {code}");

code_to_ascii = [ord(char) for char in code];
print(code_to_ascii);

hex_bytes = [f"0x{byte:02X}" for byte in code_to_ascii];
print("Hex bytes:", hex_bytes);

base16_string = ''.join(hex_bytes).replace('0x', '');
print("Base-16:", base16_string);

base10_string = int(base16_string, 16);
print("Base-10:", base10_string);

