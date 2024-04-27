<!DOCTYPE html>
<html>
<head>
    <title>Add Team</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<h2>Add a New Team</h2>
<form action="insert_team.php" method="post">
    Location: <input type="text" name="location"><br>
    Nickname: <input type="text" name="nickname"><br>
    Conference: <input type="text" name="conference"><br>
    Division: <input type="text" name="division"><br>
    <button type="submit" name="submit">Add Team</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $location = escapeshellarg($_POST['location']);
    $nickname = escapeshellarg($_POST['nickname']);
    $conference = escapeshellarg($_POST['conference']);
    $division = escapeshellarg($_POST['division']);

    $command = "python3 insert_team.py $location $nickname $conference $division";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
<h3>Player Table:</h3> <!-- Header to signal the Game Table -->
<?php
$command = "python3 select_team.py 2>&1";  // Redirect stderr to stdout
$output = shell_exec($command);
echo $output ? "<div>$output</div>" : "<p>Error executing Python script.</p>";
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>
</body>
</html>
