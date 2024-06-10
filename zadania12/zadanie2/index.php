<!DOCTYPE html>
<html>
<head>
    <title>Manage MySQL Database</title>
    <link rel="stylesheet" type="text/css" href="zadanie2/html">
</head>
<body>
<h1>Manage MySQL Database</h1>

<h2>Add Person</h2>
<form action="zadanie2/dodajOsobe.php" method="post">
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="secondname">Last Name</label>
    <input type="text" id="secondname" name="secondname" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" value="Add Person">
</form>

<h2>Add Car</h2>
<form action="zadanie2/dodajAuto.php" method="post">
    <label for="model">Model</label>
    <input type="text" id="model" name="model" required>

    <label for="price">Year</label>
    <input type="number" id="price" name="price" required>

    <label for="day_of_buy">Date of Purchase</label>
    <input type="datetime-local" id="day_of_buy" name="day_of_buy" required>

    <label for="person_id">Select Person</label>
    <select id="person_id" name="person_id" required>
        <option value="">Select Person</option>
        <?php
        // Pobieranie listy osób z bazy danych
        try {
            $conn = new PDO("mysql:host=localhost;dbname=zadanie2", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->query("SELECT Person_id, Person_firstname, Person_secondname FROM Person");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=\"" . $row['Person_id'] . "\">" . htmlspecialchars($row['Person_firstname']) . " " . htmlspecialchars($row['Person_secondname']) . "</option>";
            }
        } catch (PDOException $e) {
            echo "<option value=\"\">Błąd podczas pobierania danych</option>";
        }
        ?>
    </select>

    <input type="submit" value="Add Car">
</form>

<h2>Persons</h2>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=zadanie2", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->query("SELECT * FROM Person");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Person_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Person_firstname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Person_secondname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td class='action-buttons'>";
            echo "<form action='zadanie2/edytuj.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='Person_id' value='" . $row['Person_id'] . "'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";
            echo "<form action='zadanie2/usun.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='Person_id' value='" . $row['Person_id'] . "'>";
            echo "<input type='submit' value='Delete' class='delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='5'>Błąd podczas pobierania danych</td></tr>";
    }
    ?>
</table>

<h2>Cars</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Year</th>
        <th>Person ID</th>
        <th>Action</th>
    </tr>
    <?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=zadanie2", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->query("SELECT * FROM Cars");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Cars_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Cars_model']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Cars_price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Person_id']) . "</td>";
            echo "<td class='action-buttons'>";
            echo "<form action='includes/edit_car.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='Cars_id' value='" . $row['Cars_id'] . "'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";
            echo "<form action='includes/delete_car.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='Cars_id' value='" . $row['Cars_id'] . "'>";
            echo "<input type='submit' value='Delete' class='delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='5'>Błąd podczas pobierania danych</td></tr>";
    }
    ?>
</table>
</body>
</html>

