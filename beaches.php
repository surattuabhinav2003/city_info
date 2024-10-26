<?php
$conn = new mysqli('localhost', 'root', '', 'city_info');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM beaches";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beaches</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script> 
</head>
<body>
    <header>
        <h1>Beaches</h1>
    </header>

    <table>
        <tr>
            <th>Photo</th>
            <th>Description</th>
            <th>Location</th>
            <th>Nearby Hotels</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr onmouseover="highlightRow(this)" onmouseout="unhighlightRow(this)">
            <td><img src="images/<?php echo $row['photo']; ?>" alt="<?php echo $row['description']; ?>" width="350"></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['nearby_hotels']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
