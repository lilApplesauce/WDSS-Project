<?php
/**
 * Configuration for database connection
 *
 */
$host = "localhost";
$username = "root";
$password = "root"; //make sure to change to "root" or "" .
$database = "g2gwebsite";
$dsn = "mysql:host=$host;dbname=$database";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);