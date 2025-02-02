
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "gym-database");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve data
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql); //[Adnan Ali, adduadnanali@gmail.com, Nice one] //Gayathri ggpv@gmail.com Great Quality
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        background-color: black;
        color : white;
    }
</style>
<body>


<div class="container mt-5">
    <h2>Customer Registration</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Number</th>
                <th>Plan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["number"] . "</td>";
                    echo "<td>" . $row["plan"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="admin-panel.php" class="btn btn-dark">Go Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
  