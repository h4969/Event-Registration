<?php
include('db.php'); // Database connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $name  = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $event = $_POST['event'] ?? '';

    // Check for empty values
    if (empty($name) || empty($email) || empty($phone) || empty($event)) {
        die("❌ All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid email format.");
    }

    // Validate phone (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("❌ Phone must be 10 digits.");
    }

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, event) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("❌ SQL Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $event);

    // Execute
    if ($stmt->execute()) {
        // ✅ Redirect to success page
        header("Location: success.html");
        exit();
    } else {
        echo "❌ Insert failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "❌ Invalid request.";
}
?>
