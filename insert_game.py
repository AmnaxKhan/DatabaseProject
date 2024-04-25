import sys
import python_db

def insert_game(team_id1, team_id2, score1, score2, game_date):
    query = """
    INSERT INTO Game (TeamId1, TeamId2, Score1, Score2, Date)
    VALUES (%s, %s, %s, %s, %s)
    """
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    python_db.execute_insert(query, (team_id1, team_id2, score1, score2, game_date))
    python_db.close_db()

if __name__ == "__main__":
    insert_game(*sys.argv[1:])
