<!DOCTYPE html>
<html>
<head>
    <title>View Results by Date</title>
</head>
<body>
<h3>View Results by Date:</h3>
<form action="view_results_by_date.php" method="post">
    Date (YYYY-MM-DD): <input type="text" name="date"><br>
    <input type="submit" name="submit" value="View Results">
</form>

<?php
if (isset($_POST['submit'])) {
    $date = escapeshellarg($_POST['date']);

    $command = "python3 view_results_by_date.py $date";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>