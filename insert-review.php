<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "gym-database"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
  
        $sql = "INSERT INTO reviews (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>New record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    $conn->close();
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

