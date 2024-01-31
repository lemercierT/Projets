#include <DHT.h>
#include <Wire.h>
#include <Adafruit_Sensor.h>

#define DHT11_PIN 2
#define DHTTYPE DHT11
DHT dht(DHT11_PIN, DHTTYPE);

int temp, humidity;

void setup(){
   Serial.begin(9600);
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
   
   delay(1000);
}