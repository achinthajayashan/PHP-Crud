<?php
global $conn;
include '../db/dbconnection.php';

// Create
if(isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO User (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {

        header("Location: ../index.php");
        echo "<script>alert('Record created successfully');</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//// Read
//$sql = "SELECT * FROM users";
//$result = $conn->query($sql);

// Update
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE User SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM User WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        echo "<script>alert('Record deleted successfully');</script>";
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
