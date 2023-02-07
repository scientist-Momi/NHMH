<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "nhmh_db";

// $hostname = "momiwebs.com.ng";
// $username = "momiwebscom_nhmaternity";
// $password = "GbPD)(xN[FGZ";
// $dbname = "momiwebscom_nhmh_db";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
