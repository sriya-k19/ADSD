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

$sql = "SELECT books.id AS book_id, books.title, authors.name AS author_name 
        FROM books 
        INNER JOIN authors ON books.author_id = authors.id
        WHERE books.id = '$book_id'";

$result = $conn->query($sql);
$book = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="process_edit_book.php" method="POST">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo $book['author_name']; ?>" required><br><br>

        <input type="submit" value="Update Book">
    </form>
</body>
</html>
