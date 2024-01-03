import socket
import math
import os

host = "challenge01.root-me.org"
port = 52002

def root_square(n1, n2):
    resultat_math = math.sqrt(n1) * n2
    result = round(resultat_math, 2)
    return result

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM);

try:
    client_socket.connect((host, port))
    
    question = client_socket.recv(1024).decode()
    print(f"Question : {question}")
    
    nombre = question.split(" ")
    nombre1 = float(nombre[24])
    nombre2 = float(nombre[28])
    
    print(f"Nombre 1 : {nombre1}")
    print(f"Nombre 2 : {nombre2}")
    
    resultat = float(root_square(nombre1, nombre2))
    
    print(f"Resultat : {resultat}")
    
    sent_socket = (str(resultat) + "\n").encode() 
    
    client_socket.send(sent_socket)
    
    flag = client_socket.recv(1024).decode();
    
    print(f"the flag is : {flag}")
    
    
  
    
finally:
    client_socket.close()