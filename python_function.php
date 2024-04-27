<!DOCTYPE html>
<html>
<head>
    <title>CSCE 4523 PROJECT</title>
    <style>
    body {
        font-family: 'Georgia', sans-serif; /* Default font */
        margin: 0;
        padding: 20px;
        background-color: #013369; /* Dark blue commonly associated with NFL */
        color: #D3D3D3; /* Light grey text for better readability */
    }
    h2 {
        color: #D3D3D3; /* Light grey to contrast against the dark background */
        text-align: center;
        font-family: 'Georgia', serif; /* A more formal font for the main title */
    }
    h3 {
        color: #000000; /* Darker color for the subheading */
        font-family: 'Impact', sans-serif; /* A bolder font that could fit an NFL theme */
        font-size: 24px; /* Slightly larger font size for emphasis */
    }
    #content {
        display: flex;
        justify-content: space-between;
        align-items: start;
        background: rgba(255, 255, 255, 0.8); /* Semi-transparent background for content */
        padding: 20px;
        border-radius: 8px; /* Rounded corners for the flex container */
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); /* Subtle shadow for depth */
    }
    #menu {
        flex: 1;
        margin-right: 20px;
    }
    #menu ul {
        list-style-type: none;
        padding: 0;
    }
    #menu ul li {
        margin-bottom: 10px;
    }
    #menu ul li a {
        text-decoration: none;
        color: #013369; /* Dark blue text */
        padding: 10px 20px;
        background-color: #D3D3D3; /* Light grey background */
        border: none;
        border-radius: 5px;
        display: block;
        transition: background-color 0.3s, color 0.3s;
    }
    #menu ul li a:hover {
        background-color: #FFA500; /* Highlight color (NFL theme orange) */
        color: white;
    }
    #image-container {
        flex: 1;
        text-align: center;
    }
    #image-container img {
        max-width: 100%;
        height: auto;
        border-radius: 8px; /* Rounded corners for the image */
    }
    </style>

</head>
<body>
    <h2>CSCE 4523 PROJECT - NFL Management System</h2>
    <div id="content">
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
                <li><a href="view_advanced_stats.php">View Advanced Player Stats</a></li>
            </ul>
        </div>
        <div id="image-container">
            <img src="nfl.png" alt="NFL Themed Image">
        </div>
    </div>
</body>
</html>
