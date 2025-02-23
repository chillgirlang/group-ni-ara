<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f0f0f0;
        }
        .sidebar {
            width: 250px;
            background-color: #a8f5a8;
            padding: 20px;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #ddd;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: left;
        }
        .sidebar button:hover {
            background-color: #bbb;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background: url('background.jpg') no-repeat center center;
            background-size: cover;
        }
        .header {
            background-color: #ccc;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
        }
        .table-container {
            background-color: #d3d3d3;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <button>ALL PATIENTS CASES</button>
        <button>Add New Patients</button>
        <button>Add New SOAP Case</button>
        <button>Appointments</button>
        <button>Settings</button>
        <button>Log out</button>
    </div>
    <div class="main-content">
        <div class="header">ALL PATIENTS CASES</div>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Disease</th>
                </tr>
                <?php
                $patients = [
                    ['id' => 1, 'name' => 'John Doe', 'dob' => '01/01/1990', 'disease' => 'Flu']
                ];
                foreach ($patients as $patient) {
                    echo "<tr><td>{$patient['id']}</td><td>{$patient['name']}</td><td>{$patient['dob']}</td><td>{$patient['disease']}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
