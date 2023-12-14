<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_id = $_POST['book_id'];

$sql = "DELETE FROM books WHERE id = '$book_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting book: " . $conn->error;
}

$conn->close();
?>
