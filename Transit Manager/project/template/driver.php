<html>
    <head>
        <title>DRIVER MANAGER PAGE</title>
    </head>

    <body>

        <h1> Driver Management </h1>

        <hr/>

        <h2>Add New Driver</h2>
        <p>To add new driver, unique driver id will be assigned automatically</p>

        <form method="POST" action="../action/create_new_driver.php"> <!--refresh page when submitted-->
            Transit System: <select name="ts_city">
                <?php foreach ($transit_system as $transit_system_item) {?> 
                <option value="<?php echo $transit_system_item["TS_CITY"] . "/" . $transit_system_item["TS_NAME"]?>"><?php echo $transit_system_item["TS_CITY"] . "/" . $transit_system_item["TS_NAME"]?></option>
                <?php } ?>
            </select>

            <br /> <br />

            Date Employed ('MMDDYY'): <input type="text" name="date_employed">

            <br /> <br />

            Name (First, Last): <input type="text" name="driver_name">

            <br /> <br />

            License Class/Years of Experience: <select name="insurance_coverage">
                <?php foreach ($insurance_coverage as $insurance_coverage_item) {?> 
                <option value="<?php echo $insurance_coverage_item["LICENSE_CLASS"] . "/" . $insurance_coverage_item["YEARS_OF_EXPERIENCE"]?>"><?php echo $insurance_coverage_item["LICENSE_CLASS"] . "/" . $insurance_coverage_item["YEARS_OF_EXPERIENCE"]?></option>
                <?php } ?>
            </select>

            <br /> <br />

            <input type="submit" value="Add Driver" name="addSubmit"></p>
        </form>

        <?php if ($add_new_employee_id != "") { ?>
            <span style="color:red;"><?php echo $add_employee_message?></span>
        <?php } ?>

        <hr />

        <h2>All existing drivers</h2>
        <table>
            <tr>
                <?php foreach ($current_drivers[0] as $key => $val) {?>
                <th><?php echo $key ?></th>
                <?php }?>
            </tr>

            <?php foreach ($current_drivers as $driver_info) { ?>
                <tr>
                    <td><?php echo $driver_info["EMPLOYEE_ID"]?></td>
                    <td><?php echo $driver_info["TS_CITY"]?></td>
                    <td><?php echo $driver_info["TS_NAME"]?></td>
                    <td><?php echo $driver_info["DATE_EMPLOYED"]?></td>
                    <td><?php echo $driver_info["DRIVER_NAME"]?></td>
                    <td><?php echo $driver_info["LICENSE_CLASS"]?></td>
                    <td><?php echo $driver_info["YEARS_OF_EXPERIENCE"]?></td>
                    <td><?php echo $driver_info["INSURANCE_COVERAGE"]?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>