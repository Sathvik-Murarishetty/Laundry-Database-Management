<!DOCTYPE html>
<html>

<head>
    <title>Create Laundry Task | Sparkle Spins Laundry Service</title>
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

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        .back-button {
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

        input[type="submit"]:hover {
            background-color: #6F7FB7;
        }

        .back-button {
            background-color: #FF0000;
        }

        .back-button:hover {
            background-color: #B30000;
        }
    </style>
</head>

<body>

    <h2>Create Laundry Task</h2>

    <div class="container">
        <form action="createlaundrytask.php" method="post">
            <label for="registrationNo">Student Registration Number:</label>
            <input type="text" id="registrationNo" name="registrationNo" placeholder="Enter Registration Number" required>

            <label for="noOfShirts">Number of Shirts:</label>
            <input type="number" id="noOfShirts" name="noOfShirts" placeholder="Enter the number of shirts" required>

            <label for="noOfPants">Number of Pants:</label>
            <input type="number" id="noOfPants" name="noOfPants" placeholder="Enter the number of pants" required>

            <label for="noOfMiscellaneousClothing">Number of Other Clothing Items:</label>
            <input type="number" id="noOfMiscellaneousClothing" name="noOfMiscellaneousClothing" placeholder="Enter the number of other clothing items" required>

            <label for="washingInstructions">Special Washing Instructions:</label>
            <textarea id="washingInstructions" name="washingInstructions" rows="4" placeholder="Enter any specific washing instructions"></textarea>

            <input type="submit" value="Create Task" name="createTask">
        </form>

        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 20px;">
            <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>
        </div>
    </div>

    <?php
    if (isset($_POST['createTask'])) {
        $registrationNo = $_POST['registrationNo'];
        $noOfShirts = $_POST['noOfShirts'];
        $noOfPants = $_POST['noOfPants'];
        $noOfMiscellaneousClothing = $_POST['noOfMiscellaneousClothing'];
        $washingInstructions = $_POST['washingInstructions'];
        $taskStatus = 'inprogress';

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

        // Check if there is an existing in-progress task for the same registration number
        $checkQuery = "SELECT COUNT(*) AS taskCount FROM YourTableName WHERE RegistrationNo = '$registrationNo' AND TaskStatus = 'inprogress'";
        $result = $conn->query($checkQuery);
        $row = $result->fetch_assoc();
        $taskCount = $row['taskCount'];

        if ($taskCount > 0) {
            echo "<script>alert('An in-progress task already exists for this registration number. Only one in-progress task is allowed.');</script>";
        } else {
            // Insert the new task into the database
            $insertQuery = "INSERT INTO YourTableName (RegistrationNo, NoOfShirts, NoOfPants, NoOfMiscellaneousClothing, WashingInstructions, TaskStatus) VALUES ('$registrationNo', '$noOfShirts', '$noOfPants', '$noOfMiscellaneousClothing', '$washingInstructions', '$taskStatus')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('Task created successfully!');</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>

</body>

</html>
