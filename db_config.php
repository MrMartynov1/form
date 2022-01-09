<?php
    //WIP
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="mydatabase";
    $conn=mysqli_connect($servername, $username, $password, "$dbname");
        if(!$conn) {
            die('Could not connect to MySQL server:' .mysql_error());
        }
?>