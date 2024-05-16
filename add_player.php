<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
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

    // Validate team IDs
    $validate_command1 = "python3 check_team_exists.py $team_id";
    $output1 = shell_exec($validate_command1);

    if (strpos($output1, "No such team exists") !== false || strpos($output2, "No such team exists") !== false) {
        echo "<script>alert('Team ID does not exist. Please enter a valid team ID.');</script>";
    } else {
        // Proceed with adding the game
        $command = "python3 insert_player.py $team_id $name $position";
        $escaped_command = escapeshellcmd($command);
        $output = shell_exec($escaped_command);
        echo "<pre>$output</pre>";
    }
    
}
?>

<h3>Player Table:</h3> <!-- Header to signal the Game Table -->
<?php
$command = "python3 select_player.py 2>&1";  // Redirect stderr to stdout
$output = shell_exec($command);
echo $output ? "<div>$output</div>" : "<p>Error executing Python script.</p>";
?>

<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='home.php'">Go to Home Page</button>

</body>
</html>
