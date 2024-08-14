<?php

// Lire l'ID actuel depuis le fichier de configuration
$configFilePath = "config.json";

if (!file_exists($configFilePath)) {
    die("Le fichier de configuration n'existe pas.");
}

$configData = file_get_contents($configFilePath);
$config = json_decode($configData, true);

$currentId = isset($config['current_id']) ? $config['current_id'] : die("ID non trouvé dans le fichier de configuration.");

// Définir le chemin du fichier JSON à lire
$jsonFilePath = "site_data.json";

// Vérifier si le fichier existe
if (!file_exists($jsonFilePath)) {
    die("Le fichier JSON spécifié n'existe pas.");
}

// Lire le contenu du fichier JSON
$jsonData = file_get_contents($jsonFilePath);

if ($jsonData === FALSE) {
    die("Erreur lors de la lecture des données depuis le fichier JSON.");
}

// Décoder les données JSON en un tableau PHP
$decodedData = json_decode($jsonData, true);

if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors du décodage des données JSON.");
}

// Trouver l'entrée correspondant à l'ID actuel
$data = null;
foreach ($decodedData as $item) {
    if ($item['id'] == $currentId) {
        $data = $item;
        break;
    }
}

if ($data === null) {
    die("Aucune donnée correspondante à l'ID $currentId.");
}

// Créer des variables dynamiques avec prise en charge des tableaux
foreach ($data as $key => $value) {
    if (is_array($value)) {
        // Vérifier si le tableau est un tableau de valeurs scalaires
        if (array_filter($value, 'is_scalar') === $value) {
            $$key = implode(', ', $value); // Convertir en chaîne de caractères si le tableau contient des valeurs scalaires
        } else {
            $$key = $value; // Conserver le tableau tel quel s'il contient des valeurs non scalaires
        }
    } else {
        $$key = $value;
    }
}

// Afficher les coordonnées de l'emplacement si elles existent
if (isset($emplacement['coordinates'])) {
    $latitude = $emplacement['coordinates'][1]; // Latitude (49.419205375551456)
    $longitude = $emplacement['coordinates'][0]; // Longitude (0.23311966791197847)

} else {
    echo "Coordonnées non disponibles.";
}

?>
