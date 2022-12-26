<?php

include('connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM todo WHERE id=$id";

$query = mysqli_query($conn, $sql);

if (!$query) {

?>
    <script>
        alert("Data not deleted");
    </script>
<?php
    header('location: index.php');
} else {
?>
    <script>
        alert("Data deleted Sucessfully");
    </script>
<?php
    header('location: index.php');
}

$conn->close();

?>