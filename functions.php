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

    //    create_hero($conn);
    // modify_hero($conn);
    // delete_hero($conn);

    // echo "Connected successfully";
    return $conn;
}

function create_hero($conn)
{
    $sql = "INSERT INTO heroes (id, name, about_me, biography)
    VALUES ('8', 'Pam', 'She likes art', 'Mixed berry yogurt is her favorite')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created";
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }
}

function modify_hero($conn)
{
    $sql = "UPDATE heroes SET about_me='Dwigt' WHERE id='8'";
    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function delete_hero($conn)
{
    $sql = "DELETE FROM heroes WHERE id='8'";
    if ($conn->query($sql) === TRUE) {
        // echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
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
