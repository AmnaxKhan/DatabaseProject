<!DOCTYPE html>
<html>
<head>
    <title>View Advanced Stats</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<h3>Select a Team to View Advanced Player Stats</h3>
<form action="view_advanced_stats.php" method="post">
    <label for="team-id">Choose a Team:</label>
    <select name="team-id" id="team-id">
        <?php
        $command = escapeshellcmd("python3 get_team_nicknames.py");
        $output = shell_exec($command);
        echo $output;
        ?>
    </select>
    <input type="submit" name="submit" value="View Stats">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team-id']); // Corrected to 'team-id' to match the select name
    $command = "python3 ./view_advanced_stats.py $team_id";
    $output = shell_exec($command);
    echo $output; // Assuming the output is safe HTML
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
