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
$title = $_POST['title'];
$author = $_POST['author'];

// Check if the author exists, and insert if not
$sqlAuthor = "INSERT INTO authors (name) SELECT * FROM (SELECT '$author') AS tmp WHERE NOT EXISTS (SELECT name FROM authors WHERE name = '$author')";
$conn->query($sqlAuthor);
$author_id = $conn->insert_id;

// Update the book with the valid author_id
$sql = "UPDATE books SET title = '$title', author_id = '$author_id' WHERE id = '$book_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error updating book: " . $conn->error;
}

$conn->close();
?>
