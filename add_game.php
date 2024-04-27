<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #013369; /* NFL dark blue */
            color: #fff; /* White text for better readability */
            margin: 0;
            padding: 20px;
        }
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white; /* Background color for the table */
            color: #013369; /* Text color */
        }
        th, td {
            border: 1px solid #013369; /* NFL theme blue border */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FFA500; /* NFL theme orange for headers */
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            display: block;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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

    // Validate team IDs
    $validate_command1 = "python3 check_team_exists.py $team_id1";
    $validate_command2 = "python3 check_team_exists.py $team_id2";
    $output1 = shell_exec($validate_command1);
    $output2 = shell_exec($validate_command2);

    if (strpos($output1, "No such team exists") !== false || strpos($output2, "No such team exists") !== false) {
        echo "<script>alert('One or both team IDs do not exist. Please enter a valid team ID.');</script>";
    } else {
        // Proceed with adding the game
        $add_command = "python3 insert_game.py $team_id1 $team_id2 $score1 $score2 $date"; 
        $output = shell_exec($add_command);
        echo "<pre>$output</pre>";
    }

}
?>
<h3>Game Table:</h3> <!-- Header to signal the Game Table -->
<?php
$command = "python3 select_game.py 2>&1";  // Redirect stderr to stdout
$output = shell_exec($command);
echo $output ? "<div>$output</div>" : "<p>Error executing Python script.</p>";
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
