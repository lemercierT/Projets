function create_tab(tab: Array<Number>) {
  for (let i = 0; i < tab.length; i++) {
    console.log("valeur de tab de ", +i + "=", tab[i]);
  }
}
let array: Array<Number> = new Array<Number>(10);
create_tab(array);
