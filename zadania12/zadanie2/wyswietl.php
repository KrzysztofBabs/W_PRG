<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->query("SELECT * FROM Person");
    $persons = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $stmt = $conn->query("SELECT * FROM Cars");
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Błąd podczas pobierania danych: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dane Osób i Samochodów</title>
</head>
<body>
<h1>Dane Osób</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Akcje</th>
    </tr>
    <?php foreach ($persons as $person): ?>
        <tr>
            <td><?php echo htmlspecialchars($person['Person_id']); ?></td>
            <td><?php echo htmlspecialchars($person['Person_firstname']); ?></td>
            <td><?php echo htmlspecialchars($person['Person_secondname']); ?></td>
            <td>
                <form action="edit_person.php" method="post" style="display:inline;">
                    <input type="hidden" name="Person_id" value="<?php echo $person['Person_id']; ?>">
                    <input type="submit" value="Edytuj">
                </form>
                <form action="delete_person.php" method="post" style="display:inline;">
                    <input type="hidden" name="Person_id" value="<?php echo $person['Person_id']; ?>">
                    <input type="submit" value="Usuń">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h1>Dane Samochodów</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Data Zakupu</th>
        <th>ID Właściciela</th>
        <th>Akcje</th>
    </tr>
    <?php foreach ($cars as $car): ?>
        <tr>
            <td><?php echo htmlspecialchars($car['Cars_id']); ?></td>
            <td><?php echo htmlspecialchars($car['Cars_model']); ?></td>
            <td><?php echo htmlspecialchars($car['Cars_price']); ?></td>
            <td><?php echo htmlspecialchars($car['Cars_day_of_buy']); ?></td>
            <td><?php echo htmlspecialchars($car['Person_id']); ?></td>
            <td>
                <form action="edit_car.php" method="post" style="display:inline;">
                    <input type="hidden" name="Cars_id" value="<?php echo $car['Cars_id']; ?>">
                    <input type="submit" value="Edytuj">
                </form>
                <form action="delete_car.php" method="post" style="display:inline;">
                    <input type="hidden" name="Cars_id" value="<?php echo $car['Cars_id']; ?>">
                    <input type="submit" value="Usuń">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

