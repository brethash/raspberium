#!/usr/bin/env python

from Adafruit_BME280 import *

sensor = BME280(t_mode=BME280_OSAMPLE_8, p_mode=BME280_OSAMPLE_8, h_mode=BME280_OSAMPLE_8)

pascals = sensor.read_pressure()
hectopascals = pascals / 100

print 'Pressure  = {0:0.2f} hPa'.format(hectopascals)