#!/usr/bin/env python

from Adafruit_BME280 import *

sensor = BME280(t_mode=BME280_OSAMPLE_8, p_mode=BME280_OSAMPLE_8, h_mode=BME280_OSAMPLE_8)

# for some reason we have to read the temperature first. i'm guessing this is a bug.
degrees = sensor.read_temperature()
humidity = sensor.read_humidity()

print '{0:0.2f}'.format(humidity)