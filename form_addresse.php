
<!DOCTYPE html>
<html>
<head>
    <title>Votre Titre</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nb_addresses = $_POST['nb_addresses'];

    echo '<form action="enreg_addresse.php" method="POST">';
    for ($i = 0; $i < $nb_addresses; $i++) {
        echo 'Adresse ' . ($i + 1) . ':<br>';
        echo 'Rue: <input type="text" name="street[]" maxlength="50"><br>';
        echo 'Numéro: <input type="number" name="street_nb[]"><br>';
        echo 'Type: <select name="type[]"><option value="livraison">Livraison</option><option value="facturation">Facturation</option><option value="autre">Autre</option></select><br>';
        echo 'Ville: <select name="city[]"><option value="Montréal">Montréal</option><option value="Laval">Laval</option></select><br>';
        echo 'Code postal: <input type="text" name="zipcode[]" maxlength="6"><br><br>';
    }
    echo '<input type="submit" value="Envoyer">';
    echo '</form>';
}
?>
</body>
</html>
