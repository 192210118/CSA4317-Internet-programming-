<?php
// Database connection
$host = 'localhost';
$db = 'travel_booking';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert booking data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $travel_date = $conn->real_escape_string($_POST['travel_date']);
    $passengers = (int)$_POST['passengers'];

    $sql = "INSERT INTO bookings (name, email, destination, travel_date, passengers)
            VALUES ('$name', '$email', '$destination', '$travel_date', $passengers)";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
