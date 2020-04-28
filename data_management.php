<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "secondhanded_textbooks_list";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stdName = $stdId = $comment = $category = $textbookName = "";
$price = $amount = 0;

/* if(!debug_backtrace() and "SELECT * FROM books" == FALSE){ */
$books = "CREATE TABLE books (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stdName VARCHAR(10) NOT NULL,
    stdId VARCHAR(9) NOT NULL,
    sellerId SMALLINT NOT NULL,
    textbookName VARCHAR(50) NOT NULL,
    price SMALLINT NOT NULL,
    category VARCHAR(5),
    stat TINYINT DEFAULT 0 NOT NULL,
    regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    comment VARCHAR(100)
    )";
/*
$booksInf = "CREATE TABLE booksInformation(
    bookName VARCHAR(50) NOT NULL,
    ver VARCHAR(10),
    pic BLOB,
    )";
*/
$conn->query($booksInf);
if($conn->query($books) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}
?>
</body>
</html>