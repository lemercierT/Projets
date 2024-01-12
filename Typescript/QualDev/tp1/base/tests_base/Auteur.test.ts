import {
  assertEquals,
  assertThrows,
} from "https://deno.land/std@0.201.0/assert/mod.ts";

import { Auteur } from "../../base/src/modele/Auteur.ts";

Deno.test("Constructeur / getters OK prénom non fourni", () => {
  const auteur = new Auteur("Smith");

  assertEquals(auteur.nom, "Smith");
  assertEquals(auteur.prenom, "");
});

Deno.test("Constructeur / getters OK prénom vide", () => {
  const auteur = new Auteur("S", "");

  assertEquals(auteur.nom, "S");
  assertEquals(auteur.prenom, "");
});

Deno.test("Constructeur / getters OK prénom fourni", () => {
  const auteur = new Auteur("Smith", "J");
  assertEquals(auteur.nom, "Smith");
  assertEquals(auteur.prenom, "J");
});

Deno.test("Constructeur lance exception nom vide", () => {
  assertThrows(() => {
    new Auteur("   ", "J");
  });
});

Deno.test("setter nom OK", () => {
  const auteur = new Auteur("Smith", "J");
  auteur.nom = "S";
  assertEquals(auteur.nom, "S");
});

Deno.test("setter nom lance exception (nom vide)", () => {
  const auteur = new Auteur("Smith", "J");
  assertThrows(() => {
    auteur.nom = "";
  });
});

Deno.test("setter prenom OK", () => {
  const auteur = new Auteur("Smith", "J");
  auteur.prenom = "Jane";
  assertEquals(auteur.prenom, "Jane");
});

Deno.test("setter prenom OK (prenom vide)", () => {
  const auteur = new Auteur("Smith", "J");
  auteur.prenom = "";
  assertEquals(auteur.prenom, "");
});

Deno.test("toString OK (prenom vide)", () => {
  const auteur = new Auteur("Smith");
  assertEquals(auteur.toString(), "Smith");
});

Deno.test("toString OK (prenom non vide)", () => {
  const auteur = new Auteur("Smith", "J");
  assertEquals(auteur.toString(), "Smith, J");
});
