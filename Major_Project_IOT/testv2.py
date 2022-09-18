# importing the libraries we need
from asyncio.windows_events import NULL
from multiprocessing.connection import wait
from multiprocessing.sharedctypes import Value
from optparse import Values
from socket import timeout
import cv2
import imutils
from numpy import insert
import pytesseract

# Arduino ------------------------------------------------------
# from cvzone.SerialModule import SerialObject
# from time import sleep
# import keyboard

# arduino = SerialObject()

# Database connectin---------------------------------------------
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="demo2"
)
# Website open---------------------------------------------------
import webbrowser

# url = "http://localhost/read_data/index.php"
url = "http://localhost/Major_Project/read_data/index.php"
# ---------------------------------------------------------------
def fun():
    # mydata = arduino.getData()
    # # print(mydata[0])
    # if(mydata[0]=='1'):
    while True:
            key = cv2. waitKey(1)
            webcam = cv2.VideoCapture(0)
            car_classifier = cv2.CascadeClassifier('haarcascade_car.xml')
            while webcam.isOpened():
                    check, frame = webcam.read()
                    cv2.imshow("Capturing", frame)
                    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
                    key = cv2.waitKey(1)
                    cars = car_classifier.detectMultiScale(gray, 1.4, 2)
                    for (x,y,w,h) in cars:
                        img_new = cv2.imwrite(filename='cars.png', img=frame)
                        # img_new = cv2.imshow("Captured Image", img_new)
                        # cv2.waitKey(1650)

                        pytesseract.pytesseract.tesseract_cmd = 'C:\\Program Files\\Tesseract-OCR\\tesseract.exe'

                        # Taking in our image input and resizing its width to 300 pixels
                        image = cv2.imread('cars.png')
                        image = imutils.resize(image, width=500 ) #300

                        # Converting the input image to greyscale
                        gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

                        # Reducing the noise in the greyscale image
                        gray_image = cv2.bilateralFilter(gray_image, 11, 17, 17) 

                        # Detecting the edges of the smoothened image
                        edged = cv2.Canny(gray_image, 30, 200) 

                        # Finding the contours from the edged image
                        cnts,new = cv2.findContours(edged.copy(), cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)
                        image1=image.copy()

                        # Sorting the identified contours
                        cnts = sorted(cnts, key = cv2.contourArea, reverse = True) [:30]
                        screenCnt = None
                        image2 = image.copy()

                        # Finding the contour with four sides
                        i=7
                        for c in cnts:
                                perimeter = cv2.arcLength(c, True)
                                approx = cv2.approxPolyDP(c, 0.018 * perimeter, True)
                                if len(approx) == 4: 
                                        screenCnt = approx
                                        # Cropping the rectangular part identified as license plate
                                        x,y,w,h = cv2.boundingRect(c) 
                                        new_img=image[y:y+h,x:x+w]
                                        cv2.imwrite('./'+str(i)+'.png',new_img)
                                        i+=1
                                        break

                        # Extracting text from the image of the cropped license plate
                        Cropped_loc = './7.png'
                        # cv2.imshow("cropped", cv2.imread(Cropped_loc))
                        plate = pytesseract.image_to_string(Cropped_loc, lang='eng')
                        # print("Number plate is:",plate)
                        # cv2.waitKey(2)
                        
                        # data send-------------------------------------------------------
                        data=plate.replace(" ", "")
                        data=data.strip()
                        # print(data)
                        if(data==""):
                            ard=2
                        else:
                            cur =mydb.cursor()
                            cur.execute("SELECT vehicle_no FROM vehicleinfo")
                            lst=cur.fetchall()
                            # print(lst)
                            if(data,) in lst:
                                # print("Exist")
                                ard=1
                            else:
                                # print("Not Exist")
                                ard=0

                        # print(ard)
                        cur =mydb.cursor()
                        cur.execute("DELETE FROM app")
                        cur =mydb.cursor()
                        a="INSERT INTO app(arduino_signal,number_plate) VALUES(%s,%s)"
                        values= (ard,data)
                        cur.execute(a,values)
                        mydb.commit()

                        # while True:
                        #     if(ard==1):
                        #         arduino.sendData([1,0,0])
                        #         arduino.sendData([1,0,0])
                        #         cv2.waitKey(5000)
                        #         break
                        #     elif(ard==2):
                        #         arduino.sendData([0,0,1])
                        #         arduino.sendData([0,0,1])
                        #         break
                        #     else:
                        #         arduino.sendData([0,1,0])
                        #         arduino.sendData([0,1,0])
                        #         break
                        # break
                        if key == ord('q'):
                            print("Turning off camera")
                            webcam.release()
                            print("Camera off.")
                            print("Program ended.")
                            cv2.destroyAllWindows()
                            break
                    # fun()

    # if(mydata[0]=='0'):
    #     webcam = cv2.VideoCapture(0)
    #     webcam.release()
    #     cv2.destroyAllWindows()
    #     if keyboard.is_pressed("Esc"):
    #         arduino.sendData([0,0,0])
    #         arduino.sendData([0,0,0])
    #     fun()
webbrowser.open(url)
fun()