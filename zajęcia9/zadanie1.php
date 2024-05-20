<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sprawdź swoje urodziny</title>
</head>
<body>
<form method="get" action="zadanie1.php">
    <label for="birthdate">Wybierz datę urodzenia:</label>
    <input type="date" id="birthdate" name="birthdate" required>
    <input type="submit" value="Sprawdź">
</form>
</body>
</html>

<?php
if (isset($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];

    // Sprawdzenie i wyświetlenie wyników
    echo "<p>Data urodzenia: " . htmlspecialchars($birthdate) . "</p>";
    echo "<p>Dzień tygodnia: " . getDayOfWeek($birthdate) . "</p>";
    echo "<p>Ukończone lata: " . getAge($birthdate) . "</p>";
    echo "<p>Ilość dni do najbliższych urodzin: " . getDaysToNextBirthday($birthdate) . "</p>";
}

// Funkcja do obliczenia dnia tygodnia
function getDayOfWeek($date) {
    $timestamp = strtotime($date);
    return date('l', $timestamp);
}

// Funkcja do obliczenia ukończonych lat
function getAge($date) {
    $birthDate = new DateTime($date);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate)->y;
    return $age;
}

// Funkcja do obliczenia dni do najbliższych urodzin
function getDaysToNextBirthday($date) {
    $birthDate = new DateTime($date);
    $currentDate = new DateTime();

    // Ustawienie najbliższych urodzin na ten rok
    $nextBirthday = new DateTime($date);
    $nextBirthday->setDate($currentDate->format('Y'), $birthDate->format('m'), $birthDate->format('d'));

    // Jeśli najbliższe urodziny już były w tym roku, ustaw na następny rok
    if ($nextBirthday < $currentDate) {
        $nextBirthday->modify('+1 year');
    }

    $days = $currentDate->diff($nextBirthday)->days;
    return $days;
}
?>
