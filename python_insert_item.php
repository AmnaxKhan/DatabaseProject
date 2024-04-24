<html>
<body>
<h3>Enter information about an item to add to the database:</h3>

<div>
    <b>Suppliers:</b>
    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Coco Fresh Tea &amp; Juice</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Sharetea</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Boba Guys</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Kung Fu Tea</td>
    </tr>
    <tr>
        <td>15</td>
        <td>Fat Straws</td>
    </tr>
    </tbody>
    </table>
</div>

<form action="python_insert_item.php" method="post">
    Name: <input type="text" name="name"><br>
    Supplier id: <input type="text" name="supplier_id"><br>
    Quantity: <input type="text" name="quantity"><br>
    Unit Price: <input type="text" name="unit_price"><br>
    <input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = escapeshellarg($_POST['name']);
    $supplier_id = escapeshellarg($_POST['supplier_id']);
    $quantity = escapeshellarg($_POST['quantity']);
    $unit_price = escapeshellarg($_POST['unit_price']);

    $command = 'python3 insert_new_item.py ' . $name . ' ' . $supplier_id . ' ' . $quantity. ' ' . $unit_price;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insert_new_item.py
    system($escaped_command);           
}
?>


