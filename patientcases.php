<?php
$host = "localhost"; // Change if using another host
$username = "root"; // Change as per your database credentials
$password = "rota123"; // Change as per your database password
$database = "dashboard_db"; // Change to your actual database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Cases</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bckgrnd.jpg'); /* Replace with your image file */
            background-size: cover; /* Ensures the image covers the whole screen */
            background-position: center; /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            background-repeat: no-repeat; /* Prevents image from repeating */
            margin: 0;
            padding: 0;
        }


        /* Container Styling */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }

        /* Heading */
        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        /* Table Header */
        thead th {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
        }

        /* Table Rows */
        tbody tr {
            background-color: white;
            transition: background-color 0.3s ease-in-out;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* Hover Effect */
        tbody tr:hover {
            background-color: #e2e6ea;
        }

        /* Table Data Cells */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            
            td, th {
                padding: 8px;
            }
        }

    </style>

</head>
<body>
    <?php
    $sql = "SELECT Case_ID, Case_Number, Diagnosis, Symptoms, Treatment_Plan, 
                Case_Status, Admission_Date, Discharge_Date 
            FROM Patient_Cases";
    $result = $conn->query($sql);
    ?>

    <div class="container mt-5">
        <h2 class="mb-4">All Patient Cases</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Case ID</th>
                    <th>Case Number</th>
                    <th>Diagnosis</th>
                    <th>Symptoms</th>
                    <th>Treatment Plan</th>
                    <th>Case Status</th>
                    <th>Admission Date</th>
                    <th>Discharge Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Case_ID']; ?></td>
                        <td><?php echo $row['Case_Number']; ?></td>
                        <td><?php echo $row['Diagnosis']; ?></td>
                        <td><?php echo $row['Symptoms']; ?></td>
                        <td><?php echo $row['Treatment_Plan']; ?></td>
                        <td><?php echo $row['Case_Status']; ?></td>
                        <td><?php echo $row['Admission_Date']; ?></td>
                        <td><?php echo $row['Discharge_Date'] ?: 'N/A'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
