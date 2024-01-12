export class Role {
  private _description: string;
  private _role: string;
  private static _valeursPossibles = [
    "groupe",
    "auteur principal",
    "compositeur",
    "traducteur",
    "dessinateur",
    "scénariste",
  ];

  constructor(description: string, role: string) {
    this._description = description;
    this._role = "";
    if (Role._valeursPossibles.indexOf(role) != -1) this._role = role;
  }
  setDescription(description: string) {
    this._description = description;
  }
  getDescription(): string {
    return this._description;
  }
  setRole(role: string){
    this._role = role;
  }
  getRole(): string{
    return this._role;
  }

  toString(): string {
    return " " + this._description + " " + this._role;
  }
}
