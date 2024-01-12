import socket 
import math
import base64

host = "challenge01.root-me.org"
port = 52023

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    question = client_socket.recv(1024).decode()
    print(question)
    
    search = question.split("'")
    code = search[1]
    
    result = base64.b64decode(code).decode()
    print(f"decoder = {result}")
    
    send_rep = (str(result) + "\n").encode()
    
    client_socket.send(send_rep)
    
    flag =  client_socket.recv(1024).decode()
    
    print(flag)
finally:
    client_socket.close()