<!DOCTYPE html>
<html>
<head>
    <title>CSCE 4523 PROJECT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        h3 {
            margin-bottom: 10px;
        }
        #menu {
            margin-bottom: 20px;
        }
        #menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #menu ul li {
            margin-bottom: 10px;
        }
        #menu ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }
        #menu ul li a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>CSCE 4523 PROJECT</h2>
    <div id="menu">
        <h3>Choose an option:</h3>
        <ul>
            <li><a href="add_game.php">Add a game to the Game table</a></li>
            <li><a href="add_player.php">Add a player to Player table</a></li>
            <li><a href="view_players_by_team.php">View all the players on a team</a></li>
            <li><a href="view_players_by_position.php">View all players in a given position on any team</a></li>
            <li><a href="view_teams_by_conference.php">View all teams arranged by conference</a></li>
            <li><a href="view_games_by_team.php">View all games played by a given team</a></li>
            <li><a href="view_results_by_date.php">View all results on a given date</a></li>
        </ul>
    </div>
    
</body>
</html>
