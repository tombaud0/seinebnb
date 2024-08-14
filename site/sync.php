<?php

// Définir le chemin du fichier de configuration
$configFilePath = "config.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Inclure et exécuter le script de récupération des données
        include 'fetch_data.php'; // Remplacez par le chemin correct vers votre script de récupération des données

        echo "Les données ont été récupérées et stockées.";
    } else {
        echo "Erreur.";
    }

?>