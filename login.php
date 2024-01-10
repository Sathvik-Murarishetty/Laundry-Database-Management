<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //database connections.
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "trial1";

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
            // Redirect to student dashboard.
            header("Location: welcomestudent.php");
            exit;
        } else {
            // Invalid credentials.
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    } elseif ($userType === 'admin') {
        $sql = "SELECT * FROM admins WHERE Username = '$username' AND Password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Admin credentials are valid. Redirect to admin dashboard.
            header("Location: welcomeadmin.php");
            exit;
        } else {
            // Invalid credentials.
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sparkle Spins Laundry Service</title>
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

        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #4153AF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #6F7FB7;
        }
    </style>
</head>

<body>

    <h1>Welcome to Sparkle Spins Laundry Service</h1>

    <div class="container">
        <form action="login.php" method="post">
            <label for="userType">Select User Type:</label>
            <select name="userType" id="userType" required>
                <option value="">--Select User Type--</option>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
            <br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>
