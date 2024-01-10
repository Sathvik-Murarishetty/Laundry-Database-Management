<!DOCTYPE html>
<html>

<head>
    <title>Welcome Admin | Sparkle Spins Laundry Service</title>
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
            padding: 10px 0;
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

    <h1>Welcome, Admin!</h1>

    <div class="container">

        <ul>
            <li><a href="createstudent.php">Create Student Account</a></li>
            <li><a href="managelaundry.php">Manage Laundry Requests</a></li>
            <li><a href="viewtasks.php">View All Current Tasks</a></li>
            <li><a href="viewrecords.php">View Student Records</a></li>
            <li><a class="logout-button" href="login.php">Logout</a></li>
        </ul>
    </div>

</body>
</html>
