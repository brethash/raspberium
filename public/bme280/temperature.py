#!/usr/bin/env python

from Adafruit_BME280 import *

import sys

# BME280 default address.
BME280_I2CADDR = 0x76

# Get the total number of args
total = len(sys.argv)

# If there is an address specified, we should probably use it, right?
if total > 1:
    BME280_I2CADDR = int(sys.argv[1],16)

sensor = BME280(t_mode=BME280_OSAMPLE_8, p_mode=BME280_OSAMPLE_8, h_mode=BME280_OSAMPLE_8, address=BME280_I2CADDR)

degrees = sensor.read_temperature()

print '{0:0.3f}'.format(degrees)