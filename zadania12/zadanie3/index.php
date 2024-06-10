<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="zadanie3/styl.css">
</head>
<body>
<div class="container">
    <h2>Registration Form</h2>
    <form method="POST">
        <input type="text" name="imie" placeholder="First Name" required><br>
        <input type="text" name="nazwisko" placeholder="Last Name" required><br>
        <input type="text" name="wiek" placeholder="Age" required><br>
        <input type="email" name="e-mail" placeholder="Email" required><br>
        <input type="password" name="haslo" placeholder="Password" required><br>
        <input type="submit" name="rej" value="Register">
    </form>
    <div class="count">
        <?php
        $con = mysqli_connect("localhost", "root", "", "x");
        $zap = "CREATE TABLE IF NOT EXISTS klient (
                        klient_ID INT PRIMARY KEY AUTO_INCREMENT,
                        klient_imie VARCHAR(255) NOT NULL,
                        klient_nazwisko VARCHAR(255) NOT NULL,
                        klient_wiek INT,
                        klient_email VARCHAR(255) NOT NULL,
                        klient_haslo VARCHAR(255) NOT NULL
                    )";
        mysqli_query($con, $zap);
        $zap2 = "SELECT COUNT(klient_ID) FROM klient";
        $wynik = mysqli_query($con, $zap2);
        $row = mysqli_fetch_array($wynik);
        echo "Number of registered users: " . $row['COUNT(klient_ID)'];

        if (isset($_POST['rej'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            $email = $_POST['e-mail'];
            $haslo = $_POST['haslo'];

            $hash = password_hash($haslo, PASSWORD_DEFAULT);
            $zap3 = "INSERT INTO klient (klient_imie, klient_nazwisko, klient_wiek, klient_email, klient_haslo) VALUES ('$imie', '$nazwisko', '$wiek', '$email', '$hash')";
            mysqli_query($con, $zap3);

            mysqli_close($con);
        }
        ?>
    </div>
</div>
</body>
</html>
