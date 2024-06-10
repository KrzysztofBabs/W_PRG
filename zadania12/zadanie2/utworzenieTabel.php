<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

try {
    // Połączenie z bazą danych za pomocą PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL do utworzenia tabeli Person
    $sqlPerson = "CREATE TABLE IF NOT EXISTS Person (
        Person_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Person_firstname VARCHAR(255) NOT NULL,
        Person_secondname VARCHAR(255) NOT NULL
    )";

    // SQL do utworzenia tabeli Cars
    $sqlCars = "CREATE TABLE IF NOT EXISTS Cars (
        Cars_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Cars_model VARCHAR(255) NOT NULL,
        Cars_price FLOAT NOT NULL,
        Cars_day_of_buy DATETIME NOT NULL,
        Person_id INT(6) UNSIGNED,
        FOREIGN KEY (Person_id) REFERENCES Person(Person_id)
    )";

    // Wykonanie zapytań
    $conn->exec($sqlPerson);
    $conn->exec($sqlCars);

    echo "Tabele zostały utworzone pomyślnie";

} catch(PDOException $e) {
    echo "Błąd podczas tworzenia tabel: " . $e->getMessage();
}

$conn = null;
?>

