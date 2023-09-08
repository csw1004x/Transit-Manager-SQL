<html>
    <head>
        <title>ROUTE MANAGER PAGE</title>
    </head>

    <body>

        <h1> Route Management </h1>

        <hr/>

        <h2>Find information about routes</h2>
        <form method="GET" action="route-manager.php"> <!--refresh page when submitted-->
        <input type="hidden" id="routeProjectionRequest" name="routeProjectionRequest">
        <label for="attributes">Choose one or more attributes (using ctrl or cmd):</label>
            <select id="attributes[]" name="attributes[]" multiple>
            <option value="route_name">Name</option>
            <option value="ts_city">City</option>
            <option value="ts_name">Transit System Name</option>
            <option value="start_station">Start Station</option>
            <option value="end_station">End Station</option>
            <option value="num_vehicles_running">Number of Vehicles Running</option>
            </select>
            <input type="submit" value="Submit" name = routeProjection></p>
        </form>

        <hr />

        <h2>Search for routes</h2>
        <form method="POST" action="route-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="searchRouteRequest" name="searchRouteRequest">
            <label for="values">Search by field:</label>
            <br /> <br />

            <select id="attribute" name="attribute">
            <option value="route_name">Name</option>
            <option value="ts_city">City</option>
            <option value="ts_name">Transit System Name</option>
            <option value="start_station">Start Station</option>
            <option value="end_station">End Station</option>
            <option value="num_vehicles_running">Number of Vehicles Running</option>
            </select>
            <br /> <br />

            Find by: <input type="text" name="searchValue"> 

            <input type="submit" value="Submit" name = "searchRequest"></p>
        </form>

        <hr />

        <h2>Group by routes</h2>
        <form method="GET" action="route-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="groupRequest" name="groupRequest">
            <label for="values">Choose aggregate function you would like to use:</label>
            <br /> <br />

            <select id="option" name="option">
            <option value="count">Count number of routes</option>
            <option value="average">Average number of vehicles running</option>
            <option value="max">Max number of vehicles running</option>
            <option value="min">Min number of vehicles running</option>
            <option value="sum">Total number of vehicles running</option>
            </select>

            <br /> <br />

            <label for="values">Group by:</label>

            <br /> <br />

            <select id="group" name="group">
            <option value="ts_city">City</option>
            <option value="ts_name">Transit System Name</option>
            <option value="start_station">Start Station</option>
            <option value="end_station">End Station</option>
            </select>

            <input type="submit" value="Submit" name = "groupRequest"></p>
        </form>

        <hr />

	<h2>Find all routes that go to every stop in vancouver</h2>
        <form method="GET" action="route-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="divisionRequest" name="divisionRequest">

            <input type="submit" value="Submit" name = "divisionRequest"></p>
        </form>

        <hr />
    

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

        function printResult($header, $result) { //prints results from a select statement
            echo "<br>Retrieving data from the database:<br>";
            echo "<table>";
            echo $header;

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                $output = "<tr>";

                $count = 0;
                foreach($row as $attr) {
                    $output .= "<td>" . $row[$count]. "</td>";
                    $count++;
                }

                $output .= "</tr>";
                echo $output;
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

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insNo'],
                ":bind2" => $_POST['insName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into transit_system values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleRouteProjectionRequest() {
            global $db_conn;

            $selection = "";
            $header = "<tr>";

            foreach ($_GET['attributes'] as $a)
            {
                $selection .= $a;
                $selection .= ", ";
                $header .= "<th>" . $a . "</th>";
            }
            
            $header .= "</tr>";
            
            $result = executePlainSQL("SELECT ". substr($selection, 0, -2) ." FROM route3");

            printResult($header, $result);

        }

        function handleSearchRouteRequest() {
            global $db_conn;

            $search_condition = "";

            $selection = "route_name, ts_city, ts_name, start_station, end_station, num_vehicles_running";
            $header = "<tr> <th> route_name </th>
            <th> ts_city </th>
            <th> ts_name </th>
            <th> start_station </th>
            <th> end_station </th>
            <th> num_vehicles_running </th> </tr>";
            
            $sql_query = "SELECT * FROM route3 WHERE " . $_POST['attribute'] . "= '" . $_POST["searchValue"] . "'";
            $result = executePlainSQL($sql_query);

            printResult($header, $result);
        }

        function handleGroupRequest() {
            global $db_conn;

            $header = "<tr>";
            $group_condition = "SELECT ";
            $header = "<tr> <th> ";

            switch ($_GET['group']) {
                
                case "ts_city":
                    $group_condition .= "ts_city, %s FROM route3 GROUP BY ts_city";
                    $header .= " ts_city </th> <th> ";
                    break;

                case "ts_name":
                    $group_condition .= "ts_name, %s FROM route3 GROUP BY ts_name";
                    $header .= " ts_name </th> <th> ";
                    break;

                case "start_station":
                    $group_condition .= "start_station, %s FROM route3 GROUP BY start_station";
                    $header .= " start_station </th> <th> ";
                    break;

                case "end_station":
                    $group_condition .= "end_station, %s FROM route3 GROUP BY end_station";
                    $header .= " end_station </th> <th> ";
                    break;
            }

            switch ($_GET['option']) {
                case "count":
                    $group_condition = sprintf($group_condition, "COUNT(*)");
                    $header .= " num_routes ";
                    break;
                
                case "average":
                    $group_condition = sprintf($group_condition, "AVG(num_vehicles_running)");
                    $header .= " avg_num_vehicles_running ";
                    break;

                case "max":
                    $group_condition = sprintf($group_condition, "MAX(num_vehicles_running)");
                    $header .= " max_num_vehicles_running ";
                    break;

                case "min":
                    $group_condition = sprintf($group_condition, "MIN(num_vehicles_running)");
                    $header .= " min_num_vehicles_running ";
                    break;

                case "sum":
                    $group_condition = sprintf($group_condition, "SUM(num_vehicles_running)");
                    $header .= " total_num_vehicles_running ";
                    break;
            }

            $header .= " </th> </tr>";
            $result = executePlainSQL($group_condition);

            printResult($header, $result);
        }

        function handleDivisionRequest() {
            global $db_conn;

            $query = "SELECT route_name FROM route3 r WHERE NOT EXISTS ((SELECT s.stop_name FROM stops s) MINUS (SELECT g.stop_name FROM goes_through g WHERE g.route_name = r.route_name))";
            $header = "<tr> <th> route_name </th> </tr>";

            $result = executePlainSQL($query);
            printResult($header, $result);
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('searchRouteRequest', $_POST)) {
                    handleSearchRouteRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('routeProjection', $_GET)) {
                    handleRouteProjectionRequest();
                } else if (array_key_exists('groupRequest', $_GET)) {
                    handleGroupRequest();
                } else if (array_key_exists('divisionRequest', $_GET)) {
                    handleDivisionRequest();
                } 

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['searchRequest'])) {
            handlePOSTRequest();
        } else if (isset($_GET['routeProjectionRequest']) || 
        isset($_GET['groupRequest']) ||
        isset($_GET['divisionRequest'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
