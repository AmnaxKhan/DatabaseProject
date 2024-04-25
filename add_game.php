<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
</head>
<body>
<h3>Add a Game:</h3>
<form action="add_game.php" method="post">
    Team ID 1: <input type="text" name="team_id1"><br>
    Team ID 2: <input type="text" name="team_id2"><br>
    Score 1: <input type="text" name="score1"><br>
    Score 2: <input type="text" name="score2"><br>
    Date (YYYY-MM-DD): <input type="text" name="date"><br>
    <input type="submit" name="submit" value="Add Game">
</form>

<?php
if (isset($_POST['submit'])) {
    $team_id1 = escapeshellarg($_POST['team_id1']);
    $team_id2 = escapeshellarg($_POST['team_id2']);
    $score1 = escapeshellarg($_POST['score1']);
    $score2 = escapeshellarg($_POST['score2']);
    $date = escapeshellarg($_POST['date']);

    $command = "python3 insert_game.py $team_id1 $team_id2 $score1 $score2 $date";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>
