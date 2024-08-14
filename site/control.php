<?php

// Définir le chemin du fichier de configuration
$configFilePath = "config.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID soumis via le formulaire
    $newId = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if ($newId !== null) {
        // Lire le fichier de configuration existant
        $configData = file_get_contents($configFilePath);
        $config = json_decode($configData, true);

        // Mettre à jour l'ID et réécrire le fichier
        $config['current_id'] = $newId;
        file_put_contents($configFilePath, json_encode($config, JSON_PRETTY_PRINT));

        echo "L'ID a été mis à jour avec succès.";

        // Inclure et exécuter le script de récupération des données
        include 'fetch_data.php'; // Remplacez par le chemin correct vers votre script de récupération des données

        echo "Les nouvelles données ont été récupérées et stockées.";
    } else {
        echo "Veuillez soumettre un ID valide.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'ID</title>
</head>
<body>

<h1>Modifier l'ID utilisé</h1>

<form method="post" action="control.php">
    <label for="id">Nouvel ID :</label>
    <input type="number" name="id" id="id" required>
    <button type="submit">Modifier l'ID</button>
</form>

<form method="post" action="sync.php">
    <button type="submit">Sync</button>
</form>



</body>
</html>
