<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    $servername = "localhost";
    $username = "root";
    $password = "0586274393142857";
    $dbname = "blood_donor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn -> connect_error) { 
        die("Connection failed: " . $conn -> connect_error); 
    }
 
    // Check connection
    if ($conn -> connect_error) { 
        die("Connection failed: " . $conn -> connect_error); 
    }
 
    // Escape user inputs for security
    $full_name = $conn->real_escape_string($_REQUEST['full-name']);
    $blood_group = $conn->real_escape_string($_REQUEST['blood-group']);
    $email = $conn->real_escape_string($_REQUEST['email']);
    $phone = $conn->real_escape_string($_REQUEST['phone']);
    $address = $conn->real_escape_string($_REQUEST['address']);
 
    // Attempt insert query execution
    $sql = "INSERT INTO donor (full_name, blood_group, email, phone, address) VALUES ('$full_name', '$blood_group', '$email', '$phone', '$address')";
    if($conn->query($sql) === true){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    // Close connection
    $conn->close();
?>