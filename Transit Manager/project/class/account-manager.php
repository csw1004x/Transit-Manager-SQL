 <html>
    <head>
    <title>Account Manager Page</title>
    </head>

    <body>

        <h1>Account Management</h1>
        <hr />

        <h2>Create new transit account</h2>
        <form method="POST" action="account-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertTransitAccountQueryRequest" name="insertTransitAccountQueryRequest">
            Account Number: <input type="text" name="accountNum"> <br /><br />
            Address: <input type="text" name="address"> <br /><br />
            Phone Number: <input type="text" name="phoneNum"> <br /><br />
            Email: <input type="text" name="email"> <br /><br />
            Name: <input type="text" name="name"> <br /><br />
            TSCity: <input type="text" name="TSCity"> <br /><br />
            TSName: <input type="text" name="TSName"> <br /><br />
            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>

        <h2>Delete a transit account</h2>
        <form method="POST" action="account-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
            Account Number: <input type="text" name="accountNumToDelete"> <br /><br />
            <input type="submit" value="Delete" name="deleteSubmit"></p>
        </form>

        <h2>Update balance on your transit card</h2>

        <form method="POST" action="account-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Card Number: <input type="text" name="cardNumber"> <br /><br />
            New Balance: <input type="text" name="newValue"> <br /><br />

            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <h2>Find all current student linked cards</h2>
        <form method="GET" action="account-manager.php"> <!--refresh page when submitted-->
        <input type="hidden" id="searchQueryRequest" name="searchQueryRequest">
            Card Balance Greater Than: <input type="text" name="greaterCmpr"> <br /><br />
            <input type="submit" value="Submit" name="searchSubmit"></p>
        </form>

        <h2>Find the maximum balance from all current transit accounts grouped by account type, specifying which Transit City to look into</h2>
        <form method="GET" action="account-manager.php"> <!--refresh page when submitted-->
        <input type="hidden" id="nestedGroupByRequest" name="nestedGroupByRequest">
            Transit City: <input type="text" name="transitCityLook"> <br /><br />
            <input type="submit" value="Search" name="nestedGroupByQuery"></p>
        </form>

        <hr />

	<h2>Find what transit accounts are linked to all card types</h2>
        <form method="GET" action="account-manager.php"> <!--refresh page when submitted-->
            <input type="hidden" id="divisionRequest" name="divisionRequest">

            <input type="submit" value="Find Card Types" name = "divisionRequest"></p>
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
                //echo  $row[0];
                // echo  $row[1];
               // echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
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

            $cardNumber = $_POST['cardNumber'];
            $newValue = $_POST['newValue'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE bus_card SET balance='" . $newValue . "' WHERE card_number='" . $cardNumber . "'");
            OCICommit($db_conn);
        }

        function handleDeleteRequest() {
            global $db_conn;

            $accNum = $_POST['accountNumToDelete'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("DELETE FROM transit_account WHERE account_number ='" . $accNum . "'");
            OCICommit($db_conn);
        }

        function handleSearchWithJoin() {
            global $db_conn;

            $balNum = $_GET['greaterCmpr'];

            $header = "<tr><th>Card Number</th><th>Account Number</th><th>Student Number</th><th>Insitution</th><th>Balance</th></tr>";

            $sql_query = "SELECT b.card_number, t.account_number, o.student_num, o.institution, b.balance FROM transit_account t, bus_card b, offers o WHERE o.card_number = t.account_number AND t.account_number = b.transit_account_num AND b.balance > $balNum";

            $result = executePlainSQL($sql_query);

            printResult($header, $result);
        }

        function handleNestedGroupBy(){
            global $db_conn;

            $header = "<tr><th>Card Type</th><th>Max Value</th></tr>";
            $tCity = $_GET['transitCityLook'];
            

            $sql_query = "SELECT b.card_type, MAX(b.balance) FROM bus_card b WHERE b.transit_account_num 
            IN ( SELECT t.account_number FROM transit_account t WHERE t.ts_city = '" . $tCity . "') GROUP BY b.card_type";

            $result = executePlainSQL($sql_query);
            
            printResult($header, $result);
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


        function handleInsertTransitAccountQueryRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table

            $tuple = array (
                ":bind1" => $_POST['accountNum'],
                ":bind2" => $_POST['address'],
                ":bind3" => $_POST['phoneNum'],
                ":bind4" => $_POST['email'],
                ":bind5" => $_POST['name'],
                ":bind6" => $_POST['TSCity'],
                ":bind7" => $_POST['TSName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into transit_account values (:bind1, :bind2, :bind3, :bind4, :bind5, :bind6, :bind7)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM demoTable");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
            }
        }

	function handleCardDivisionRequest() {
            global $db_conn;

            $query = "SELECT DISTINCT c.transit_account_num FROM bus_card c
            WHERE NOT EXISTS 
            ((SELECT DISTINCT c1.card_type FROM bus_card c1)
            MINUS
            (SELECT c2.card_type FROM bus_card c2
            WHERE c2.transit_account_num = c.transit_account_num))";

            $header = "<tr> <th> transit_account_num </th> </tr>";

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
                } else if (array_key_exists('insertTransitAccountQueryRequest', $_POST)) {
                    handleInsertTransitAccountQueryRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                } 
                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if(array_key_exists('searchQueryRequest', $_GET)) {
                    handleSearchWithJoin();
                } else if(array_key_exists('nestedGroupByQuery', $_GET)){
                    handleNestedGroupBy();
                } else if (array_key_exists('divisionRequest', $_GET)) {
                    handleCardDivisionRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) 
            || isset($_POST['deleteSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['nestedGroupByRequest']) || isset($_GET['searchQueryRequest']) || isset($_GET['divisionRequest'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
