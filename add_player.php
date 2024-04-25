<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
</head>
<body>
<h3>Add a Player to the NFL Database:</h3>
<form action="add_player.php" method="post">
    Team ID: <input type="text" name="team_id"><br>
    Name: <input type="text" name="name"><br>
    Position: <input type="text" name="position"><br>
    <input type="submit" name="submit" value="Add Player">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id = escapeshellarg($_POST['team_id']);
    $name = escapeshellarg($_POST['name']);
    $position = escapeshellarg($_POST['position']);

    // Command to run Python script
    $command = "python3 insert_player.py $team_id $name $position";
    $escaped_command = escapeshellcmd($command);
    $output = shell_exec($escaped_command);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>