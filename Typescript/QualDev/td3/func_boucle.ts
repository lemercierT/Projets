const tab = [1, 5, 8, 25];

//Classique
for(let i = 0; i < tab.length; i++){
    console.log("tab: ", tab[i]);
}
//Evoluée
for(const value of tab){
    console.log("value 1: ", value);
}
//Fonctionnelle
tab.forEach(function(value: number){
    console.log("value2", value);
})
//Fonctionnelle2
tab.forEach((value: number) => {
    console.log("value3 :", value);
})

/////////////////////////////////////////////////////////

tab.forEach((value: number) => value = value * 2);
tab.forEach(value => {
    value = value * 2;
    console.log("value4 :", value);
})

/////////////////////////////////////////////////////////

tab.forEach((value, index) => {
    tab[index] = value * 2;
    console.log("tab[", index, "]", tab[index]);
})

////////////////////////////////////////////////////////

tab.forEach(console.log);
