#include <WiFi.h>
#include "HUSKYLENS.h"
#include <HTTPClient.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#define SCREEN_WIDTH 128 // OLED display width, in pixels
#define SCREEN_HEIGHT 64 // OLED display height, in pixels
// Declaration for an SSD1306 display connected to I2C (SDA, SCL pins)
Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, -1);

HUSKYLENS huskylens;

const char* ssid = "007";
const char* password = "andesta7899";
const char* serverName = "http://192.168.18.232/2024/huskylens/public/api/data-huskylens";

void setup() {
  Serial.begin(115200);

  // check wifi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
      delay(2000);
      Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");

  // check device (arduino)
  Wire.begin();
  while (!huskylens.begin(Wire))
  {
      Serial.println(F("Begin failed!"));
      delay(100);
  }
  Serial.println("Connected to Device");

  // check display
  if(!display.begin(SSD1306_SWITCHCAPVCC, 0x3C)) { // Address 0x3D for 128x64
    Serial.println(F("SSD1306 allocation failed"));
    for(;;);
  }

  display.clearDisplay();
  display.setTextSize(1);
  display.setTextColor(WHITE);
  display.setCursor(0, 5);
  // Display static text
  display.println("MAN 4 Jakarta");
  display.println("Diabetes Checking");
  display.display();
}

void loop() {
  if (!huskylens.request()) Serial.println(F("Fail to request data from HUSKYLENS, recheck the connection!"));
    else if(!huskylens.isLearned()) Serial.println(F("Nothing learned, press learn button on HUSKYLENS to learn one!"));
    else if(!huskylens.available()) Serial.println(F("No block or arrow appears on the screen!"));
    else
    {
        while (huskylens.available())
        {
            HUSKYLENSResult result = huskylens.read();
            Serial.println("ID: ");
            Serial.println(result.ID);

            // Now send the data to the Laravel application
            sendDataToLaravel(result.ID);

            // Display on LCD
            // pesanisi(result);

            delay(2000);
        }
    }
}

void sendDataToLaravel(int id) {
  if (WiFi.status() == WL_CONNECTED) {
      HTTPClient http;

      http.begin(serverName);
      http.addHeader("Content-Type", "application/json");

      String jsonPayload = "{\"ID\":" + String(id) + "}";

      int httpResponseCode = http.POST(jsonPayload);

      if (httpResponseCode > 0) {
          String response = http.getString();
          Serial.println(httpResponseCode);
          Serial.println(response);
      } else {
          Serial.print("Error on sending POST: ");
          Serial.println(httpResponseCode);
      }

      http.end();
  } else {
      Serial.println("WiFi Disconnected");
  }
}

void pesanisi(HUSKYLENSResult result) {
  Serial.begin(115200);

  if(!display.begin(SSD1306_SWITCHCAPVCC, 0x3C)) { // Address 0x3D for 128x64
    Serial.println(F("SSD1306 allocation failed"));
    for(;;);
  }
  display.clearDisplay();
  display.setTextSize(1);
  display.setTextColor(WHITE);
  display.setCursor(0, 5);
  // Display static text
  display.println(String() + F("ID=") + result.ID);
  display.display();
}
