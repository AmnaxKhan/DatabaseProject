<!DOCTYPE html>
<html>
<head>
    <title>View Games by Team</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
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

    $command = "python3 view_games_by_team.py $team_id";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
