<!DOCTYPE html>
<html>
<head>
    <title>View Teams by Conference</title>
</head>
<body>
<h3>View Teams by Conference:</h3>

<?php
$command = "python3 view_teams_by_conference.py 2>&1";  // Redirect stderr to stdout
$output = shell_exec($command);
echo $output ? "<div>$output</div>" : "<p>Error executing Python script.</p>";
?>
</body>
</html>
