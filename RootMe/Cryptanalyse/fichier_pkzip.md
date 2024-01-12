# Fichier - PKZIP

L'objectif de ce challenge est de cracker le mot de passe du fichier zip.

## Détection du hash avec zip2john

```
zip2john -m Desktop/ch5.zip
Using file 'magic' signatures if applicable (not 100% safe)
ver 2.0 efh 5455 efh 7855 ch5.zip/readme.txt PKZIP Encr: TS_chk, cmplen=99, decmplen=111, crc=EE166206 ts=005C cs=005c type=8
ch5.zip/readme.txt:$pkzip$1*1*2*0*63*6f*ee166206*0*3d*8*63*005c*4cd0f9313784d20fdf0eb52e155682a0444ecadc04d2b2e34778b8aeec2dc025e79e6d9b2f6b3e6ee1c9269a50ff858f75f90c16f8cbe1980fd46747f1b2dbd47b92199a57b3c52f9ffeeb50bcdad0e38c88e3308051f32fde0158941432ab2e3b8c1e*$/pkzip$
```

```
cypher = "$pkzip$1*1*2*0*63*6f*ee166206*0*3d*8*63*005c*4cd0f9313784d20fdf0eb52e155682a0444ecadc04d2b2e34778b8aeec2dc025e79e6d9b2f6b3e6ee1c9269a50ff858f75f90c16f8cbe1980fd46747f1b2dbd47b92199a57b3c52f9ffeeb50bcdad0e38c88e3308051f32fde0158941432ab2e3b8c1e*$/pkzip$"
```

## Détection du mode du hash avec https://hashes.com/en/tools/hash_identifier

Réponse du site : Possible algorithms: PKZIP (Compressed)

## Recherche du mode du hash sur https://hashcat.net/wiki/doku.php?id=example_hashes

Le mode 17200 correspond au hash.<br>

```
17200	PKZIP (Compressed)	$pkzip2$1*1*2*0*e3*1c5*eda7a8de*0*28*8*e3*eda7*5096*a9fc1f4e951c8fb3031a6f903e5f4e3211c8fdc4671547bf77f6f682afbfcc7475d83898985621a7af9bccd1349d1976500a68c48f630b7f22d7a0955524d768e34868880461335417ddd149c65a917c0eb0a4bf7224e24a1e04cf4ace5eef52205f4452e66ded937db9545f843a68b1e84a2e933cc05fb36d3db90e6c5faf1bee2249fdd06a7307849902a8bb24ec7e8a0886a4544ca47979a9dfeefe034bdfc5bd593904cfe9a5309dd199d337d3183f307c2cb39622549a5b9b8b485b7949a4803f63f67ca427a0640ad3793a519b2476c52198488e3e2e04cac202d624fb7d13c2*$/pkzip2$
```

## Crack du hash avec hashcat 

```
echo "$pkzip$1*1*2*0*63*6f*ee166206*0*3d*8*63*005c*4cd0f9313784d20fdf0eb52e155682a0444ecadc04d2b2e34778b8aeec2dc025e79e6d9b2f6b3e6ee1c9269a50ff858f75f90c16f8cbe1980fd46747f1b2dbd47b92199a57b3c52f9ffeeb50bcdad0e38c88e3308051f32fde0158941432ab2e3b8c1e*$/pkzip$" > /tmp/hash_pkzip.txt
hashcat -m 17200 /tmp/hash_pkzip.txt /usr/share/wordlists/rockyou.txt
```



