# Temps passé 1h30, en cours de développement...

import socket 
from sympy import symbols, Eq, solve
import re

def executeFunctionFirst(question: str):
    numbers = selectNumberFirst(question)
    flag = solveEquation(numbers[0], numbers[1], numbers[2], numbers[3], numbers[4])
    send = str(flag + "\n").encode()
    client_socket.send(send)

def selectNumberFirst(question: str):
    question = question.split(" ")
    first = int(question[196].strip().split(".")[0])
    second = int(question[198].strip().split(".")[0])
    signe = question[199].strip()
    const = int(question[200].strip())
    resultat = float(question[202].strip().replace("\n", "").replace("?>", ""))
    print("first = ", first)
    print("second = ", second)
    print("signe = ", signe)
    print("const = ", const)
    print("resultat = ", resultat)
    
    res_equation = []
    
    return [first, second, signe, const, resultat]

def executeFunction(question: str):
    numbers = selectNumber(question)
    flag = solveEquation(numbers[0], numbers[1], numbers[2], numbers[3], numbers[4])
    send = str(flag + "\n").encode()
    client_socket.send(send)

def selectNumber(question: str):
    question = question.split(" ")
    first = int(question[6].strip().split(".")[0])
    second = int(question[8].strip().split(".")[0])
    signe = question[9].strip()
    const = int(question[10].strip())
    resultat = float(question[12].strip().replace("\n", "").replace("?>", ""))
    print("first = ", first)
    print("second = ", second)
    print("signe = ", signe)
    print("const = ", const)
    print("resultat = ", resultat)
    
    res_equation = []
    
    return [first, second, signe, const, resultat]
        
def solveEquation(first, second, signe, const, resultat):
    res_equation = []
    
    x = symbols("x")
    
    if signe == "+":
        equation = Eq(first*x**2 + second*x + const, resultat)
    
        res_equation = solve(equation, x)
    elif signe == "-":
        equation = Eq(first*x**2 + second*x - const, resultat)
    
        res_equation = solve(equation, x)
    else:
        print("Error signe")
    
    print(res_equation)
    
    plus_regex = re.compile(r'[+]')
    moins_regex = re.compile(r'[-]')
    
    try:
        if res_equation[0] != "":
            x1 = "{:.3f}".format(res_equation[0])
            print("x1 = ", x1)
        
        if res_equation[1] != "":
            x2 = "{:.3f}".format(res_equation[1])
            print("x2 = ", x2)
            
        if x1 and x2:
            return f"x1: {x1} ; x2: {x2}"
        elif x1 and not x2:
            return f"x: {x1}"
    except:
        return "Not possible"

    

host = "challenge01.root-me.org"
port = 52018

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    question = client_socket.recv(1024).decode()
    print(question)
    
    executeFunctionFirst(question)
    
    for i in range(0, 25):
        question = client_socket.recv(1024).decode()
        print("QUESTION: ", question)
        executeFunction(question)
        
finally:
    client_socket.close()