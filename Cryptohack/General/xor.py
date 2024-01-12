def xor_string(code, integer):
    result = "";
    for letter in code:
        char_code = ord(letter);
        print(f"char code: {char_code}");
        xor_result = char_code ^ integer;
        print(f"xor result: {xor_result}");
        result += chr(xor_result);
        print(f"result: {result}");
        print();
    return result;



code = "label";
integer = 13;
flag = xor_string(code, integer);
crypto_flag = f"crypto{{{flag}}}";
print(f"flag: {crypto_flag}");
