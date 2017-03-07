<?php

use Raspberium\Domain\Bme280;

class Bme280Test extends BaseTest {

    // Fwiw, I don't think we really need to test the "connectivity" of the BME280/I2C interface.
    // If any of these fail, the connection is also probably bad.

    /**
     * Tests that the Bme280 is returning a non-null humidity value
     *
     * @return void
     */
    public function humidityTest() {
        $bme280 = new Bme280;
        $humidity = $bme280->getHumidity();
        $this->assertNotNull($humidity, "Humidity is null. Check BME280 connection.");
    }

    /**
     * Tests that the Bme280 is returning a non-null temperature value
     *
     * @return void
     */
    public function temperatureTest() {
        $bme280 = new Bme280;
        $temperature = $bme280->getTemperature();
        $this->assertNotNull($temperature, "Temperature is null. Check BME280 connection.");
    }

    /**
     * Tests that the Bme280 is returning a non-null pressure value
     *
     * @return void
     */
    public function pressureTest() {
        $bme280 = new Bme280;
        $pressure = $bme280->getPressure();
        $this->assertNotNull($pressure, "Pressure is null. Check BME280 connection.");
    }
}