import sys
import python_db

def insert_player(team_id, name, position):
    query = "INSERT INTO Player (TeamId, Name, Position) VALUES (%s, %s, %s)"
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    python_db.execute_insert(query, (team_id, name, position))
    python_db.close_db()

if __name__ == "__main__":
    team_id = sys.argv[1]
    name = sys.argv[2]
    position = sys.argv[3]
    insert_player(team_id, name, position)
