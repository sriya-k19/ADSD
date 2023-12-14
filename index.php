<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT books.id AS book_id, books.title, authors.name AS author_name 
        FROM books 
        INNER JOIN authors ON books.author_id = authors.id";

$result = $conn->query($sql);
$books = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bookstore</title>
    <style>
        /* styles.css */

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f5f5f5;
}

        </style>
</head>
<body>
    <h1>Bookstore</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author_name']; ?></td>
                <td>
                    <!-- Edit Form -->
                    <form action="edit_book.php" method="POST" style="display: inline;">
                        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    
                    <!-- Delete Form -->
                    <form action="process_delete_book.php" method="POST" style="display: inline;">
                        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="add_book.php">Add New Book</a>
</body>
</html>
