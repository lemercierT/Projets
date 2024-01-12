import { Role } from "../../base/src/modele/Role.ts";
import {
  assertEquals,
  assertThrows,
} from "https://deno.land/std@0.201.0/assert/mod.ts";

Deno.test("Constructeur/getter ok", () => {
  const validDescription = "auteur";
  const role = new Role(validDescription);
  assertEquals(role.description, validDescription);
});

Deno.test("Constructeur/getter ok malgré espaces et casse incorrecte", () => {
  const inputDescription = "  Auteur   ";
  const expectedDescription = "auteur";
  const role = new Role(inputDescription);
  assertEquals(role.description, expectedDescription);
});

Deno.test("Constructeur pas ok car description incorrecte", () => {
  const invalidDescription = "invalid_role";
  assertThrows(() => new Role(invalidDescription));
});

Deno.test("Setter/getter ok", () => {
  const validDescription0 = "auteur";
  const validDescription1 = "scénariste";
  const role = new Role(validDescription0);
  role.description = validDescription1;
  assertEquals(role.description, validDescription1);
});

Deno.test("Setter/getter ok malgré espaces et casse incorrecte", () => {
  const validDescription0 = "auteur";
  const inputDescription1 = " ScénarisTe      ";
  const expectedDescription1 = "scénariste";
  const role = new Role(validDescription0);
  role.description = inputDescription1;
  assertEquals(role.description, expectedDescription1);
});

Deno.test("Setter pas ok car description incorrecte", () => {
  const validDescription = "auteur";
  const role = new Role(validDescription);
  const invalidDescription = "invalid_role";
  assertThrows(() => role.description = invalidDescription);
});

Deno.test("toString OK", () => {
  const validDescription = "compositeur";
  const role = new Role(validDescription);
  assertEquals(role.toString(), validDescription);
});
