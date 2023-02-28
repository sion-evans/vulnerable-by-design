<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<body>
<h2>Ping Tool</h2>
<form>
<label for="host">Host:</label>
<input type="text" id="host" name="host" value="<?php if ( isset($_GET['host']) ) echo htmlentities($_GET['host']) ?>">
<input type="submit" value="Submit">
</form>
<?php

    if ( isset($_GET['host']) ) {
        echo "<pre>" . shell_exec('ping -c 1 ' . $_GET['host']) . "</pre>";
    }

?>
</body>
</html>
