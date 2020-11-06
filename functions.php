<?php
function start_server()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "sqlheroes";

    //create connection

    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($conn->connection) {
        die("Connection failed: " . $conn->connect_error);
    }

    // create_hero($conn);
    // modify_hero($conn);
    // delete_hero($conn);

    // echo "Connected successfully";
    return $conn;
}

function create_hero($name, $about, $bio)
{

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "sqlheroes";

    //create connection

    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($conn->connection) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO heroes (name, about_me, biography)
    VALUES ('$name', '$about', '$bio')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created";
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }

    return $conn;

    $conn->close();
}

function modify_hero($id, $name, $about, $bio)
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "sqlheroes";

    //create connection

    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($conn->connection) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE heroes SET name='$name', about_me='$about', biography='$bio' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

function delete_hero($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "sqlheroes";

    //create connection

    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($conn->connection) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM heroes WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}




function stop_server($conn)
{
    $conn->close();
}

function get_heroes()
{
    $conn = start_server();
    $data = $conn->query("SELECT * FROM heroes");
    stop_server($conn);
    return $data;
}
