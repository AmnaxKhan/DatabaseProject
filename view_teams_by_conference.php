<!DOCTYPE html>
<html>
<head>
    <title>View Teams by Conference</title>
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
<h3>View Teams by Conference:</h3>

<?php
$command = "python3 view_teams_by_conference.py 2>&1";  // Redirect stderr to stdout
$output = shell_exec($command);
echo $output ? "<div>$output</div>" : "<p>Error executing Python script.</p>";
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>

</body>
</html>
