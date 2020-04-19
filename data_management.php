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

$stdName = $stdId = $textbook = $ver = $comment = "";
$price = $amount = 0;
$inStock = $sold = FALSE;


$table = "CREATE TABLE books (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stdName VARCHAR(10) NOT NULL,
    stdId VARCHAR(9) NOT NULL,
    textbook_name VARCHAR(50) NOT NULL,
    ISBN TINYINT,
    ver VARCHAR(5) NOT NULL,
    amount TINYINT NOT NULL,
    price SMALLINT NOT NULL,
    stat TINYINT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    comment VARCHAR(100),
    )";

$addBook = $conn->prepare("INSERT INTO books(stdName, stdId, textbook, ver, 
    amount, price, inStock, sold, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$addBook->bind_param("sssssssss", $stdName, $stdId, $textbook, $ver, $amount, $price,
    $inStock, $sold, $comment);

$addBook->close();
$conn->close();
?>
</body>
</html>