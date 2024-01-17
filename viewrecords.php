<!DOCTYPE html>
<html>

<head>
    <title>View Student Records | Sparkle Spins Laundry Service</title>
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

        .container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin-top: 20px;
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

    <h2>View Student Records</h2>

    <div class="container">
        <form action="viewrecords.php" method="post">
            <label for="registrationNo">Enter Registration Number:</label>
            <input type="text" id="registrationNo" name="registrationNo" placeholder="Registration Number" required>
            <input type="submit" value="View Records" name="viewRecords">
        </form>
    </div>

    <?php
    if (isset($_POST['viewRecords'])) {
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

        $registrationNo = $_POST['registrationNo'];

        // Fetch all tasks for the given registration number
        $query = "SELECT * FROM YourTableName WHERE RegistrationNo = '$registrationNo'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Task ID</th>
                        <th>No of Shirts</th>
                        <th>No of Pants</th>
                        <th>No of Miscellaneous Clothing</th>
                        <th>Washing Instructions</th>
                        <th>Task Status</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['TaskID']}</td>
                        <td>{$row['NoOfShirts']}</td>
                        <td>{$row['NoOfPants']}</td>
                        <td>{$row['NoOfMiscellaneousClothing']}</td>
                        <td>{$row['WashingInstructions']}</td>
                        <td>{$row['TaskStatus']}</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found for the given registration number.</p>";
        }

        $conn->close();
    }
    ?>

    <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>

</body>

</html>
