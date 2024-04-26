<!DOCTYPE html>
<html>
<head>
    <title>View Players by Position</title>
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
<h3>View Players by Position:</h3>
<form action="view_players_by_position.php" method="post">
    Position: <input type="text" name="position"><br>
    <input type="submit" name="submit" value="View Players">
</form>

<?php
if (isset($_POST['submit'])) {
    $position = escapeshellarg($_POST['position']);
    $output = shell_exec("python3 ./view_players_by_position.py $position");
    echo $output;
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
