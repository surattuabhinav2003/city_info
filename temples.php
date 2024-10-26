<?php
// Connect to MySQL
$conn = new mysqli('localhost', 'root', '', 'city_info');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the temples table
$sql = "SELECT * FROM temples";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temples</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script> 
</head>
<body>
    <header>
        <h1>Temples</h1>
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
            <td><img src="images/<?php echo $row['photo']; ?>" alt="<?php echo $row['description']; ?>" width="400"></td>
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
