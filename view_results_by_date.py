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
    query = """
    SELECT 
        t1.Location AS 'Home Location', 
        t1.Nickname AS 'Home Nickname', 
        t2.Location AS 'Away Location', 
        t2.Nickname AS 'Away Nickname', 
        g.Score1 AS 'Home Score', 
        g.Score2 AS 'Away Score',
        CASE
            WHEN g.Score1 > g.Score2 THEN t1.Nickname
            WHEN g.Score1 < g.Score2 THEN t2.Nickname
            ELSE 'Tie'
        END AS 'Winner'
    FROM 
        Game g
    JOIN 
        Team t1 ON g.TeamId1 = t1.TeamId
    JOIN 
        Team t2 ON g.TeamId2 = t2.TeamId
    WHERE 
        g.Date = %s
    """
    cursor.execute(query, (game_date,))
    records = cursor.fetchall()
    cursor.close()
    close_database(conn)
    if records:
        return tabulate(records, headers=['Home Location', 'Home Nickname', 'Away Location', 'Away Nickname', 'Home Score', 'Away Score', 'Winner'], tablefmt='html')
    else:
        return "<p>No games found on this date.</p>"

if __name__ == "__main__":
    game_date = sys.argv[1] if len(sys.argv) > 1 else None
    if game_date:
        print(view_results_by_date(game_date))
    else:
        print("<p>Date not specified.</p>")
