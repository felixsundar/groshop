<?php
$servername = "localhost";
$username = "codesrkm";
$password = "Arun@567!";
$dbname = "codesrkm_cocdb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    echo "Some Error Occured please try after sometime";
}

?> 