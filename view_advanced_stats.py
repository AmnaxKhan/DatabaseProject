import sys
import mysql.connector
from tabulate import tabulate

def open_database():
    try:
        return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def close_database(conn):
    conn.close()

def view_advanced_stats(team_id):
    conn = open_database()
    if not conn:
        return "<p>Database connection could not be established.</p>"
    
    cursor = conn.cursor()
    query = """
    SELECT p.Name, t.Nickname, g.Date, s.Touchdowns, s.Passes, s.Tackles
    FROM PlayerStats s
    JOIN Player p ON s.PlayerId = p.PlayerId
    JOIN Team t ON p.TeamId = t.TeamId
    JOIN Game g ON s.GameId = g.GameId
    WHERE t.TeamId = %s
    """
    cursor.execute(query, (team_id,))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)

    if records:
        return tabulate(records, headers=['Player Name', 'Team Nickname', 'Game Date', 'Touchdowns', 'Passes', 'Tackles'], tablefmt='html')
    else:
        return "<p>No advanced stats found for team ID {}.</p>".format(team_id)

if __name__ == "__main__":
    if len(sys.argv) > 1:
        print(view_advanced_stats(sys.argv[1]))
    else:
        print("<p>Team ID not specified.</p>")
