<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zadanie2";

$person_id = isset($_POST['Person_id']) ? $_POST['Person_id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $secondname = isset($_POST['secondname']) ? $_POST['secondname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE Person SET Person_firstname = ?, Person_secondname = ?, email = ? WHERE Person_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $secondname, $email, $person_id]);

        echo "Dane osoby zostały zaktualizowane pomyślnie";
    } catch(PDOException $e) {
        echo "Błąd podczas aktualizacji danych: " . $e->getMessage();
    }
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM Person WHERE Person_id = ?");
        $stmt->execute([$person_id]);
        $person = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Błąd podczas pobierania danych: " . $e->getMessage();
    }
}

$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edytuj Osobę</title>
</head>
<body>
<h1>Edytuj Osobę</h1>
<form action="edit_person.php" method="post">
    <input type="hidden" name="Person_id" value="<?php echo htmlspecialchars($person['Person_id']); ?>">
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($person['Person_firstname']); ?>" required>

    <label for="secondname">Last Name</label>
    <input type="text" id="secondname" name="secondname" value="<?php echo htmlspecialchars($person['Person_secondname']); ?>" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($person['email']); ?>" required>

    <input type="submit" name="update" value="Zaktualizuj">
</form>
</body>
</html>
