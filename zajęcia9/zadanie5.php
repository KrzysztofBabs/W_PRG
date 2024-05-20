

<?php

$ipFile = 'IPadresy.txt';
$userIP = $_SERVER['REMOTE_ADDR'];
function isIPAllowed($ip, $file) {
    if (!file_exists($file)) {
        return false;
    }

    $allowedIPs = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $allowedIPs);
}
if (isIPAllowed($userIP, $ipFile)) {
    include 'strona1.php';
} else {
    include 'strona2.php';
}
?>

