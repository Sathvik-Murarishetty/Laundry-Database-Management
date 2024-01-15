<?php
session_start();

// Check if the user is logged in (registration number is stored in the session)
if (!isset($_SESSION['registrationNumber'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

$registrationNumber = $_SESSION['registrationNumber'];

// Add your database connection details here
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "trial1"; // Replace with your actual database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the last laundry task for the logged-in student
$sql = "SELECT * FROM YourTableName WHERE RegistrationNo = '$registrationNumber' ORDER BY TaskID DESC LIMIT 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View My Status | Sparkle Spins Laundry Service</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(45deg, #4153AF, #F9E9EC);
            font-family: Arial, sans-serif;
            margin: 0;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #000000;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4153AF;
            color: #fff;
        }

        .back-button {
            background-color: #FF0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #B30000;
        }

        /* Add your additional styles here */

    </style>
</head>

<body>

    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $taskID = $row['TaskID'];
        $noOfShirts = $row['NoOfShirts'];
        $noOfPants = $row['NoOfPants'];
        $noOfMiscellaneousClothing = $row['NoOfMiscellaneousClothing'];
        $washingInstructions = $row['WashingInstructions'];
        $taskStatus = $row['TaskStatus'];

        echo "<h2>Last Laundry Task Status</h2>";
        echo "<table>";
        echo "<tr><th>Task ID</th><th>Number of Shirts</th><th>Number of Pants</th><th>Number of Other Clothing Items</th><th>Washing Instructions</th><th>Task Status</th></tr>";
        echo "<tr><td>$taskID</td><td>$noOfShirts</td><td>$noOfPants</td><td>$noOfMiscellaneousClothing</td><td>$washingInstructions</td><td>$taskStatus</td></tr>";
        echo "</table>";
    } else {
        echo "<h2>No laundry tasks found for this student.</h2>";
    }

    $conn->close();
    ?>

    <button class="back-button" onclick="window.location.href='welcomestudent.php'">Back to Dashboard</button>

</body>

</html>
