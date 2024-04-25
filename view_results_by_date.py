import sys
import mysql.connector
from tabulate import tabulate

def open_database():
    return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')

def close_database(conn):
    conn.close()

def view_results_by_date(game_date):
    conn = open_database()
    cursor = conn.cursor()
    query = "SELECT * FROM Game WHERE Date = %s"
    cursor.execute(query, (game_date,))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)
    if records:
        return tabulate(records, headers=['Game ID', 'Team ID 1', 'Team ID 2', 'Score 1', 'Score 2', 'Date'], tablefmt='html')
    else:
        return "<p>No games found on this date.</p>"

if __name__ == "__main__":
    game_date = sys.argv[1] if len(sys.argv) > 1 else None
    if game_date:
        print(view_results_by_date(game_date))
    else:
        print("<p>Date not specified.</p>")
