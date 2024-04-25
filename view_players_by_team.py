import sys
import mysql.connector
from tabulate import tabulate

def open_database():
    try:
        # Ensure these credentials are correct and that the database name is accurate
        return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def close_database(conn):
    if conn.is_connected():
        conn.close()

def view_players_by_team(team_id):
    conn = open_database()
    if conn is None:
        print("<p>Database connection could not be established.</p>")
        return  # Exit the function if connection fails

    cursor = conn.cursor()
    query = "SELECT PlayerId, Name, Position FROM Player WHERE TeamId = %s"
    cursor.execute(query, (team_id,))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)

    if records:
        # Format the records into an HTML table
        return tabulate(records, headers=['Player ID', 'Name', 'Position'], tablefmt='html')
    else:
        return "<p>No players found for team ID {}.</p>".format(team_id)

if __name__ == "__main__":
    if len(sys.argv) > 1:
        print(view_players_by_team(sys.argv[1]))
    else:
        print("<p>Team ID not specified.</p>")
