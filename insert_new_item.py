import sys
import traceback
import logging
import python_db


mysql_username = 'amnak'  # please change to your username
mysql_password = 'ooSh9Phu'  # please change to your MySQL password

try:
    python_db.open_database('localhost', mysql_username,
                            mysql_password, mysql_username)  # open database
    res = python_db.executeSelect('SELECT * FROM Dish;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "Table ITEM before:"+"<br/>" +
          res[0] + "<br/>"+res[1] + "<br/>")
    for i in range(len(res)-2):
        print(res[i+2]+"<br/>")
    # insert into item tables by getting the values passed from PHP
    name = sys.argv[1]
    supplier_id = sys.argv[2]
    quantity = sys.argv[3]
    unit_price = sys.argv[4]

    next_id = python_db.nextId("ITEM")


    values = "'"+ name + "','" + str(next_id) + "','" +  supplier_id + \
        "','" + quantity + "','" + unit_price + "'"

    python_db.insert("ITEM", values)
    res = python_db.executeSelect('SELECT * FROM ITEM;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "<br/>")
    print("<br/>" + "Table ITEM after:"+"<br/>" +
          res[0] + "<br/>"+res[1] + "<br/>")
    for i in range(len(res)-2):
        print(res[i+2]+"<br/>")
    python_db.close_db()  # close db
except Exception as e:
    logging.error(traceback.format_exc())

