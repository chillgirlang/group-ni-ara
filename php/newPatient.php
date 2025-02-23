<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form values safely using the null coalescing operator
    $name   = $_POST['name'] ?? '';
    $email  = $_POST['email'] ?? '';
    $phone  = $_POST['phone'] ?? '';
    $age    = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';

    // Here you could add code to validate the data, insert it into a database, etc.
    // For demonstration, we'll simply output the submitted data.
    echo "<h2>Patient Added</h2>";
    echo "<p>Name: " . htmlspecialchars($name) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Phone: " . htmlspecialchars($phone) . "</p>";
    echo "<p>Age: " . htmlspecialchars($age) . "</p>";
    echo "<p>Gender: " . htmlspecialchars($gender) . "</p>";
    // Optionally exit if you don't want to show the form again
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e6ffe6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2d6a4f;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #40916c;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #74c69d;
            border-radius: 5px;
            display: block;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .gender {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .cancel {
            background: #b7e4c7;
            color: #1b4332;
        }
        .submit {
            background: #1b4332;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Patient</h2>
        <p>Fill in the information below to add a patient.</p>
        <!-- Set the method to POST and action to this same file -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <label for="email">Email ID</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" placeholder="Enter Age" required>

            <label>Gender</label>
            <div class="gender">
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female" required>
                <label for="female">Female</label>
            </div>

            <div class="buttons">
                <!-- The CANCEL button could be enhanced with JavaScript to clear the form or redirect -->
                <button type="button" class="cancel" onclick="window.location.reload();">CANCEL</button>
                <button type="submit" class="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>
