<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<body>
<h2>Profile Viewer</h2>
<form>
<label for="first_name">First Name:</label>
<input type="text" id="first_name" name="first_name" value="<?php if ( isset($_GET['first_name']) ) echo htmlentities($_GET['first_name']) ?>">
<label for="last_name">Last Name:</label>
<input type="text" id="last_name" name="last_name" value="<?php if ( isset($_GET['last_name']) ) echo htmlentities($_GET['last_name']) ?>">
<input type="submit" value="Submit">
</form>
<?php

    if ( isset($_GET['first_name']) ) {
        echo "<h4>First Name: " . $_GET['first_name'] . '</h4>' . PHP_EOL;
    }

    if ( isset($_GET['last_name']) ) {
        echo "<h4>Last Name: " . $_GET['last_name'] . '</h4>' . PHP_EOL;
    }

?>
</body>
</html>
