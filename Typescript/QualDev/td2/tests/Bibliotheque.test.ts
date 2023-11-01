import { Bibliotheque } from "../src/modele/Bibliotheque.ts";
import { Adherent } from "../src/modele/Adherent.ts";
import {
  assertEquals,
  assertThrows,
} from "https://deno.land/std@0.201.0/assert/mod.ts";

Deno.test("Bibliotheque.ajouteAdherent 1 adhérent ok", () => {
  const b = new Bibliotheque([], []);
  const a = new Adherent("1", "Doe", "John");
  b.ajouteAdherent(a);
  assertEquals(b.adherents.length, 1);
});

Deno.test("Bibliotheque.ajouteAdherent 2 adhérents ok", () => {
  const b = new Bibliotheque([], []);
  const a1 = new Adherent("1", "Doe", "John");
  b.ajouteAdherent(a1);
  const a2 = new Adherent("2", "Doe", "Jane");
  b.ajouteAdherent(a2);
  assertEquals(b.adherents.length, 2);
});

Deno.test("Bibliotheque.ajouteAdherent doublon même objet", () => {
  const b = new Bibliotheque([], []);
  const a = new Adherent("1", "Doe", "John");
  b.ajouteAdherent(a);
  assertThrows(() => {
    b.ajouteAdherent(a);
  });
});

Deno.test("Bibliotheque.ajouteAdherent doublon même contenu objet différent", () => {
  const b = new Bibliotheque([], []);
  const a1 = new Adherent("1", "Doe", "John");
  const a2 = new Adherent(a1.numero, a1.nom, a1.prenom);
  b.ajouteAdherent(a1);
  assertThrows(() => {
    b.ajouteAdherent(a2);
  });
});

Deno.test("Bibliotheque.supprimeAdherent même objet ok", () => {
  const b = new Bibliotheque([], []);
  const a = new Adherent("1", "Doe", "John");
  b.ajouteAdherent(a);
  b.supprimeAdherent(a);
  assertEquals(b.adherents.length, 0);
});

Deno.test("Bibliotheque.supprimeAdherent autre objet même adhérent ok", () => {
  const b = new Bibliotheque([], []);
  const a1 = new Adherent("1", "Doe", "John");
  const a2 = new Adherent(a1.numero, a1.nom, a1.prenom);
  b.ajouteAdherent(a1);
  b.supprimeAdherent(a2);
  assertEquals(b.adherents.length, 0);
});

Deno.test("Bibliotheque.supprimeAdherent objet inexistant echec", () => {
  const b = new Bibliotheque([], []);
  const a1 = new Adherent("1", "Doe", "John");
  const a2 = new Adherent("2", "Doe", "Jane");
  b.ajouteAdherent(a1);
  assertThrows(() => {
    b.supprimeAdherent(a2);
  });
});
