let tab_assos = new Map<string, number>();
for(let i = 0; i < 10; i++){
    tab_assos.set("thibault"+i.toString(), i);
};
console.log(tab_assos.size)
tab_assos.forEach((string, number) => {
    console.log("value: ", string, "index: ", number);
})




