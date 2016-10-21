# Raspberium - The best free terrarium/vivarium/aquarium controller for the Raspberry Pi

Features:
 * Built on Laravel 5.3!
 * Supports DHT22 temperature/humidity sensor!
 * Supports a fan(s)!
 * Supports up to 4 relays out of the box. Easy to add more!
 * It's free! And **AWESOME**!
 
## Prerequisites
 * Requires [loldht](https://github.com/technion/lol_dht22) library for the DHT22 sensor. Make sure the script is installed at /usr/bin/loldht.
 * Requires [The GPIO utility](https://projects.drogon.net/raspberry-pi/wiringpi/the-gpio-utility/) library to interact with the GPIO pins on the Raspberry Pi.
 
## Notes
 * Frontend template is based on: [AdminLTE Control Panel Template by Almsteed Studio](https://almsaeedstudio.com/)
 
 * For information on how to build the relay box, check out [this tutorial](http://www.instructables.com/id/Web-Controlled-8-Channel-Powerstrip/?ALLSTEPS). We're currently using 4 for this project, but build as many as you want!
 
 * For wiring help, check out this Raspberry Pi 3 GPIO Header diagram:
![Raspberry Pi 3 GPIO Header diagram](https://www.element14.com/community/servlet/JiveServlet/previewBody/73950-102-10-339300/pi3_gpio.png "Raspberry Pi 3 GPIO Header diagram")
[Source](https://www.element14.com/community/servlet/JiveServlet/previewBody/73950-102-10-339300/pi3_gpio.png)