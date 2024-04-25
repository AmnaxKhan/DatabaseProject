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

def view_teams_by_conference():
    conn = open_database()
    if not conn:
        return "<p>Error: Database connection could not be established.</p>"
    
    cursor = conn.cursor()
    query = """
    SELECT t.TeamId, t.Location, t.Nickname, t.Conference,
           COUNT(CASE WHEN g.Score1 > g.Score2 THEN 1 WHEN g.Score2 > g.Score1 THEN NULL ELSE NULL END) AS HomeWins,
           COUNT(CASE WHEN g.Score2 > g.Score1 THEN 1 WHEN g.Score1 > g.Score2 THEN NULL ELSE NULL END) AS AwayWins,
           (COUNT(CASE WHEN g.Score1 > g.Score2 THEN 1 WHEN g.Score2 > g.Score1 THEN NULL ELSE NULL END) +
            COUNT(CASE WHEN g.Score2 > g.Score1 THEN 1 WHEN g.Score1 > g.Score2 THEN NULL ELSE NULL END)) AS TotalWins
    FROM Team t
    LEFT JOIN Game g ON t.TeamId = g.TeamId1 OR t.TeamId = g.TeamId2
    GROUP BY t.TeamId, t.Location, t.Nickname, t.Conference
    ORDER BY t.Conference, TotalWins DESC
    """
    try:
        cursor.execute(query)
        records = cursor.fetchall()
        cursor.close()
        close_database(conn)
        if records:
            return tabulate(records, headers=['Team ID', 'Location', 'Nickname', 'Conference', 'Home Wins', 'Away Wins', 'Total Wins'], tablefmt='html')
        else:
            return "<p>No team data found.</p>"
    except mysql.connector.Error as e:
        return f"<p>SQL Error: {e}</p>"

if __name__ == "__main__":
    print(view_teams_by_conference())
