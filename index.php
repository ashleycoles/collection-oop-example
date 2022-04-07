<?php

require_once 'src/functions.php';

// Get a database connection
$db = getDbCon();
// Get the usual indexed array of assoc arrays
$driversResult = getDrivers($db);
// Convert the normal PDO result into an array of Driver objects
$drivers = hydrateDrivers($db, $driversResult);

if (isset($_GET['error'])) {
    echo $_GET['error'];
}

echo displayDrivers($drivers);

?>




