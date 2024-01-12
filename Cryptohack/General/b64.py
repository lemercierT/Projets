import base64
import string

code_hex = "72bca9b68fc16ac7beeb8f849dca1d8a783e8acf9679bf9269f7bf";
code_hex_alpha = [];
tab_hex = [];
tab_bytes = [];
tab_flag = [];
newtab = [];


temp = bytes.fromhex(code_hex)
newtab.append(base64.b64encode(temp));
    
print(newtab);

    
    
    
