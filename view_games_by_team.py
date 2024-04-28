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
    SELECT 
        CASE 
            WHEN g.TeamId1 = %s THEN t1.Location 
            ELSE t2.Location 
        END AS 'Team Location',
        CASE 
            WHEN g.TeamId1 = %s THEN t1.Nickname 
            ELSE t2.Nickname 
        END AS 'Team Nickname',
        CASE 
            WHEN g.TeamId1 = %s THEN t2.Location 
            ELSE t1.Location 
        END AS 'Opponent Location',
        CASE 
            WHEN g.TeamId1 = %s THEN t2.Nickname 
            ELSE t1.Nickname 
        END AS 'Opponent Nickname',
        g.Date AS 'Date',
        g.Score1 AS 'Home Score',
        g.Score2 AS 'Away Score',
        CASE 
            WHEN g.TeamId1 = %s AND g.Score1 > g.Score2 THEN 'Won'
            WHEN g.TeamId1 = %s AND g.Score1 < g.Score2 THEN 'Lost'
            WHEN g.TeamId2 = %s AND g.Score2 > g.Score1 THEN 'Won'
            WHEN g.TeamId2 = %s AND g.Score2 < g.Score1 THEN 'Lost'
            ELSE 'Tied'
        END AS 'Result'
    FROM 
        Game g
    JOIN 
        Team t1 ON g.TeamId1 = t1.TeamId
    JOIN 
        Team t2 ON g.TeamId2 = t2.TeamId
    WHERE 
        g.TeamId1 = %s OR g.TeamId2 = %s
    ORDER BY 
        g.Date DESC;
    """
    cursor.execute(query, (team_id, team_id, team_id, team_id, team_id, team_id, team_id, team_id, team_id, team_id))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)
    if records:
        return tabulate(records, headers=['Team Location', 'Team Nickname', 'Opponent Location', 'Opponent Nickname', 'Date', 'Home Score', 'Away Score', 'Result'], tablefmt='html')
    else:
        return "<p>No games found for this team.</p>"

if __name__ == "__main__":
    team_id = sys.argv[1] if len(sys.argv) > 1 else None
    if team_id:
        print(view_games_by_team(team_id))
    else:
        print("<p>Team ID not specified.</p>")
