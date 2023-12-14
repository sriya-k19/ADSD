<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    <form action="process_add_book.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
