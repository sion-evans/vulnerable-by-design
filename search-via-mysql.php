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
<h2>Company Search via MySQL</h2>
<form>
<label for="company">Company:</label>
<input type="text" id="company" name="company"><br><br>
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

        $servername = "";
        $username = "";
        $password = "";
        $database = "";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if ( ! $conn ) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT company, contact, country FROM companies WHERE company LIKE '%" . $_GET['company'] . "%'";
        $result = mysqli_query($conn, $sql);

        if  (mysqli_num_rows($result) > 0 ) {
            while ( $row = mysqli_fetch_assoc($result) ) {
                echo "<tr>" . PHP_EOL;
                echo "<td>" . htmlentities($row["company"]) . "</td>" . PHP_EOL;
                echo "<td>" . htmlentities($row["contact"]) . "</td>" . PHP_EOL;
                echo "<td>" . htmlentities($row["country"]) . "</td>" . PHP_EOL;
                echo "</tr>" . PHP_EOL;
            }
        }

        mysqli_close($conn);

    }

?>
</table>
</body>
</html>
