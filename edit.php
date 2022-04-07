<?php
require_once 'src/functions.php';

// Make sure we have an ID set
if (isset($_GET['id'])) {
    // Load the driver based on the given ID
    $db = getDbCon();
    $driverArray = getDriver($db, $_GET['id']);
    // Convert the driver array into a Driver object
    $driver = hydrateDriver($db, $driverArray);

    // Check to see if the edit form as been submitted
    if (isset($_POST['name'])) {
        // The try catch block allows me to call these setter methods safely
        try {
            // Update the properties of the Driver Object
            $driver->setName($_POST['name']);
            $driver->setWins($_POST['wins']);
            $driver->setPoles($_POST['poles']);
            $driver->setImage($_POST['image']);
            // Call the update method to save any changes to the object to the
            // Database
            $driver->update();

            header('Location: index.php');
        } catch (Exception $error) {
            // This catch block only runs if an error triggered in the try block
            // If you look at the setters on the Driver message you'll notice they throw
            // a custom error if the data provided is invalid
            header('Location: index.php?error=' . $error->getMessage());
        }
    }

    ?>
    <h1>Edit driver</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $driver->getId(); ?>" />
        <label>Driver Name:
            <input type="text" name="name" minlength="5" max="55" value="<?php echo $driver->getName(); ?>" />
        </label>
        <label>Driver Wins:
            <input type="number" min="0" name="wins" value="<?php echo $driver->getWins(); ?>"/>
        </label>
        <label>Driver Poles:
            <input type="number" min="0" name="poles" value="<?php echo $driver->getPoles(); ?>" />
        </label>
        <label>Driver Image URL:
            <input type="url" name="image" value="<?php echo $driver->getImage(); ?>"/>
        </label>
        <input type="submit" />
    </form>


<?php



}

?>



