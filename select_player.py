import mysql.connector
from tabulate import tabulate

def open_database():
    try:
        conn = mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
        return conn
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def close_database(conn):
    if conn and conn.is_connected():
        conn.close()

def select_player():
    conn = open_database()
    if not conn:
        return "<p>Error: Database connection could not be established.</p>"
    
    cursor = conn.cursor()
    query = """
    SELECT * FROM Player
    """
    try:
        cursor.execute(query)
        records = cursor.fetchall()
        cursor.close()
        close_database(conn)
        if records:
            return tabulate(records, headers=['Team ID', 'Name', 'Position'], tablefmt='html')
        else:
            return "<p>No team data found.</p>"
    except mysql.connector.Error as e:
        return f"<p>SQL Error: {e}</p>"

if __name__ == "__main__":
    print(select_player())
