<?php
//these are the server details
//the username is root by default in case of xampp
//password is nothing by default
$servername = "localhost";
$username = "root";
$password = "";
$database = "memphis_admission_sys";
 
 
//creating a new connection object using mysqli 
$conn = new mysqli($servername, $username, $password, $database);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}