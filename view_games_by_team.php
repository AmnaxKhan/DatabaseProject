<!DOCTYPE html>
<html>
<head>
    <title>View Games by Team</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<h3>Select a Team to View Games</h3>
<form action="view_games_by_team.php" method="post">
    <label for="team-nickname">Choose a Team:</label>
    <select name="team-nickname" id="team-nickname">
        <?php
        $command = escapeshellcmd("python3 get_team_nicknames.py");
        $output = shell_exec($command);
        echo $output;
        ?>
    </select>
    <input type="submit" name="submit" value="View Games">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team-nickname']);

    $command = "python3 view_games_by_team.py $team_id";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='home.php'">Go to Home Page</button>

</body>
</html>
