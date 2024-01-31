#include <DHT.h>
#include <Wire.h>
#include <LiquidCrystal.h>
#include <Adafruit_Sensor.h>

#define ABLUE 6
#define ARED 3
#define AGREEN 5

#define BLUE 9
#define RED 10
#define GREEN 11

#define DHT11_PIN 2
#define DHTTYPE DHT11
DHT dht(DHT11_PIN, DHTTYPE);

int temp, humidity;

void setup(){
   Serial.begin(9600);

   pinMode(GREEN, OUTPUT);
   pinMode(BLUE, OUTPUT);
   pinMode(RED, OUTPUT);

   dht.begin();
}

void loop(){
   temp = dht.readTemperature();
   humidity = dht.readHumidity();
   Serial.print("temperature : ");
   Serial.print(temp);
   Serial.println("°C");


   Serial.print("humidity : ");
   Serial.print(humidity);
   Serial.println("%");

   switch(temp){
      case 20:
         analogWrite(RED, 0);
         analogWrite(GREEN, 0);
         analogWrite(BLUE, 255);
         break;
      case 21: 
         analogWrite(RED, 0);
         analogWrite(GREEN, 255);
         analogWrite(BLUE, 0);
         break;
      default:
         analogWrite(GREEN, 0);
         analogWrite(RED, 255);
         analogWrite(BLUE, 0);
      break;
   }

   if(humidity < 65){
      analogWrite(ARED, 255);
      analogWrite(AGREEN, 0);
      analogWrite(ABLUE, 0);
   }else if(humidity > 65 && humidity < 70){
      analogWrite(ARED, 0);
      analogWrite(AGREEN, 255);
      analogWrite(ABLUE, 0);
   }else if(humidity > 70){
      analogWrite(ARED, 0);
      analogWrite(AGREEN, 0);
      analogWrite(ABLUE, 255);
   }

   delay(1000);
}