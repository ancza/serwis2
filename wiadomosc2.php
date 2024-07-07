<?php
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ehurt";


$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_error) {
    die("Connection failed: " . $polaczenie->connect_error);
}

    //if($polaczenie->connect_errno!=0)
    //{
    //    echo "Error:".$polaczenie->connect_errno ;
    // }


// Pobieranie danych z formularza
$imie = $polaczenie->real_escape_string($_POST['imie']);
$email = $polaczenie->real_escape_string($_POST['email']);
$telefon = $polaczenie->real_escape_string($_POST['telefon']);
$wiadomosc = $polaczenie->real_escape_string($_POST['wiadomosc']);

// Zapytanie SQL do wstawienia danych 
$sql = "INSERT INTO wiadomosci (imie, email, telefon, wiadomosc) VALUES ('$imie', '$email','$telefon', '$wiadomosc')";

if ($polaczenie->query($sql) === TRUE) {
    echo "Twoja wiadomość została wysłana! <br>";
    echo "Witaj, " . $_POST['imie'] . "! Treść twojej wiadomości: " . $_POST['wiadomosc'];

    echo "<br><br>";
    echo '<a href="index_v2.html">Wróć do poprzedniej strony</a>';


} else {
    echo "Error: " . $sql . "<br>" . $polaczenie->error;
}

$polaczenie->close();
?>
