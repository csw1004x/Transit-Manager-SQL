<?php
    print_r($_POST);

    require "../class/menu_template.php";
    require "../class/driver.php";

    $driver = new Driver();
    list($ts_city, $ts_name) = explode("/", $_POST["ts_city"]);
    list($license_class, $years_of_experience) = explode("/", $_POST["insurance_coverage"]);
    $new_employee_id = $driver->Add($ts_city, $ts_name, $_POST["date_employed"], $_POST["driver_name"], $license_class, $years_of_experience);

    $url = "../pages/driver.php?new_employee_id=" . $new_employee_id;
    header("Location: " . $url);
?>