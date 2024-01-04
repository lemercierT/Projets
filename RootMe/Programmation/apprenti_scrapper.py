# temps passé 1h30, programme en cours de développement...

import requests
import socket
import time
import re
import string


# port = 8000
# url = f"http://ctf14.root-me.org:{port}/"
# requete = requests.get(url)
# reponse = requete.text
# print(reponse)

class_regex = re.compile(r'[class=]{6}')
random_regex = re.compile(r'[random=]{7}')
lang_regex = re.compile(r'[lang=]{5}')
id_regex = re.compile(r'[id=]{3}')
nonce_regex = re.compile(r'[nonce=]{6}')

def scrapUrlFirst(question):
    return question.split("\"")[21].replace("XX", "14")


def scrapQuestion(question: str, url):
    question = question.split("Question")[2]
    print(f"question {question}")
    if class_regex.search(question):
        element = question.split("class=")[1].split("\"")[0]
        indice = question.split("What's the")[1].split("with")[0]
        print(indice)
        print(element)
        scrapElement(url, element, indice)
    elif random_regex.search(question):
        element = question.split("random=")[1].split("\"")[0]
        indice = question.split("What's the")[1].split("with")[0]
        print(indice)
        print(element)
        scrapElement(url, element, indice)
    elif lang_regex.search(question):
        element = question.split("lang=")[1].split("\"")[0]
        indice = question.split("What's the")[1].split("with")[0]
        print(indice)
        print(element)
        scrapElement(url, element, indice)
    elif id_regex.search(question): 
        element = question.split("id=")[1].split("\"")[0]
        indice = question.split("What's the")[1].split("with")[0]
        print(indice)
        print(element)
        scrapElement(url, element, indice)
    elif nonce_regex.search(question):
        element = question.split("nonce=")[1].split("\"")[0]
        indice = question.split("What's the")[1].split("with")[0]
        print(indice)
        print(element)
        scrapElement(url, element, indice)
    else:
        print("Simple question")
        
def whatSearch(indice: str):
    if indice.find("outerHTML") or indice.find("innerText") or indice.find("innerHTML"):
        tag = indice.split(" ")[6]
        print(f"tag = {tag}")
        
        

def scrapElement(url, element, indice):
    whatSearch(indice)
    requete = requests.get(url)
    if requete.status_code == 200:
        dom = requete.text
        if dom.find(element):
            array = dom.split(element)
            print("DOOOMMM", len(array))
    else:
        print("Erreur requete")
        
        

host = "ctf14.root-me.org"
port = 4444

client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    client_socket.connect((host, port))
    question = client_socket.recv(1024).decode()
    
    time.sleep(1)
    
    question = client_socket.recv(1024).decode()
    
    url_flag = scrapUrlFirst(question)
    print(url_flag)
    element = scrapQuestion(question, url_flag)
    
finally:
    client_socket.close()