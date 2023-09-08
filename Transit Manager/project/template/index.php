<html>
    <head>
        <title>Translink Management System</title>
    </head>

    <!-- Create button class for this page -->
    <style>
        .button {
            background-color: black;
            color: aliceblue;
            text-align: center;
            padding: 10px 10px;
            font-size: 16px;
            max-width: 20em;
        }
    </style>

    <body>
        <!-- Display welcome message -->
        <h1>Welcome to Translink Management System!</h1>
        <p>What would you like to do?</p>

        <!-- Redirect to employee management page -->
        <div class="button" onclick="window.location.href = 'template/employee.php'">
            MANAGE EMPLOYEES
        </div>
	</body>
</html>