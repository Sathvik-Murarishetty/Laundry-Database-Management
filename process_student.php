<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "trial1";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST['studentName'];
    $registrationNumber = $_POST['registrationNumber'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO students (RegistrationNumber, StudentName, Password, PhoneNumber) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $registrationNumber, $studentName, $password, $phoneNumber);

        if ($stmt->execute()) {
            echo '<script>alert("Account created successfully!"); window.location.href = "welcomeadmin.php";</script>';
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
