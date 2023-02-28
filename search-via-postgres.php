<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
<style>
    table, th, td {
        border: 1px solid black;
        margin-top: 20px;
        padding: 4px;
    }
</style>
<body>
<h2>Company Search via PostgreSQL</h2>
<form>
<label for="company">Company:</label>
<input type="text" id="company" name="company">
<input type="submit" value="Submit">
</form>
<table>
<tr>
<th>Company</th>
<th>Contact</th>
<th>Country</th>
</tr>
<?php

    if ( isset($_GET['company']) ) {

        $dbname = '';
        $dbuser = '';
        $dbpass = '';
        $host = '';
        $port = '';

        $conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass");

        $sql = "SELECT company, contact, country FROM companies WHERE company LIKE '%" . $_GET['company'] . "%'";
        $result = pg_query($conn, $sql);

        while ( $row = pg_fetch_row($result) ) {
            echo "<tr>" . PHP_EOL;
            echo "<td>" . htmlentities($row[0]) . "</td>" . PHP_EOL;
            echo "<td>" . htmlentities($row[1]) . "</td>" . PHP_EOL;
            echo "<td>" . htmlentities($row[2]) . "</td>" . PHP_EOL;
            echo "</tr>" . PHP_EOL;
        }

        pg_close($conn);

    }

?>
</table>
</body>
</html>
