<!DOCTYPE html>
<html>
<head>
    <title>View Advanced Stats</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<h3>View Advanced Player Stats:</h3>
<form action="view_advanced_stats.php" method="post">
    Team ID: <input type="text" name="team_id"><br>
    <input type="submit" name="submit" value="View Stats">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team_id']);
    $command = "python3 ./view_advanced_stats.py $team_id";
    $output = shell_exec($command);
    echo $output;
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
