<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

$person_id = isset($_POST['Person_id']) ? $_POST['Person_id'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM Person WHERE Person_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$person_id]);

    echo "Osoba została usunięta pomyślnie";
} catch(PDOException $e) {
    echo "Błąd podczas usuwania osoby: " . $e->getMessage();
}

$conn = null;
?>
