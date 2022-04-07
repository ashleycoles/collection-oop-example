<?php

require_once 'Driver.php';

/**
 * Get a PDO connection
 *
 * @return PDO
 */
function getDbCon(): PDO {
    $db = new PDO('mysql:host=db; dbname=ashcollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}


/**
 * Uses PDO to get every driver from the database
 *
 * @param PDO $db
 * @return array
 */
function getDrivers(PDO $db): array {
    $query = $db->prepare('SELECT `id`, `name`, `wins`, `poles`, `image` FROM `drivers`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * Uses PDO to get a single driver by ID
 *
 * @param PDO $db
 * @return array
 */
function getDriver(PDO $db, int $id): array {
    $query = $db->prepare('SELECT `id`, `name`, `wins`, `poles`, `image` FROM `drivers` WHERE `id` = :id;');
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch();
}

/**
 * Takes an array of driver arrays (for example the result
 * of a PDO fetchAll()) and converts them into Driver objects
 *
 * @param array $drivers
 * @return array
 * @throws Exception
 */
function hydrateDrivers(PDO $db, array $drivers): array {
    $driverObjects = [];

    foreach ($drivers as $driver) {
        $driverObjects[] = new Driver(
            $db,
            $driver['image'],
            $driver['name'],
            $driver['wins'],
            $driver['poles'],
            $driver['id']
        );
    }

    return $driverObjects;
}

/**
 * Takes driver arrays (for example the result
 * of a PDO fetch()) and converts into a Driver object
 *
 * @param PDO $db
 * @param array $driver
 * @return Driver
 * @throws Exception
 */
function hydrateDriver(PDO $db, array $driver): Driver {
    return new Driver(
            $db,
            $driver['image'],
            $driver['name'],
            $driver['wins'],
            $driver['poles'],
            $driver['id']
        );

}

/**
 * Generate HTML for an array of Driver objects
 *
 * @param Driver[] $drivers
 * @return string
 */
function displayDrivers(array $drivers): string {
    $output = '';
    foreach ($drivers as $driver) {
        $output .= "<ul class='driver'>";
        $output .= "<li>Name: " . $driver->getName() . "</li>";
        $output .= "<li>Wins: " . $driver->getWins() . "</li>";
        $output .= "<li>Poles: " . $driver->getPoles() . "</li>";
        $output .= "<a href='edit.php?id=" . $driver->getId() . "'>Edit</a>";
        $output .= "</ul>";
    }

    return $output;
}