<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<body>
<h2>Log Viewer</h2>
<form>
<label for="log_file">Log File:</label>
<select id="log_file" name="log_file">
<option value="access.log">Access.log</option>
<option value="error.log">Error.log</option>
</select>
<input type="submit" value="Submit">
</form>
<code>
<?php

    if ( isset($_GET['log_file']) ) {
        echo(file_get_contents('/var/log/nginx/' . $_GET['log_file']));
    }

?>
</code>
</table>
</body>
</html>
