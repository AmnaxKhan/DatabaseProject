import sys
import mysql.connector
from tabulate import tabulate

def open_database():
    return mysql.connector.connect(host='localhost', user='amnak', password='ooSh9Phu', database='amnak')

def close_database(conn):
    conn.close()

def view_games_by_team(team_id):
    conn = open_database()
    cursor = conn.cursor()
    query = """
    SELECT g.Date, t1.Nickname as HomeTeam, t2.Nickname as AwayTeam, g.Score1, g.Score2
    FROM Game g
    JOIN Team t1 ON g.TeamId1 = t1.TeamId
    JOIN Team t2 ON g.TeamId2 = t2.TeamId
    WHERE g.TeamId1 = %s OR g.TeamId2 = %s
    ORDER BY g.Date DESC
    """
    cursor.execute(query, (team_id, team_id))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)
    if records:
        return tabulate(records, headers=['Date', 'Home Team', 'Away Team', 'Score 1', 'Score 2'], tablefmt='html')
    else:
        return "<p>No games found for this team.</p>"

if __name__ == "__main__":
    team_id = sys.argv[1] if len(sys.argv) > 1 else None
    if team_id:
        print(view_games_by_team(team_id))
    else:
        print("<p>Team ID not specified.</p>")
