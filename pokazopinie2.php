<?php
	$host = "localhost";
	$db_user = "root";
    $db_password = "";
    $db_name = "ehurt";

    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    if ($polaczenie->connect_error) {
        die("Połączenie nieudane: " . $polaczenie->connect_error);
    }

// Zapytanie SQL do pobrania opinii
$sql = "SELECT id, imie, ocena, opinia FROM opinie";
$result = $polaczenie->query($sql);

// Wyświetlenie opinii
if ($result->num_rows > 0) {
    echo "<h2>Opinie użytkowników:</h2> <br>";
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>Id:</strong> " . htmlentities($row["id"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p><strong>Imię użytkownika:</strong> " . htmlentities($row["imie"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p><strong>Ocena:</strong> " . htmlentities($row["ocena"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p><strong>Treść opinii:</strong> " . htmlentities($row["opinia"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<br>";
        echo "</div>";
    }
} else {
    echo "Brak opinii do wyświetlenia.";
}

echo "<br><br>";
echo '<a href="konto2.php">Wróć do poprzedniej strony</a>';

$polaczenie->close();


?>