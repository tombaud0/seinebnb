<?php

// Définir le chemin du fichier de configuration
$configFilePath = "config.json";

// Lire l'ID actuel depuis le fichier de configuration
if (!file_exists($configFilePath)) {
    die("Le fichier de configuration n'existe pas.");
}

$configData = file_get_contents($configFilePath);
$config = json_decode($configData, true);

$currentId = isset($config['current_id']) ? $config['current_id'] : die("ID non trouvé dans le fichier de configuration.");

// URL de la page dont vous souhaitez récupérer les données
$url = "https://dir3.databeam.eu/items/PROJECTS";

// Récupération du contenu de la page
$data = file_get_contents($url);

if ($data === FALSE) {
    die("Erreur lors de la récupération des données de l'URL spécifiée.");
}

// Décoder les données JSON en un tableau PHP
$decodedData = json_decode($data, true);

if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
    die("Erreur lors du décodage des données JSON.");
}

// Vérifier si la clé 'data' existe
if (!isset($decodedData['data']) || !is_array($decodedData['data'])) {
    die("La clé 'data' n'existe pas ou n'est pas un tableau dans les données récupérées.");
}

// Trouver l'entrée correspondant à l'ID actuel
$filteredData = array_filter($decodedData['data'], function($item) use ($currentId) {
    return $item['id'] == $currentId;
});

// Vérifier si l'ID a été trouvé
if (empty($filteredData)) {
    die("Aucune donnée correspondante à l'ID $currentId.");
}

// Définir le chemin du fichier JSON où stocker les données
$jsonFilePath = "site_data.json";  // Remplacez le chemin par le chemin correct

// Stocker les données filtrées dans le fichier JSON, en écrasant le contenu précédent
if (file_put_contents($jsonFilePath, json_encode(array_values($filteredData), JSON_PRETTY_PRINT)) === FALSE) {
    die("Erreur lors de la sauvegarde des données dans le fichier JSON.");
}

echo "Les données ont été récupérées et stockées dans $jsonFilePath avec succès.";

?>
