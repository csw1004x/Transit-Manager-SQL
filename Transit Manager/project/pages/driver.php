<?php
    require "../class/menu_template.php";
    require "../class/driver.php";

    $driver = new Driver();

    $transit_system = $driver->getTransitSystemData();
    $insurance_coverage = $driver->getInsuranceCoverageData();
    $current_drivers = $driver->getAllDrivers();
    $tpl = new Template('../template');

    print $tpl->render('driver', array(
        "transit_system" => $transit_system,
        "insurance_coverage" => $insurance_coverage,
        "add_employee_message" => "Added employee with id " . $_GET["new_employee_id"],
        "current_drivers" => $current_drivers,
        "add_new_employee_id" => $_GET["new_employee_id"]
    ));
?>