<!DOCTYPE html>
<html>

<head>
    <title>Manage Laundry | Sparkle Spins Laundry Service</title>
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

        h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
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

    <h2>Manage Laundry</h2>

    <div class="container">
        <button class="button" onclick="window.location.href='createlaundrytask.php'">Create a Laundry Task</button>
        <button class="button" onclick="window.location.href='updatestatustask.php'">Update the Status of a Task</button>
        <button class="back-button" onclick="window.location.href='welcomeadmin.php'">Back to Admin Page</button>
    </div>

</body>

</html>