import sys
import python_db

def view_players_by_position(position):
    query = "SELECT * FROM Player WHERE Position = %s"
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    result = python_db.execute_select(query, (position,))
    print(result)
    python_db.close_db()

if __name__ == "__main__":
    view_players_by_position(sys.argv[1])
