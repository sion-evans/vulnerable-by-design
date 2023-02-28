<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $servername = "";
    $username = "";
    $password = "";
    $database = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ( ! $conn ) {
        die("MySQL Connection Error: " . mysqli_connect_error());
    }

    if ( isset($_POST['company']) and isset($_POST['contact']) and isset($_POST['country']) ) {

        $sql = "INSERT INTO companies (company, contact, country) VALUES ('" . mysqli_real_escape_string($conn, $_POST['company']) . "', '" . mysqli_real_escape_string($conn, $_POST['contact']) . "', '" . mysqli_real_escape_string($conn, $_POST['country']) . "')";

        if ( ! mysqli_query($conn, $sql) ) {
            die("MySQL Insert Error: " . mysqli_error($conn));
        }

    }

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
<h2>Company Information</h2>
<form method="POST">
<label for="company">Company:</label>
<input type="text" id="company" name="company">
<input type="text" id="contact" name="contact">
<input type="text" id="country" name="country">
<input type="submit" value="Insert">
</form>
<table>
<tr>
<th>Company</th>
<th>Contact</th>
<th>Country</th>
</tr>
<?php

    $sql = "SELECT company, contact, country FROM companies";
    $result = mysqli_query($conn, $sql);

    if  (mysqli_num_rows($result) > 0 ) {
        while ( $row = mysqli_fetch_assoc($result) ) {
            echo "<tr>" . PHP_EOL;
            echo "<td>" . $row["company"] . "</td>" . PHP_EOL;
            echo "<td>" . $row["contact"] . "</td>" . PHP_EOL;
            echo "<td>" . $row["country"] . "</td>" . PHP_EOL;
            echo "</tr>" . PHP_EOL;
        }
    }

?>
</table>
</body>
</html>
