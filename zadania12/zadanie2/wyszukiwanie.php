<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'Person_id';
$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM Person WHERE Person_firstname LIKE ? OR Person_secondname LIKE ? ORDER BY $order_by");
    $stmt->execute(['%'.$search.'%', '%'.$search.'%']);
    $persons = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Błąd podczas pobierania danych: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sortowanie i Wyszukiwanie</title>
</head>
<body>
<h1>Sortowanie i Wyszukiwanie</h1>
<form action="sort_search.php" method="get">
    Szukaj: <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>">
    Sortuj według:
    <select name="order_by">
        <option value="Person_id" <?php if ($order_by == 'Person_id') echo 'selected'; ?>>ID</option>
        <option value="Person_firstname" <?php if ($order_by == 'Person_firstname') echo 'selected'; ?>>Imię</option>
        <option value="Person_secondname" <?php if ($order_by == 'Person_secondname') echo 'selected'; ?>>Nazwisko</option>
    </select>
    <input type="submit" value="Szukaj i Sortuj">
</form>

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
</body>
</html>
