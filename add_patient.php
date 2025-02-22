<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = intval($_POST["age"]);
    $gender = $_POST["gender"];

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($age) || empty($gender)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO patients (name, email, phone, age, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $name, $email, $phone, $age, $gender);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Patient added successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to add patient."]);
    }

    $stmt->close();
    $conn->close();
}
?>
