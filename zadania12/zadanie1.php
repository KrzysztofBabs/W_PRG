<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moja_baza_danych";




$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}


//$sql = "CREATE TABLE Student (
//    StudentID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    Firstname VARCHAR(255) NOT NULL,
//    Secondname VARCHAR(255) NOT NULL,
//    Salary INT(6),
//    DateOfBirth DATE
//)";
//
//if ($conn->query($sql) === TRUE) {
//    echo "Tabela Student została utworzona pomyślnie";
//} else {
//    if($conn->errno == 1050) {
//        echo "Tabela Student już istnieje";
//    } else {
//        echo "Błąd przy tworzeniu tabeli: " . $conn->error;
//    }
//}


if(isset($_POST['delete'])) {
    $sql = "DROP TABLE IF EXISTS Student";
    if ($conn->query($sql) === TRUE) {
        echo "Tabela Student została usunięta pomyślnie";
        header("Refresh:0");
    } else {
        echo "Błąd przy usuwaniu tabeli: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage MySQL table</title>
</head>
<body>
<h1>Zarządzanie tabelą MySQL</h1>
<form method="post">
    <button type="submit" name="delete" style="background-color: green; color: white; padding: 10px; border: none; border-radius: 5px;">Delete Table</button>
</form>
</body>
</html>
