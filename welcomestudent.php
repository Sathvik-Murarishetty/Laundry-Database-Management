<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add your database connection and SQL query here to check student credentials.
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "trial1"; // Updated to "trial1" for your database name

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($userType === 'student') {
        $sql = "SELECT * FROM students WHERE RegistrationNumber = '$username' AND Password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Student credentials are valid. Store registration number in session.
            $_SESSION['registrationNumber'] = $username;
            // Redirect to student dashboard or another page.
            header("Location: welcomestudent.php"); // Replace with the actual student dashboard page.
            exit;
        } else {
            // Invalid credentials. Display a dialogue box.
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    } elseif ($userType === 'admin') {
        $sql = "SELECT * FROM admins WHERE Username = '$username' AND Password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Admin credentials are valid. Redirect to admin dashboard or another page.
            header("Location: welcomeadmin.php"); // Replace with the actual admin dashboard page.
            exit;
        } else {
            // Invalid credentials. Display a dialogue box.
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome Student | Sparkle Spins Laundry Service</title>
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
            width: 20%;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #000000;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: block;
            text-decoration: none;
            color: #ffffff;
            background-color: #4153AF;
            padding: 10px 0; /* Adjusted padding */
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
        }

        a:hover {
            background-color: #6F7FB7;
        }

        .logout-button {
            background-color: #FF0000;
            color: #ffffff;
            width: 100%;
        }
    </style>
</head>

<body>

    <h1>Welcome, Student!</h1>

    <div class="container">

        <ul>
            <li><a href="viewmystatus.php">View My Current Status</a></li>
            <li><a href="mylaundryhistory.php">My Laundry History</a></li>
            <li><a class="logout-button" href="login.php">Logout</a></li>
        </ul>
    </div>

</body>

</html>
