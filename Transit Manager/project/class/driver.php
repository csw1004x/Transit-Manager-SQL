<?php
    require __DIR__ . "/db.php";

    class Driver {
        function Add($ts_city, $ts_name, $date_employed, $driver_name, $license_class, $years_of_experience) {
            //Create new db object holding all sql functions, generate random employee id
            //require_once __DIR__ . "/db.php";
            $db = new db();
            $db_conn = $db->connectToDB();
            $employee_id = $this->createEmployeeID();

            //Create insert statement and execute it
            $insert_employee_statement = "INSERT INTO driver3 (employee_id, 
            ts_city, 
            ts_name, 
            date_employed, 
            driver_name, 
            license_class, 
            years_of_experience) 
            VALUES ('%s', '%s', '%s', TO_DATE('%s', 'MMDDYY'), '%s', '%s', '%s')";

            $insert_query = sprintf($insert_employee_statement, $employee_id, $ts_city, $ts_name, $date_employed, $driver_name, $license_class, $years_of_experience);
            $insert_result = $db->executePlainSQL($insert_query);

            return $employee_id;
        }

        function AddInsuranceCoverage($license_class, $years_of_experience, $insurance_coverage) {
            //Create new db object holding all sql functions
            //require_once __DIR__ . "/db.php";
            $db = new db();
            $db_conn = $db->connectToDB();

            //Create insert statement and execute it
            $insert_insurance_statement = "INSERT INTO driver2 (license_class, 
            years_of_experience,
            insurance_coverage) 
            VALUES ('%s', '%s', '%s')";

            $insert_query = sprintf($insert_insurance_statement, $license_class, $years_of_experience, $insurance_coverage);
            $insert_result = $db->executePlainSQL($insert_query);

            return $insert_result;
        }

        function Update($employee_id, $update_values = array()) {
            //Begin update statement, create db object and connect to database
            //require_once __DIR__ . "/db.php";
            $db = new db();
            $db->connectToDB();
            $update_employee_statement = "UPDATE driver3 SET ";

            //Check for each attribute, add comma behind each entry
            if (array_key_exists("ts_city", $update_values)) {
                $update_employee_statement .= "ts_city = '" . $update_values["ts_city"] . "', ";
            }

            if (array_key_exists("ts_name", $update_values)) {
                $update_employee_statement .= "ts_name = '" . $update_values["ts_name"] . "', ";
            }

            if (array_key_exists("date_employed", $update_values)) {
                $update_employee_statement .= "date_employed = '" . $update_values["date_employed"] . "', ";
            }

            if (array_key_exists("driver_name", $update_values)) {
                $update_employee_statement .= "driver_name = '" . $update_values["driver_name"] . "', ";
            }

            if (array_key_exists("license_class", $update_values)) {
                $update_employee_statement .= "license_class = '" . $update_values["license_class"] . "', ";
            }

            if (array_key_exists("years_of_experience", $update_values)) {
                $update_employee_statement .= "years_of_experience = '" . $update_values["years_of_experience"] . "', ";
            }

            //At the end, trim the last comma, complete rest of update statement and execute the SQL statement.
            $update_employee_statement = rtrim($update_employee_statement, ", ");
            $update_employee_statement .= " WHERE employee_id = '" . $employee_id . "'";
            $update_result = $db->executePlainSQL($update_employee_statement);

            return $update_result;
        }

        function UpdateInsuranceCoverage($license_class, $years_of_experience, $update_values = array()) {
            //Begin update statement, create db object and connect to database
            //require_once __DIR__ . "/db.php";
            $db = new db();
            $db->connectToDB();
            $update_insurance_statement = "UPDATE driver2 SET ";

            //Check for each attribute, add comma behind each entry
            if (array_key_exists("insurance_coverage", $update_values)) {
                $update_insurance_statement .= "insurance_coverage = '" . $update_values["insurance_coverage"] . "'";
            }

            //Complete rest of update statement and execute the SQL statement.
            $update_insurance_statement .= " WHERE license_class = '" . $license_class . "' AND years_of_experience = '" . $years_of_experience . "'";
            $update_result = $db->executePlainSQL($update_insurance_statement);

            return $update_result;
        }

        function Find($find_by = array()) {
            //Start select statement
            //require_once __DIR__ . "/db.php";
            $select_statement = "SELECT * FROM driver3 WHERE ";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            //Check for each attribute, add AND behind each entry
            if (array_key_exists("employee_id", $find_by)) {
                $select_statement .= "employee_id = '" . $find_by["employee_id"] . "' AND ";
            }

            if (array_key_exists("ts_city", $find_by)) {
                $select_statement .= "ts_city = '" . $find_by["ts_city"] . "' AND ";
            }

            if (array_key_exists("ts_name", $find_by)) {
                $select_statement .= "ts_name = '" . $find_by["ts_name"] . "' AND ";
            }

            if (array_key_exists("date_employed", $find_by)) {
                $select_statement .= "date_employed = '" . $find_by["date_employed"] . "' AND ";
            }

            if (array_key_exists("driver_name", $find_by)) {
                $select_statement .= "driver_name = '" . $find_by["driver_name"] . "' AND ";
            }

            if (array_key_exists("license_class", $find_by)) {
                $select_statement .= "license_class = '" . $find_by["license_class"] . "' AND ";
            }

            if (array_key_exists("years_of_experience", $find_by)) {
                $select_statement .= "years_of_experience = '" . $find_by["years_of_experience"] . "' AND ";
            }

            //At the end, trim the last AND, complete rest of select statement and execute the SQL statement.
            $select_statement = rtrim($select_statement, " AND ");
            $select_result = $db->Select($select_statement);

            return $select_result;
        }

        function FindInsuranceCoverage($find_by = array()) {
            //Start select statement
            //require_once __DIR__ . "/db.php";
            $select_statement = "SELECT * FROM driver2 WHERE ";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            //Check for each attribute, add AND behind each entry
            if (array_key_exists("license_class", $find_by)) {
                $select_statement .= "license_class = '" . $find_by["license_class"] . "' AND ";
            }

            if (array_key_exists("years_of_experience", $find_by)) {
                $select_statement .= "years_of_experience = '" . $find_by["years_of_experience"] . "' AND ";
            }

            if (array_key_exists("insurance_coverage", $find_by)) {
                $select_statement .= "insurance_coverage = '" . $find_by["insurance_coverage"] . "' AND ";
            }

            //At the end, trim the last AND, complete rest of select statement and execute the SQL statement.
            $select_statement = rtrim($select_statement, " AND ");
            $select_result = $db->Select($select_statement);

            return $select_result;
        }

        function Remove($remove_by = array()) {
            //Start remove statement
            //require_once __DIR__ . "/db.php";
            $delete_statement = "DELETE FROM driver3 WHERE ";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            //Check for each attribute, add AND behind each entry
            if (array_key_exists("employee_id", $remove_by)) {
                $delete_statement .= "employee_id = '" . $remove_by["employee_id"] . "' AND ";
            }

            if (array_key_exists("ts_city", $remove_by)) {
                $delete_statement .= "ts_city = '" . $remove_by["ts_city"] . "' AND ";
            }

            if (array_key_exists("ts_name", $remove_by)) {
                $delete_statement .= "ts_name = '" . $remove_by["ts_name"] . "' AND ";
            }

            if (array_key_exists("date_employed", $remove_by)) {
                $delete_statement .= "date_employed = '" . $remove_by["date_employed"] . "' AND ";
            }

            if (array_key_exists("driver_name", $remove_by)) {
                $delete_statement .= "driver_name = '" . $remove_by["driver_name"] . "' AND ";
            }

            if (array_key_exists("license_class", $remove_by)) {
                $delete_statement .= "license_class = '" . $remove_by["license_class"] . "' AND ";
            }

            if (array_key_exists("years_of_experience", $remove_by)) {
                $delete_statement .= "years_of_experience = '" . $remove_by["years_of_experience"] . "' AND ";
            }

            //At the end, trim the last AND, complete rest of delete statement and execute the SQL statement.
            $delete_statement = rtrim($delete_statement, " AND ");
            $delete_result = $db->Select($delete_statement);

            return $delete_result;
        }

        function RemoveInsuranceCoverage($remove_by = array()) {
            //Start remove statement
            //require_once __DIR__ . "/db.php";
            $delete_statement = "DELETE FROM driver2 WHERE ";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            //Check for each attribute, add AND behind each entry
            if (array_key_exists("license_class", $remove_by)) {
                $delete_statement .= "license_class = '" . $remove_by["license_class"] . "' AND ";
            }

            if (array_key_exists("years_of_experience", $remove_by)) {
                $delete_statement .= "years_of_experience = '" . $remove_by["years_of_experience"] . "' AND ";
            }

            if (array_key_exists("insurance_coverage", $remove_by)) {
                $delete_statement .= "insurance_coverage = '" . $remove_by["insurance_coverage"] . "' AND ";
            }

            //At the end, trim the last AND, complete rest of delete statement and execute the SQL statement.
            $delete_statement = rtrim($delete_statement, " AND ");
            $delete_result = $db->Select($delete_statement);

            return $delete_result;
        }

        function RemoveAll() {
            //require_once __DIR__ . "/db.php";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            $delete_result = $db->Select("DELETE FROM driver3");
            return $delete_result;
        }

        function RemoveAllInsuranceCoverage() {
            //require_once __DIR__ . "/db.php";

            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            $delete_result = $db->Select("DELETE FROM driver2");
            return $delete_result;
        }

        function createEmployeeID($length = 10) {
            $id = "";

            //Generate employee id of length, default length is 10
            for ($i = 0; $i < $length; $i++) {
                if ($i % 2 == 0) {
                    //For even number places, add random ASCII value for lowercase characters
                    $id .= chr(rand(97, 122));
                } else {
                    //For odd number places, add random ASCII value for digits 0 to 9
                    $id .= chr(rand(48, 57));
                }
            }

            return $id;
        }

        function printFindResult($find_by = array()) {
            $arr = $this->Find($find_by);

            //Each value in arr is another array containing values, this prints all of them
            foreach ($arr as $val) {
                $item = $val;
        
                foreach ($item as $val2) {
                    echo $val2 . "<br>";
                }
            }
        }

        function getTransitSystemData() {
            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            $query = "SELECT * FROM transit_system ORDER BY ts_name";
            $result = $db->Select($query);

            return $result;
        }

        function getInsuranceCoverageData() {
            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            $query = "SELECT * FROM driver2 ORDER BY license_class, years_of_experience";
            $result = $db->Select($query);

            return $result;
        }

        function getAllDrivers() {
            //Create db object and connect to database
            $db = new db();
            $db->connectToDB();

            $query = "SELECT d3.employee_id,
            d3.ts_city, 
            d3.ts_name, 
            d3.date_employed, 
            d3.driver_name, 
            d3.license_class, 
            d3.years_of_experience,
            d2.insurance_coverage
            FROM driver3 d3, driver2 d2 
            WHERE d3.license_class = d2.license_class 
            AND d3.years_of_experience = d2.years_of_experience";
            $result = $db->Select($query);

            return $result;
        }
    }
?>
