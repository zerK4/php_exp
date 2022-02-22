<?php
//start session
session_start();
//connect to database
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
//check when save button is pressed to insert data into database
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $device = $_POST['device'];
    $location = $_POST['location'];
    $street_number = $_POST['street_number'];
//insert data into database
    $mysqli->query(("INSERT INTO new_data (name, device, location, street_number) VALUES('$name', '$device', '$location', '$street_number')")) or die($mysqli->error);
//get to homepage once save is pressed
    header("location: index.php");
}
//condition if Delete button is pressed
if(isset($_GET['delete'])){
    //ge the delete button
    $id = $_GET['delete'];
    //communicate with database to delete the fields
    $mysqli->query("DELETE FROM new_data WHERE id=$id") or die($mysqli->error);
    //get back to home once delete is clicked.
    header("location: index.php");
}

?>