<!DOCTYPE html>
<html>

<head>
    <title>Create Student Account | Sparkle Spins Laundry Service</title>
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
            font-size: 36px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
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

        input[type="submit"]:hover,
        .back-button:hover {
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

    </style>
</head>

<body>

    <h2>Create Student Account</h2>

    <div class="container">
        <form action="process_student.php" method="post" onsubmit="return showSuccessMessage()">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="registrationNumber">Registration Number:</label>
            <input type="text" id="registrationNumber" name="registrationNumber" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="number" id="phoneNumber" name="phoneNumber" required>

            <input type="submit" value="Create Student">

            <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>
        </form>
    </div>

</body>

</html>


