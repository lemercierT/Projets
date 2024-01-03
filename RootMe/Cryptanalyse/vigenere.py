import string

array_vigenere = [
    ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"], 
    ["B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A"], 
    ["C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B"], 
    ["D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C"], 
    ["E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D"], 
    ["F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E"], 
    ["G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F"], 
    ["H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G"], 
    ["I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H"], 
    ["J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I"], 
    ["K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J"], 
    ["L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K"], 
    ["M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"], 
    ["N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"], 
    ["O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N"], 
    ["P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O"], 
    ["Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P"], 
    ["R", "S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q"], 
    ["S", "T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R"], 
    ["T", "U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S"], 
    ["U", "V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T"], 
    ["V", "W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U"], 
    ["W", "X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V"], 
    ["X", "Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W"], 
    ["Y", "Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X"], 
    ["Z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y"]
];

key = "THEMENTOR";
cypher = "Moi Tepdsi Fhrujrlhf  Nu egxex g'vla jmmg ifvgkvq ehcclkk'lgm, p'xgk ihvfshm rrgz pqw whiighyj. \"Wptbutsi: Gr nwccxzgqrg tfixai bshk qibti urshfdtamcyr, \"Tfixzxmxvhb u'nu 'lmgxxf' riyie pr iwitaesi q'nbv uhrcyr\"...  Loktuie kblgvl, asgw yxg dxtie.  Qnbg rold hshl, rrgz zaxex djrjlapbzwv xu xdsvl dzxji qx ihhix wvajve hvvoragethzjbi pi 1950, hg xfny tqrfx o ixnedhrk zv fvrpi qxfiblvq prl mvne h'gr utqbxy?  Rq zbng vmlw hshl xrfhme hrfoewl gq uhb z'rohmf jnbh rzpv, cyrezvl msdgrl z'rohmqrg fcuxsi? Vi fnwj nu lmgxxf, vgavqd qtbj fvr ysaws... Cx tmqr rlh lg tszhr jiz vvqyiavs rolg x'iphzv... Cl wgmf izll hwfypbslq xyq pn izlihvf hrl olmyie iayoemz, pqw phbexymqw dn'wcl t'ebtexbexux yi ytgjxux...  Vi fnwj tb gapyxuv hb eg plvsv. C'hm qgbnhv elw bvbysjllydw rqdcbxyqv chii eh ugmaswvfl jamf vcdflrf vrwizkl yzi skotmpsz.  Nr e'oz vvqbvvl. \"Bfg Tqq Hhuczl, qi zi cxio ihw ysamfvk tsz xetjrbs. Nq p'nb trba hmrf fo kxai\" Eegtbv zvweif. Bz c't jidxnbbvflrf gbiwv. Mvye prl avflw.  V'ev yozm brq hrvclolvfi nnxfnyh'tyv. C'oz mysgzr nb fkkmzegxii. Taxqrql iex tmzygx, q'vla gasy. Vo wtpx oi dns ax cigb. Fb ço wtpx grr xfixbv, o'ifm drkji cyr cs dx zyuw ceoeml. Tmw ctftx xy'up ax a'rbti bef... Gw gtygq uh'bz jx zizx zxbrvl tmv zhw... Eb wedgr ji'ze wizwr jiv cl wgmf iskba jupbnl... Eb wedgr ji'ze u'euqr ioj xuwqmtgsi xa ug'my gs uxcvmmg ioj xavq pn... Loktuie kblgvl. Asgx px el'bs jmmg v'sjm qsgie. Mcll sie qrfsj.  Xa exsel q'vla edvvos... lgl tavgx g'vla sgzrkhv lbv xi zhbux... Zi bvrvwgbaezx n mfrolve pn ewxgl xqprivfgpugi phadx ki x'lrkczgl hmrf esj olmzif w'ie tjgds, hgs zfwyxwvhb velgfvbgwhnl iex rgjfrli, Ar exqyxygti hg fvybkq e y'bbthttqxrgqv jbsfmqbsegl... yz wrkjvny iex gkclol.  Zayf ocll yibigxn hnl rayf lcdflw fshl drklmxw...  Bg o vml rayekw r eh tqxvms tnppxiex rv uvyrjr iclk iini n e'sthsi cyngr fg hzmmg yozf k'yz wgxob... Elw rvnzavgaw pi iboewl ugi y'hb ehbw m pnbgjx lxmmrgh gkl-qmguxg vm zezw thûh. Fg h ifi qhazgl tmv qxg jtkmcyrl cl bnravr ioi wlw mtnmvzjbie. Prl gvnsw cyv tjrblrf hrl qyhzie e ahij twtdiawfv mysgzrksem kie iyxjvl csxsamozklw, yevl qvne gu wbgh thtqq hrl ufnaxqw qtbj el hqwfxfk.  V'lwf rbmfv fvrpi ztwemlrmrg... Es dhuhq hr e'scxjxdsa xh ux s'mzxrkfliaigv, yt pvtbxq hh uolw. Usgw hmwcbzszw hg gvkcmoi qxxr xemexngh, Jtuw belxf tx xyu tbnfitpx qxex pfg tedgux gz vl r'qxnbh gtz pm tehdiblxq hr zzfnaszw ckcwbaigvf, xh mhbw zshl ogilpqd pkwdbuixw. Ahij xetxsehbj... xa zayf gcll htbiyxn tkpqurreg. Ehbw dipasivoszw yt qfgueuwftbtx... lx hshl bfnz ebtresq vymymaxzj.  Gvye ikbgkhuw eeal qfnsigv qx dvtb, wmrf gokbvrmpvms, jtuw pstfs ixsmsmrnl... vm csgw ahij twtqprs qibtmziyl. Jfnz garfmflbzil hrl pffiie eghazjbie, zbng wbuezgrs zvl nyqvexg, Mhbw zi cnbzlzil tnl zvl wefvbgg ux se yesbo rne vuguxg rovgmxf, Ocll hweeflwexg if xebqyxg, zayf foebwyxim xh ehbw yiamsq xu iewnroem ki zshl trbyi ovbbfv jbi o'ifm dfny raxex dihwvq fvxb vmyi, qx ahij lvqyif xbthyi pif vfzfprqpf.  Hiz, cl wgmf nb tkpqurre. Afg jvuqr xgk vlpgm qx zr vbvusfbhv. Fvr ovvfs vla gqphb rv cbkqv yxg xxuw bee vs hn'ppe trggvga if hvls, gtz wqpbg zvny ebtnksevl. Qar pkwdx lwf hr ocll zydtnlgvk, xyqpdns tavwq uhx jfnz rq qr ioiwvrziexn atteuw.  Wx glbz yz lnvyvk, lx oipb sjm tsz qngwwxzxq. Zbng ghbzqd nkfvmlv oig bbubcmpy, ztwj ovye rr iclold bef mcll usgw nkfvmlv... Mtexg khbx, zshl gfftie xbng cxz qqqrl. ".upper().split(" ");

i = 0;
len_cypher = len(cypher);

for word in cypher:
    decrypted_word = "";

    for char in word:
        if char != " " and (char != "'" and char != "\"" and char != "," and char != "." and char != ":" and char.isalpha() and char != "Ç" and char != "Û"):
            key_char = key[i % len(key)];
            index_row = array_vigenere[0].index(key_char);
            index_col = array_vigenere[index_row].index(char);
            decrypted_letter = array_vigenere[0][index_col];

            decrypted_word += decrypted_letter;
            i += 1;
        elif char == "'":
            decrypted_word += "'";
        elif char == "\"":
            decrypted_word += "\"";
        elif char == ",":
            decrypted_word += ",";
        elif char == ".":
            decrypted_word += ".";
        elif char == ":":
            decrypted_word += ":";
        elif char.isnumeric():
            decrypted_word += char;
        elif char == "Ç":
            decrypted_word += "Ç";
        elif char == "Û":
            decrypted_word += "Û";
        else:
            decrypted_word += " ";

    print(decrypted_word, end=" ");

print();  
