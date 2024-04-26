<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
    <style>
        .back-button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
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

<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
