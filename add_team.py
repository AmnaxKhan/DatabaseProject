import sys
import mysql.connector

def open_database():
    try:
        return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def add_team(location, nickname, conference, division):
    conn = open_database()
    if not conn:
        print("Connection to the database could not be established.")
        return

    cursor = conn.cursor()
    query = "INSERT INTO Team (Location, Nickname, Conference, Division) VALUES (%s, %s, %s, %s)"
    try:
        cursor.execute(query, (location, nickname, conference, division))
        conn.commit()
        print("Team added successfully.")
    except mysql.connector.Error as e:
        print(f"SQL Error: {e}")
    finally:
        cursor.close()
        conn.close()

if __name__ == "__main__":
    if len(sys.argv) == 5:
        add_team(sys.argv[1], sys.argv[2], sys.argv[3], sys.argv[4])
    else:
        print("Incorrect number of arguments. Expected 4 arguments.")
