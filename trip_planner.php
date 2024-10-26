<?php
// Connect to MySQL
$conn = new mysqli('localhost', 'root', '', 'city_info');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the trip_planner table
$sql = "SELECT * FROM trip_planner";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Planner</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Trip Planner</h1>
    </header>

    <table>
        <tr>
            <th>Day</th>
            <th>Plan</th>
            <th>Location</th>
        </tr>

        <!-- Your PHP code fetching rows -->
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['plan']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>


<?php
// Close connection
$conn->close();
?>
