<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$secondname = isset($_POST['secondname']) ? $_POST['secondname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO Person (Person_firstname, Person_secondname, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstname, $secondname, $email]);

    echo "Osoba została dodana pomyślnie";
} catch(PDOException $e) {
    echo "Błąd podczas dodawania osoby: " . $e->getMessage();
}

$conn = null;
?>
