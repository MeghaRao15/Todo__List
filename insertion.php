<?php
 include 'connection.php';
if (isset($_POST['add'])) {

    $activity = $_POST['txtActivity'];
    $date =  date('Y-m-d', strtotime($_POST['txtdate']));

    $sql = "INSERT INTO  `todo` (`activity`, `date`) VALUES ('$activity', '$date')";
    // print_r($sql); exit;

    $query = mysqli_query($conn, $sql);
    if ($query) 
    {
        header('location: index.php');
    } else 
    {
        header('location: index.php');
    }
}
?>