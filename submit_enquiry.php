<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enquirydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Check for empty fields
    if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($message)) {
        echo "All fields are required!";
    } else {
        // Prepare the SQL statement with placeholders to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO enquiries (name, email, phone, service, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $service, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Enquiry submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
