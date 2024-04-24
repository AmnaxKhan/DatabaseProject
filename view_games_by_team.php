<!DOCTYPE html>
<html>
<head>
    <title>View Games by Team</title>
</head>
<body>
<h3>View Games by Team:</h3>
<form action="view_games_by_team.php" method="post">
    Team ID: <input type="text" name="team_id"><br>
    <input type="submit" name="submit" value="View Games">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team_id']);

    $command = escapeshellcmd("python3 python_db.py localhost amnak ooSh9Phu nfl_database view_games_by_team $team_id");
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>
