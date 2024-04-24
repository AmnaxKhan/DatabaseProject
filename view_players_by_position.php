<!DOCTYPE html>
<html>
<head>
    <title>View Players by Position</title>
</head>
<body>
<h3>View Players by Position:</h3>
<form action="view_players_by_position.php" method="post">
    Position: <input type="text" name="position"><br>
    <input type="submit" name="submit" value="View Players">
</form>

<?php
if (isset($_POST['submit'])) {
    $position = escapeshellarg($_POST['position']);

    $command = escapeshellcmd("python3 python_db.py localhost amnak ooSh9Phu nfl_database view_players_by_position $position");
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>
