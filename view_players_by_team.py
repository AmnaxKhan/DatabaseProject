import sys
import python_db

def view_players_by_team(team_id):
    query = "SELECT * FROM Player WHERE TeamId = %s"
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    result = python_db.execute_select(query, (team_id,))
    print(result)
    python_db.close_db()

if __name__ == "__main__":
    view_players_by_team(sys.argv[1])
