<!DOCTYPE html>
<html>
<head>
    <title>View Teams by Conference</title>
</head>
<body>
<h3>View Teams by Conference:</h3>

<?php
$command = "python3 view_teams_by_conference.py";
$output = shell_exec($command);
echo "<pre>$output</pre>";
?>
</body>
</html>
