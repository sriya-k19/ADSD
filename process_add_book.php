<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$author = $_POST['author'];

$sqlAuthor = "INSERT INTO authors (name) SELECT * FROM (SELECT '$author') AS tmp WHERE NOT EXISTS (SELECT name FROM authors WHERE name = '$author')";
$conn->query($sqlAuthor);
$author_id = $conn->insert_id;

$sql = "INSERT INTO books (title, author_id) VALUES ('$title', '$author_id')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
