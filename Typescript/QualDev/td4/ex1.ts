export class Triple<T, U, V>{
    private _first;
    private _second;
    private _third;

    constructor(first: T, second: U, third: V){
        this._first = first;
        this._second = second;
        this._third = third;
    }
}

let triple1 = new Triple("test", 50, true);
let triple2 = new Triple(2, 3, 4);
let triple3 = new Triple("un", "deux", "trois");

