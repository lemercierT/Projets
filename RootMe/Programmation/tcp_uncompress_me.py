import socket
import base64
import zlib

host = "challenge01.root-me.org"
port = 52022

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    
    question = client_socket.recv(1024).decode();
    print(question)
    
    search = question.split("'")
    code = search[1]
    
    n1 = base64.b64decode(code)
    result = zlib.decompress(n1).decode()
    
    print(result)
    
    send = (str(result) + "\n").encode()
    
    client_socket.send(send)
    
    question2 = client_socket.recv(1024).decode()
    
    print(question2)
    
    search2 = question2.split("'")
    code2 = search2[1]
    
    n2 = base64.b64decode(code2)
    result2 = zlib.decompress(n2).decode()
    print(result2)
    
    send2 = (str(result2) + "\n").encode()
    
    client_socket.send(send2)
    
    question3 = client_socket.recv(1024).decode()
    print(question3)
    
    search3 = question3.split("'")
    code3 = search3[1]
    
    n3 = base64.b64decode(code3)
    result3 = zlib.decompress(n3).decode()
    print(result3)
    
    send3 = (str(result3) + "\n").encode()
    
    client_socket.send(send3)
    
    question4 = client_socket.recv(1024).decode()
    print(question4)
    
    search4 = question4.split("'")
    code4 = search4[1]
    
    n4 = base64.b64decode(code4)
    result4 = zlib.decompress(n4).decode()
    print(result3)
    
    send4 = (str(result4) + "\n").encode()
    
    client_socket.send(send4)
    
    question5 = client_socket.recv(1024).decode()
    print(question5)
    
    
finally:
    client_socket.close()
    
