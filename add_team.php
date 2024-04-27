<!DOCTYPE html>
<html>
<head>
    <title>Add Team</title>
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
<h2>Add a New Team</h2>
<form action="add_team.php" method="post">
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

    $command = "python3 add_team.py $location $nickname $conference $division";
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
}
?>
<!-- Back Button to Home Page -->
<button class="back-button" onclick="window.location.href='python_function.php'">Go to Home Page</button>
</body>
</html>
