<!DOCTYPE html>
<html>
<head>
    <title>Dodaj Osobę i Samochód</title>
</head>
<body>
<h1>Dodaj Osobę</h1>
<form action="insert_person.php" method="post">
    Imię: <input type="text" name="firstname" required><br>
    Nazwisko: <input type="text" name="secondname" required><br>
    <input type="submit" value="Dodaj Osobę">
</form>

<h1>Dodaj Samochód</h1>
<form action="insert_car.php" method="post">
    Model: <input type="text" name="model" required><br>
    Cena: <input type="number" step="0.01" name="price" required><br>
    Data Zakupu: <input type="datetime-local" name="day_of_buy" required><br>
    Właściciel:
    <select name="person_id" required>
        <?php
        // Pobieranie listy osób z bazy danych
        try {
            $conn = new PDO("mysql:host=localhost;dbname=zadanie2", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->query("SELECT Person_id, Person_firstname, Person_secondname FROM Person");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=\"" . $row['Person_id'] . "\">" . $row['Person_firstname'] . " " . $row['Person_secondname'] . "</option>";
            }
        } catch (PDOException $e) {
            echo "Błąd podczas pobierania danych: " . $e->getMessage();
        }
        ?>
    </select><br>
    <input type="submit" value="Dodaj Samochód">
</form>
</body>
</html>

