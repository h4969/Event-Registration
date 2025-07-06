<?php
include('includes/db.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event = $_POST['event'];

$sql = "INSERT INTO registrations (name, email, phone, event)
        VALUES ('$name', '$email', '$phone', '$event')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
