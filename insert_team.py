import sys
import python_db

def insert_team(location, nickname, conference, division):
    query = """
    INSERT INTO Team (Location, Nickname, Conference, Division)
    VALUES (%s, %s, %s, %s)
    """
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    python_db.execute_insert(query, (location, nickname, conference, division))
    python_db.close_db()

if __name__ == "__main__":
    insert_team(*sys.argv[1:])
