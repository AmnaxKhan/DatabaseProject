import sys
import mysql.connector
from tabulate import tabulate

def execute_query_and_return_html(position):
    conn = mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
    cursor = conn.cursor()
    cursor.execute("SELECT Name, Position FROM Player WHERE Position = %s", (position,))
    records = cursor.fetchall()
    cursor.close()
    conn.close()
    if records:
        return tabulate(records, headers=['Name', 'Position'], tablefmt='html')
    else:
        return "<p>No players found in the specified position.</p>"

if __name__ == "__main__":
    position = sys.argv[1] if len(sys.argv) > 1 else None
    if position:
        print(execute_query_and_return_html(position))
    else:
        print("<p>Position not specified.</p>")
