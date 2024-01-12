import socket 
import math
import codecs

host = "challenge01.root-me.org"
port = 52021

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    
    question = client_socket.recv(1024).decode();
    print(question)
    
    search = question.split("'")
    code = search[1]
    
    result =  codecs.decode(code, "rot13")
    
    print(result)
    
    send_socket = (str(result) + "\n").encode()
    
    client_socket.send(send_socket)
    
    flag = client_socket.recv(1024).decode();
    
    print(flag)
finally:
    client_socket.close()