#include <Arduino.h>
#include <stdio.h>
#define BLEU 3

int i = 0;

void setup() {
  Serial.begin(9600);
  Serial.print("Lancement du programme...");
  pinMode(BLEU, OUTPUT);
}

void loop() {
  int res = i % 255;
  analogWrite(BLEU, res);
  delay(500);
  i+=50;
}