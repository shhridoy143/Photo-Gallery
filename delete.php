<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    $sql = "SELECT image_path FROM photos WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        unlink($row['image_path']);  // Remove the file from the server

        $sql = "DELETE FROM photos WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "File deleted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
