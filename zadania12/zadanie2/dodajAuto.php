<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

$model = isset($_POST['model']) ? $_POST['model'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$day_of_buy = isset($_POST['day_of_buy']) ? $_POST['day_of_buy'] : '';
$person_id = isset($_POST['person_id']) ? $_POST['person_id'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$model, $price, $day_of_buy, $person_id]);

    echo "Samochód został dodany pomyślnie";
} catch(PDOException $e) {
    echo "Błąd podczas dodawania samochodu: " . $e->getMessage();
}

$conn = null;
?>
