<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<style>
    body{
        background-color: black;
        color : white;
    }
</style>
<body>
    <div class="container my-5">
    <h2 class="text-center">Admin Panel</h2>
    <a href="customer-details.php">Customer Details</a>
    <table class="table">
        <thead class="table-dark">
            <tr>
            <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = mysqli_connect("localhost", "root", "", "gym-database");
            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['delete'])) {
                    // Delete record
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $qry = "DELETE FROM reviews WHERE name='$name' AND email='$email'";
                    if (mysqli_query($conn, $qry)) {
                        echo "<div class='alert alert-success' role='alert'>Record deleted successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . mysqli_error($conn) . "</div>";
                    }
                }
            }

            $qry = "SELECT * FROM reviews";
            $result = mysqli_query($conn, $qry);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='name' value='" . $row["name"] . "'>";
                    echo "<input type='hidden' name='email' value='" . $row["email"] . "'>";
                    echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";

                    // Modal content...
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <a href="index.html" class="btn btn-dark">Go Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
