<html>
    <head>
        <title>TRANSIT SYSTEM MANAGEMENT</title>
    </head>

    <body>
        <h1>TRANSIT SYSTEM MANAGEMENT</h1>

        <hr />

        <h1>Transit Systems</h1>

        


        <h2>Insert Values into Transit System</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertTSQueryRequest" name="insertTSQueryRequest">
            City: <input type="text" name="insCity"> <br /><br />
            Name: <input type="text" name="insTSName"> <br /><br />

            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>

        <hr />


        <h2>Delete Transit System</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            City: <input type="text" name="delete_ts_city"> <br /><br />
            Name: <input type="text" name="delete_ts_name"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Update Name in Transit System</h2>

        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Old Name: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />

            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr />

        <h1>Manager Management</h1>


        <h2>Add New Manager</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Manager ID: <input type="text" name="manager_id"> <br /><br />
            Password: <input type="text" name="manager_password"> <br /><br />
            First Name: <input type="text" name="first_name"> <br /><br />
            Last Name: <input type="text" name="last_name"> <br /><br />
            Date Employed: <input type="text" name="manager_password"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>


        <h2>Delete Manager</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Manager ID: <input type="text" name="manager_id_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Manager</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Manager ID: <input type="text" name="manager_id"> <br /><br />
            New Password: <input type="text" name="new_manager_password"> <br /><br />
            New First Name: <input type="text" name="new_first_name"> <br /><br />
            New Last Name: <input type="text" name="new_last_name"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <h2>Find Manager</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Manager ID: <input type="text" name="manager_id"> <br /><br />

            <input type="submit" value="Find" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Tickets Management</h1>

        <h2>Add New Ticket</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Ticket ID: <input type="text" name="ticket_id"> <br /><br />
            Zone: <input type="text" name="zone"> <br /><br />
            Pass Type: <input type="text" name="pass_type"> <br /><br />
            Price: <input type="text" name="price"> <br /><br />
            Expiry Date: <input type="text" name="expiry_date_time"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>


        <h2>Delete Ticket</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Ticket ID: <input type="text" name="ticket_id_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Ticket</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Ticket ID: <input type="text" name="ticket_id"> <br /><br />
            New Zone: <input type="text" name="new_zone"> <br /><br />
            New Pass Type: <input type="text" name="new_pass_type"> <br /><br />
            New Price: <input type="text" name="new_price"> <br /><br />
            New Expiry Date: <input type="text" name="new_expiry_date_time"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Route Management</h1>

        <h2>Add New Route</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Route Name: <input type="text" name="route_name"> <br /><br />
            Start Station: <input type="text" name="start_station"> <br /><br />
            End Station: <input type="text" name="end_station"> <br /><br />
            # of Vehicles Running: <input type="text" name="num_vehicles"> <br /><br />
            Route Length: <input type="text" name="route_length"> <br /><br />
            Vehicle Intervals: <input type="text" name="vehicle_interval"> <br /><br />
            Transit City: <input type="text" name="ts_city"> <br /><br />
            Transit Name: <input type="text" name="ts_name"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Route</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Route Name: <input type="text" name="route_name_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Route</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Route Name: <input type="text" name="route_name"> <br /><br />
            New Start Station: <input type="text" name="new_start_station"> <br /><br />
            New End Station: <input type="text" name="new_end_station"> <br /><br />
            New # of Vehicles Running: <input type="text" name="new_num_vehicles"> <br /><br />
            New Route Length: <input type="text" name="new_route_length"> <br /><br />
            New Vehicle Intervals: <input type="text" name="new_vehicle_interval"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Stops Management</h1>

        <h2>Add New Stop</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Stop Name: <input type="text" name="stop_name"> <br /><br />
            Text Code: <input type="text" name="text_code"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Stop</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Stop Name: <input type="text" name="stop_name_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Route</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Stop Name: <input type="text" name="stop_name"> <br /><br />
            New Text Code: <input type="text" name="new_text_code"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Vehicle Management</h1>

        <h2>Add New Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Serial Number: <input type="text" name="serial_num"> <br /><br />
            Year Produced: <input type="text" name="production_year"> <br /><br />
            Number of Seats: <input type="text" name="num_of_seat"> <br /><br />
            Passenger Capacity: <input type="text" name="passenger_cap"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Serial Number: <input type="text" name="serial_num_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Serial Number: <input type="text" name="serial_num"> <br /><br />
            New Number of Seats: <input type="text" name="new_num_of_seat"> <br /><br />
            New Passenger Capacity: <input type="text" name="new_passenger_cap"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />  

        <h1>Subway Management</h1>

        <h2>Add New Subway</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Subway Serial Number: <input type="text" name="subway_serial_num"> <br /><br />
            Train Type: <input type="text" name="subway_type"> <br /><br />
            Number of Carts: <input type="text" name="num_of_carts"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Subway Serial Number: <input type="text" name="subway_serial_num_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Subway Serial Number: <input type="text" name="subway_serial_num"> <br /><br />
            New Number of Carts: <input type="text" name="new_num_of_carts"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Bus Management</h1>

        <h2>Add New Bus</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Bus Serial Number: <input type="text" name="bus_serial_num"> <br /><br />
            Bus Type: <input type="text" name="bus_type"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Vehicle</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Bus Serial Number: <input type="text" name="bus_serial_num_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Driver Management</h1>

        <h2>Add New Driver</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="driver_id"> <br /><br />
            Date Employeed: <input type="text" name="driver_employeed"> <br /><br />
            Name: <input type="text" name="driver_name"> <br /><br />
            Transit City: <input type="text" name="driver_ts_city"> <br /><br />
            Transit Name: <input type="text" name="driver_ts_name"> <br /><br />
            Salary: <input type="text" name="driver_salary"> <br /><br />
            License Class: <input type="text" name="driver_license"> <br /><br />
            Years of Experience: <input type="text" name="driver_experience"> <br /><br />
            Insurance Coverage: <input type="text" name="driver_insurance"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Driver</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="driver_id_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Driver</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="driver_id_to_delete"> <br /><br />
            New Name: <input type="text" name="driver_name_to_delete"> <br /><br />
            New Transit City: <input type="text" name="driver_ts_city_to_delete"> <br /><br />
            New Transit Name: <input type="text" name="driver_ts_name_to_delete"> <br /><br />
            New Salary: <input type="text" name="driver_salary_to_delete"> <br /><br />
            New License Class: <input type="text" name="driver_license_to_delete"> <br /><br />
            New Years of Experience: <input type="text" name="driver_experience"> <br /><br />
            New Insurance Coverage: <input type="text" name="new_driver_insurance"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Operator Management</h1>

        <h2>Add New Operator</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="operator_id"> <br /><br />
            Date Employeed: <input type="text" name="operator_employeed"> <br /><br />
            Name: <input type="text" name="operator_name"> <br /><br />
            Transit City: <input type="text" name="operator_ts_city"> <br /><br />
            Transit Name: <input type="text" name="operator_ts_name"> <br /><br />
            Salary: <input type="text" name="operator_salary"> <br /><br />
            Control Room ID: <input type="text" name="operator_room_id"> <br /><br />
            Years of Experience: <input type="text" name="operator_experience"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Operator</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="operator_id_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Operator</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Employee ID: <input type="text" name="operator_id"> <br /><br />
            New Name: <input type="text" name="new_operator_name"> <br /><br />
            New Transit City: <input type="text" name="new_operator_ts_city"> <br /><br />
            New Transit Name: <input type="text" name="new_operator_ts_name"> <br /><br />
            New Salary: <input type="text" name="new_operator_salary"> <br /><br />
            New Control Room ID: <input type="text" name="new_operator_room_id"> <br /><br />
            New Years of Experience: <input type="text" name="new_operator_experience"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Bus Card Management</h1>

        <h2>Add New Bus Card</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Card Number: <input type="text" name="card_number"> <br /><br />
            Balance: <input type="text" name="balance"> <br /><br />
            Type: <input type="text" name="type"> <br /><br />
            Transit Account #: <input type="text" name="transit_acc_num"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Bus Card</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Card Number: <input type="text" name="card_number_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Bus Card</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Card Number: <input type="text" name="card_number"> <br /><br />
            New Balance: <input type="text" name="new_balance"> <br /><br />
            New Type: <input type="text" name="new_type"> <br /><br />
            New Transit Account #: <input type="text" name="new_transit_acc_num"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Transit Account Management</h1>

        <h2>Add New Transit Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Account Number: <input type="text" name="account_number"> <br /><br />
            Address: <input type="text" name="address"> <br /><br />
            Phone Number: <input type="text" name="phone_num"> <br /><br />
            Email: <input type="text" name="email"> <br /><br />
            Name: <input type="text" name="name"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Transit Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Account Number: <input type="text" name="account_number_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Transit Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Account Number: <input type="text" name="account_number"> <br /><br />
            New Address: <input type="text" name="new_address"> <br /><br />
            New Phone Number: <input type="text" name="new_phone_num"> <br /><br />
            New Email: <input type="text" name="new_email"> <br /><br />
            New Name: <input type="text" name="new_name"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>

        <hr />

        <h1>Student Account Management</h1>

        <h2>Add New Student Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Card Number: <input type="text" name="bus_card_number"> <br /><br />
            Student ID: <input type="text" name="studentID"> <br /><br />
            Institution: <input type="text" name="institution"> <br /><br />

            <input type="submit" value="Insert" name="insert_submit"></p>
        </form>

        <h2>Delete Student Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Card Number: <input type="text" name="bus_card_number_to_delete"> <br /><br />
            Student ID: <input type="text" name="studentID_to_delete"> <br /><br />
            Institution: <input type="text" name="institution_to_delete"> <br /><br />

            <input type="submit" value="Delete" name="insert_submit"></p>
        </form>

        <h2>Update Student Account</h2>
        <form method="POST" action="employee.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Student ID: <input type="text" name="studentID"> <br /><br />
            Institution: <input type="text" name="institution"> <br /><br />
            New Card Number: <input type="text" name="new_bus_card_number"> <br /><br />

            <input type="submit" value="Update" name="insert_submit"></p>
        </form>


        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table demoTable:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_ktran003", "a83520726", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                echo "Successfully connected to Oracle.\n";
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleUpdateRequest() {
            global $db_conn;

            $old_name = $_POST['oldName'];
            $new_name = $_POST['newName'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE demoTable");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
            OCICommit($db_conn);
        }

        function handleInsertTSRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insCity'],
                ":bind2" => $_POST['insTSName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into transit_system values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM demoTable");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
            }
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertTSQueryRequest', $_POST)) {
                    handleInsertTSRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
