from Adafruit_CCS811 import * #library for air quality sensor
from Adafruit_BME280 import * #library for temp/humidity/pressure sensor
import time
import math
import mysql.connector
import os
import threading
import urllib2

bme = BME280(t_mode=BME280_OSAMPLE_8, p_mode=BME280_OSAMPLE_8, h_mode=BME280_OSAMPLE_8) #shorthand to access the BME sensor
ccs = Adafruit_CCS811() #shorthand to access the CCS sensor


def truncate(n):
     return ("{0:.0f}".format(n))


while True:
    #connect to database
    cnx = mysql.connector.connect(user='root2', password='root', database='Weather')#shorthand to connect to database
    cursor = cnx.cursor()
    #BME280
    degrees = bme.read_temperature()
    fahrenheit = (degrees * 1.8) + 32 #converts the native sensor reading of celcius to fahrenheit
    pascals = bme.read_pressure()
    hectopascals = pascals / 100 #converts the native senaor reading of pascals to hectopascals 
    humidity = bme.read_humidity()
        
    t_fahrenheit = truncate(fahrenheit)
    t_hectopascals = truncate(hectopascals)
    t_humidity = truncate(humidity)

    #CCS811
    count = 0
    eCO2 = 400
    while(eCO2 < 401 and count<21): #Checks to make sure sensor is getting an actual reading aborts after 20 tries
            if ccs.available():
                if not ccs.readData():
                  #print "CO2: ", ccs.geteCO2(), "ppm, TVOC: ", ccs.getTVOC(), " temp: ", temp
                    eCO2 = ccs.geteCO2()
                    tVOC = ccs.getTVOC()
                
            sleep(2)
            count = count + 1
            
    #Now that the readings are complete, record time
    unixtime = int(time.time())
    dateread = time.strftime("%m/%d/%y")
    timeread = time.strftime("%H:%M:%S")
        
    #Wrap it all up and send it to the database
    listtodb = [unixtime, dateread, timeread, t_fahrenheit, t_humidity, t_hectopascals, eCO2, tVOC]
    #print listtodb
    add_data = ("INSERT INTO WeatherData2 "
                "(UnixTime, Date, Time, Temperature, Humidity, Pressure, eCO2, tVOC)"
                "VALUES (%s, %s, %s, %s, %s, %s, %s, %s)")
    cursor.execute(add_data, listtodb)
                
    cnx.commit()
    cursor.close()
    cnx.close()
    time.sleep(600) #time between updates in seconds (600 = 10min)