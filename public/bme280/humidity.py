#!/usr/bin/env python

from Adafruit_BME280 import *

sensor = BME280(t_mode=BME280_OSAMPLE_8, p_mode=BME280_OSAMPLE_8, h_mode=BME280_OSAMPLE_8)

humidity = sensor.read_humidity()

print 'Humidity  = {0:0.2f} %'.format(humidity)