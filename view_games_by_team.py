import sys
import python_db

def view_games_by_team(team_id):
    query = """
    SELECT g.Date, t1.Nickname as HomeTeam, t2.Nickname as AwayTeam, g.Score1, g.Score2
    FROM Game g
    JOIN Team t1 ON g.TeamId1 = t1.TeamId
    JOIN Team t2 ON g.TeamId2 = t2.TeamId
    WHERE g.TeamId1 = %s OR g.TeamId2 = %s
    ORDER BY g.Date DESC
    """
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    result = python_db.execute_select(query, (team_id, team_id))
    print(result)
    python_db.close_db()

if __name__ == "__main__":
    view_games_by_team(sys.argv[1])
