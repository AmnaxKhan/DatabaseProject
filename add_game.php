<!DOCTYPE html>
<html>
<body>
<h3>Add a Game:</h3>
<form action="add_game.php" method="post">
    Team ID 1: <input type="text" name="team_id1"><br>
    Team ID 2: <input type="text" name="team_id2"><br>
    Score 1: <input type="text" name="score1"><br>
    Score 2: <input type="text" name="score2"><br>
    Date: <input type="text" name="date"><br>
    <input name="submit" type="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    include 'db_connect.php';  // Ensure you have a file to handle DB connection
    $team_id1 = $_POST['team_id1'];
    $team_id2 = $_POST['team_id2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];
    $date = $_POST['date'];

    // SQL to insert data
    $sql = "INSERT INTO Game (TeamId1, TeamId2, Score1, Score2, Date) VALUES ('$team_id1', '$team_id2', '$score1', '$score2', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New game added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
