import socket 
import re
import base64
from pyMorseTranslator import translator
import string

base85_regex = re.compile(r'^[0-9a-zA-Z.:+;=`^_!/~*?&<>()|{}@%$#-]+$')
base64_regex = re.compile(r'^[A-Za-z0-9+/=]+$')
base32_regex = re.compile(r'^[^a-z][A-Z2-7=]+$')
hex_regex = re.compile(r'^[^A-Z+/=][a-z0-9]+$')
morse_regex = re.compile(r'[^a-zA-Z][./-]')

def splitSpace(decode_morse):
    res = ""
    for letter in decode_morse:
        if letter != " ":
            res += letter
    return res

def my_base32(code):
    print("Base32")
    decoded_data = base64.b32decode(code).decode()
    print("Decoded: ", decoded_data)
    return decoded_data

def my_base64(code):
    print("Base64")
    decoded_data = base64.b64decode(code).decode()
    print("Decoded:", decoded_data)
    return decoded_data

def my_base85(code):
    print("Base85")
    decoded_data = base64.b85decode(code).decode()
    print("Decoded:", decoded_data)
    return decoded_data

def hex_to_str(code):
    print("Hex")
    bytes_str = bytes.fromhex(code)
    decoded_data = bytes_str.decode()
    print("Decoded: ", decoded_data)
    return decoded_data

def morseToGoodMorse(morse):
    print(morse)
    res = ""
    for i in range(0, len(morse) - 1):
        if morse[i + 1] == "/":
            res += morse[i] + " "
        elif morse[i] == "/":
            res += morse[i] + " "
        else:
            res += morse[i]
    res += morse[len(morse) - 1]
    return res

def decode_all(code: str):
    decoded_data = ""
    if hex_regex.search(code):
        return hex_to_str(code)
    elif morse_regex.search(code):
        print("Morse")
        decoder = translator.Decoder()
        decoded_data = decoder.decode(morseToGoodMorse(code)).plaintext
        res = splitSpace(decoded_data).lower()
        print("Decoded:", res)
        return res
    elif base32_regex.search(code):
        return my_base32(code)
    elif base64_regex.search(code):
        return my_base64(code)
    elif base85_regex.search(code):
        return my_base85(code)
    else:
        print("Error")

host = "challenge01.root-me.org"
port = 52017

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    question = client_socket.recv(1024).decode()
    print(question)
    
    code = question.split("'")[2]
    if code != " ":
        print("Code:", code)
        flag = decode_all(code)
        send = (str(flag) + "\n").encode()
        client_socket.send(send)
        for i in range(0, 100):
            question = client_socket.recv(1024).decode()
            print(question)
            code = question.split("'")[1]
            flag = decode_all(code)
            send = (str(flag) + "\n").encode()
            client_socket.send(send)
    else:
        print("Erreur lors de l'extraction du code")

finally:
    client_socket.close()
