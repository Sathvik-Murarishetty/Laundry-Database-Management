<!DOCTYPE html>
<html>

<head>
    <title>View All Tasks | Sparkle Spins Laundry Service</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(45deg, #4153AF, #F9E9EC);
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4153AF;
            color: white;
        }

        .back-button {
            background-color: #FF0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            margin-top: 10px;
        }

        .back-button:hover {
            background-color: #B30000;
        }
    </style>
</head>

<body>

    <h2>View All Tasks</h2>

    <?php
    // Connect to your MySQL database here (replace with actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "trial1";
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch tasks with status "inprogress"
    $query = "SELECT * FROM YourTableName WHERE TaskStatus = 'inprogress'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Task ID</th>
                    <th>Registration Number</th>
                    <th>No of Shirts</th>
                    <th>No of Pants</th>
                    <th>No of Miscellaneous Clothing</th>
                    <th>Washing Instructions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['TaskID']}</td>
                    <td>{$row['RegistrationNo']}</td>
                    <td>{$row['NoOfShirts']}</td>
                    <td>{$row['NoOfPants']}</td>
                    <td>{$row['NoOfMiscellaneousClothing']}</td>
                    <td>{$row['WashingInstructions']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No tasks in progress.</p>";
    }

    $conn->close();
    ?>

    <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>

</body>

</html>
