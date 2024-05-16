<!DOCTYPE html>
<html>
<head>
    <title>View Players by Team</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<h3>Select a Team to View Players</h3>
<form action="view_players_by_team.php" method="post">
    <label for="team-nickname">Choose a Team:</label>
    <select name="team-id" id="team-nickname">
        <?php
        $command = escapeshellcmd("python3 get_team_nicknames.py");
        $output = shell_exec($command);
        echo $output;
        ?>
    </select>
    <input type="submit" name="submit" value="View Players">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team-id']);  // Changed from 'team_id' to 'team-id' to match the select name
    $command = "python3 ./view_players_by_team.py $team_id";
    $output = shell_exec($command);
    echo $output;  // Assuming the output is safe HTML
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='home.php'">Go to Home Page</button>

</body>
</html>
