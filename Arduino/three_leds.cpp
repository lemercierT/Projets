#include <Arduino.h>
#include <stdio.h>
#define JAUNE 2
#define VERT 4
#define ROUGE 7

int i = 0;

void setup() {
  Serial.begin(9600);
  Serial.print("Lancement du programme...");
  pinMode(JAUNE, OUTPUT);
  pinMode(VERT, OUTPUT);
  pinMode(ROUGE, OUTPUT);
}

void loop() {
  int res = i % 2;
  digitalWrite(JAUNE, res);
  delay(500);
  digitalWrite(VERT, res);
  delay(500);
  digitalWrite(ROUGE, res);
  delay(500);
  i++;
}