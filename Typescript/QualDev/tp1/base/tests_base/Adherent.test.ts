import {
  assertEquals,
  assertThrows,
} from "https://deno.land/std@0.201.0/assert/mod.ts";

import { Adherent } from "../../base/src/modele/Adherent.ts";

Deno.test("Constructeur / getters ok", () => {
  const adherent = new Adherent("12345", "Doe", "John");

  assertEquals(adherent.numero, "12345");
  assertEquals(adherent.nom, "Doe");
  assertEquals(adherent.prenom, "John");
});

Deno.test("Constructeur erreur nom", () => {
  assertThrows(() => {
    new Adherent("12345", "      ", "John");
  });
});

Deno.test("Constructeur erreur prénom", () => {
  assertThrows(() => {
    new Adherent("12345", "Doe", "  ");
  });
});

Deno.test("Constructeur erreur numéro", () => {
  assertThrows(() => {
    new Adherent("12aaaa345", "Doe", "John");
  });
});

Deno.test("Setter nom ok", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  adherent.nom = " S ";
  assertEquals(adherent.nom, "S");
});

Deno.test("Setter nom lance exception (nom vide)", () => {
  const adherent = new Adherent("12345", "Doe", "John");

  assertThrows(
    () => {
      adherent.nom = "";
    },
  );
});

Deno.test("Setter prénom ok", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  adherent.prenom = " J   ";
  assertEquals(adherent.prenom, "J");
});

Deno.test("Setter prénom lance exception (prenom vide)", () => {
  const adherent = new Adherent("12345", "Doe", "John");

  assertThrows(
    () => {
      adherent.prenom = "";
    },
  );
});
Deno.test("Setter numéro ok", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  adherent.numero = "67890";
  assertEquals(adherent.numero, "67890");
});

Deno.test("Setter numéro lance exception (que des lettres)", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  // Test setting invalid numero
  assertThrows(
    () => {
      adherent.numero = "ABC";
    },
  );
});
Deno.test("Setter numéro lance exception (lettres puis chiffres)", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  // Test setting invalid numero
  assertThrows(
    () => {
      adherent.numero = "ABC75";
    },
  );
});

Deno.test("Setter numéro lance exception (réel)", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  // Test setting invalid numero
  assertThrows(
    () => {
      adherent.numero = "75.28";
    },
  );
});

Deno.test("toString() ok", () => {
  const adherent = new Adherent("12345", "Doe", "John");
  assertEquals(adherent.toString(), "12345 Doe, John");
});
