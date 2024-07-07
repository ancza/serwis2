<?php
	$host = "localhost";
	$db_user = "root";
    $db_password = "";
    $db_name = "ehurt";

    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    if ($polaczenie->connect_error) {
        die("Połączenie nieudane: " . $polaczenie->connect_error);
    }
// Pobranie danych z formularza i walidacja
//$imie = filter_input(INPUT_POST, 'imie');
//$ocena = filter_input(INPUT_POST, 'ocena');
//$opinia = filter_input(INPUT_POST, 'opinia');

$imie = $_POST['imie'];
$ocena = $_POST['ocena'];
$opinia = $_POST['opinia'];

$sql = "INSERT INTO opinie (imie, ocena, opinia) VALUES ('$imie', '$ocena', '$opinia')";

if ($polaczenie->query($sql) === TRUE) {
    echo "Opinia została zapisana pomyślnie";
} else {
    echo "Błąd podczas zapisywania opinii: " . $polaczenie->error;
}

$polaczenie->close();


?>