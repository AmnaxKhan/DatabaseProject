<!DOCTYPE html>
<html>
<head>
    <title>View Advanced Stats</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black; /* Black borders for table cells */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Light grey background for headers */
        }
    </style>
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
