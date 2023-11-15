<!DOCTYPE html>
<html>
<head>
    <title>Votre Titre</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<?php

include 'connexion.php'; // Inclu le script de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $streets = $_POST['street'];
    $street_nbs = $_POST['street_nb'];
    $types = $_POST['type'];
    $cities = $_POST['city'];
    $zipcodes = $_POST['zipcode'];

    // Préparation de la requête pour insérer les données
    $stmt = $conn->prepare("INSERT INTO adresse (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

    foreach ($streets as $index => $street) {
        // Associer les paramètres
        $stmt->bind_param("sisss", $street, $street_nbs[$index], $types[$index], $cities[$index], $zipcodes[$index]);

        // Exécution de la requête
        $stmt->execute();

        // Afficher pour vérification
        echo "Adresse " . ($index + 1) . ": Rue " . $street . ", " . $street_nbs[$index] . ", " . $types[$index] . ", " . $cities[$index] . ", " . $zipcodes[$index] . "<br>";
    }
    

    // Fermeture de la requête et de la connexion
    $stmt->close();
    $conn->close();
}
?>
<a href="form_addresse.php" class="modify-button">Modifier les adresses</a>

</body>
</html>
