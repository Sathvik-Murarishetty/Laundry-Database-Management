<!DOCTYPE html>
<html>

<head>
    <title>Update Task Status | Sparkle Spins Laundry Service</title>
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
            width: 30%;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .button {
            background-color: #4153AF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            margin-top: 10px;
            width: 100%;
        }

        .button:hover {
            background-color: #6F7FB7;
        }

        .back-button {
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            margin-top: 10px;
            width: 100%;
        }

        .back-button:hover {
            background-color: #FF6666;
        }
    </style>
</head>

<body>

    <h2>Update Task Status</h2>

    <div class="container">
        <form action="updatestatustask.php" method="post">
            <label for="registrationNo">Registration Number:</label>
            <input type="text" id="registrationNo" name="registrationNo" placeholder="Enter Registration Number" required>
            <button class="button" name="updateTaskButton">Update Task</button>
        </form>

        <?php
    if (isset($_POST['updateTaskButton'])) {
    $registrationNo = $_POST['registrationNo'];

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

    // Check if there is an existing in-progress task for the provided registration number
    $checkQuery = "SELECT * FROM YourTableName WHERE RegistrationNo = '$registrationNo' AND TaskStatus = 'inprogress'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows == 1) {
        // Update the status of the task to 'completed'
        $updateQuery = "UPDATE YourTableName SET TaskStatus = 'completed' WHERE RegistrationNo = '$registrationNo' AND TaskStatus = 'inprogress'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<p>Status updated successfully. Task is now completed.</p>";
            echo '<script>alert("Task updated successfully!"); window.location = "welcomeadmin.php";</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo '<script>alert("No in-progress tasks found for the provided registration number.");</script>';
    }

    $conn->close();
}
?>


        <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>
    </div>

</body>

</html>
