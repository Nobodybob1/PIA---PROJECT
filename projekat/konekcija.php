<?php
  function openCon() {
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbName = "podaci";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbName);
    return $conn;
  }

  //Close connection
  function CloseCon($conn) {
    $conn -> close();
  }

?>