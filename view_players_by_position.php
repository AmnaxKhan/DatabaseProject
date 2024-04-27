<!DOCTYPE html>
<html>
<head>
    <title>View Players by Position</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
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
