# get_team_nicknames.py
import mysql.connector
from tabulate import tabulate

def open_database():
    # Assuming these credentials are correct and the database name is accurate
    return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')

def get_team_nicknames():
    conn = open_database()
    cursor = conn.cursor()
    query = "SELECT TeamId, Nickname FROM Team ORDER BY Nickname ASC"
    cursor.execute(query)
    teams = cursor.fetchall()
    cursor.close()
    conn.close()
    return teams

if __name__ == "__main__":
    for team_id, nickname in get_team_nicknames():
        print(f"<option value='{team_id}'>{nickname}</option>")
