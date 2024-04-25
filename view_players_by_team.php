<!DOCTYPE html>
<html>
<head>
    <title>View Players by Team</title>
</head>
<body>
<h3>View Players by Team:</h3>
<form action="view_players_by_team.php" method="post">
    Team ID: <input type="text" name="team_id"><br>
    <input type="submit" name="submit" value="View Players">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team_id']);
    $command = "python3 ./view_players_by_team.py $team_id";
    $output = shell_exec($command);
    echo $output;  // Assuming the output is safe HTML
}
?>
</body>
</html>
