<?php
/**
 * Include this to connect. Change the dbname to match your database,
 * and make sure your login information is correct after you upload 
 * to csunix or your app will stop working.
 * 
 * Author: Mohamad albazeai
 */
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=DatabaseName",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}


?>