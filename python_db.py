import mysql.connector
from mysql.connector import Error
from tabulate import tabulate

def open_database(hostname, user_name, mysql_pw, database_name):
    global conn
    conn = mysql.connector.connect(
        host=hostname,
        user=user_name,
        password=mysql_pw,
        database=database_name
    )
    global cursor
    cursor = conn.cursor()
    return conn

def close_db():
    cursor.close()
    conn.close()

def execute_select(query):
    cursor.execute(query)
    result = cursor.fetchall()
    return tabulate(result, headers=[x[0] for x in cursor.description], tablefmt='html')

def execute_insert(query, params):
    cursor.execute(query, params)
    conn.commit()

def next_id(table):
    query = "SELECT IFNULL(MAX(ID), 0) + 1 FROM " + table
    cursor.execute(query)
    result = cursor.fetchone()[0]
    return result
