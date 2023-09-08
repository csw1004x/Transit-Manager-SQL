<?php
    class db {
        var $db_conn = NULL; // edit the login credentials in connectToDB()

        function connectToDB() {
            require_once __DIR__ . "/../configs/db.php";
            $this->db_conn = OCILogon($db_username, $db_password, $db_host);
            
            if (!$this->db_conn) {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
            }

            return $this->db_conn;
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            require_once __DIR__ . "/../configs/db.php";
            $statement = OCIParse($this->db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }
    
            $r = OCIExecute($statement);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }
    
            return $statement;
        }

        function Select($cmdstr) {
            require_once __DIR__ . "/../configs/db.php";
            $select_result = array();

            $stid = oci_parse($this->db_conn, $cmdstr);
            oci_execute($stid);
            
            while (($row = oci_fetch_assoc($stid)) != false) {
                array_push($select_result, $row);
            }
            
            oci_free_statement($stid);
            oci_close($this->db_conn);        
            
            return $select_result;
        }
    }
?>