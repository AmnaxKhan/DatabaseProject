import python_db

def view_teams_by_conference():
    query = """
    SELECT Conference, Location, Nickname, COUNT(GameId) as Wins
    FROM Team
    LEFT JOIN Game ON Team.TeamId = Game.WinningTeamId
    GROUP BY Conference, Location, Nickname
    ORDER BY Conference, Wins DESC
    """
    python_db.open_database('localhost', 'amnak', 'ooSh9Phu', 'amnak')
    result = python_db.execute_select(query)
    print(result)
    python_db.close_db()

if __name__ == "__main__":
    view_teams_by_conference()
