import mysql.connector
import sys

def open_database():
    try:
        connection = mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
        return connection
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def check_team_exists(team_id):
    conn = open_database()
    if conn is None:
        print("Failed to connect to the database.")
        return False
    cursor = conn.cursor()
    cursor.execute("SELECT COUNT(*) FROM Team WHERE TeamId = %s", (team_id,))
    result = cursor.fetchone()
    cursor.close()
    conn.close()
    return result[0] > 0

def main():
    if len(sys.argv) != 2:
        print("Usage: python check_team_exists.py <team_id>")
        return

    team_id = sys.argv[1]
    if check_team_exists(team_id):
        print("Team exists.")
    else:
        print("No such team exists.")

if __name__ == "__main__":
    main()
