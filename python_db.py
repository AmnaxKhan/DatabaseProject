import sys
import mysql.connector
from mysql.connector import Error
from tabulate import tabulate

def connect_db(host, user, password, database):
    try:
        conn = mysql.connector.connect(host=host, user=user, password=password, database=database)
        print("Database connection established")
        return conn
    except Error as e:
        print(f"Error connecting to MySQL Database: {e}")
        return None

def close_db(conn):
    if conn.is_connected():
        conn.close()
        print("Database connection closed")

def execute_query(conn, query, args=None):
    cursor = conn.cursor()
    try:
        cursor.execute(query, args)
        conn.commit()
        print("Query successful")
    except Error as e:
        print(f"Failed to execute query: {e}")

def fetch_query(conn, query, args=None):
    cursor = conn.cursor()
    try:
        cursor.execute(query, args)
        results = cursor.fetchall()
        return tabulate(results, headers=[desc[0] for desc in cursor.description], tablefmt='html')
    except Error as e:
        print(f"Failed to fetch data: {e}")
        return None

def add_game(conn, team_id1, team_id2, score1, score2, game_date):
    query = """
    INSERT INTO Game (TeamId1, TeamId2, Score1, Score2, Date)
    VALUES (%s, %s, %s, %s, %s)
    """
    execute_query(conn, query, (team_id1, team_id2, score1, score2, game_date))

def add_player(conn, team_id, name, position):
    query = """
    INSERT INTO Player (TeamId, Name, Position)
    VALUES (%s, %s, %s)
    """
    execute_query(conn, query, (team_id, name, position))

def view_players_by_team(conn, team_id):
    query = "SELECT * FROM Player WHERE TeamId = %s"
    return fetch_query(conn, query, (team_id,))

def view_players_by_position(conn, position):
    query = "SELECT * FROM Player WHERE Position = %s"
    return fetch_query(conn, query, (position,))

def view_teams_by_conference(conn):
    query = """
    SELECT Conference, TeamId, Location, Nickname, COUNT(GameId) AS Wins
    FROM Team JOIN Game ON Team.TeamId = Game.WinningTeamId
    GROUP BY Conference, TeamId
    ORDER BY Conference, Wins DESC
    """
    return fetch_query(conn, query)

def view_games_by_team(conn, team_id):
    query = """
    SELECT g.Date, t.Location, t.Nickname, g.Score1, g.Score2
    FROM Game g
    JOIN Team t ON g.TeamId1 = t.TeamId OR g.TeamId2 = t.TeamId
    WHERE t.TeamId = %s
    """
    return fetch_query(conn, query, (team_id,))

def view_results_by_date(conn, game_date):
    query = "SELECT * FROM Game WHERE Date = %s"
    return fetch_query(conn, query, (game_date,))

if __name__ == "__main__":
    host = sys.argv[1]
    user = sys.argv[2]
    password = sys.argv[3]
    database = sys.argv[4]
    operation = sys.argv[5]
    args = sys.argv[6:]

    conn = connect_db(host, user, password, database)
    if not conn:
        sys.exit("Database connection failed")

    try:
        if operation == "add_game":
            add_game(conn, *args)
        elif operation == "add_player":
            add_player(conn, *args)
        elif operation == "view_players_by_team":
            print(view_players_by_team(conn, *args))
        elif operation == "view_players_by_position":
            print(view_players_by_position(conn, *args))
        elif operation == "view_teams_by_conference":
            print(view_teams_by_conference(conn))
        elif operation == "view_games_by_team":
            print(view_games_by_team(conn, *args))
        elif operation == "view_results_by_date":
            print(view_results_by_date(conn, *args))
    finally:
        close_db(conn)
