<?php
    // Import des ressources
    require_once 'service/db_connect.php';

    // Creation d'un cookies avec une durée de vie de 30 jours (1 lui)

    setcookie('monCookieAvecDuree', 'Voici la valeur de mon Cookie, ceci est un mot de passe', time() + 3600 * 24 * 30);


    // La requête SELECT
    $requete = 'SELECT * FROM modeles ORDER BY marque ASC;';

    // Préparation de la requête
    $stmt = $db_connexion->query($requete);
    // Récupération des résultats
    $listModeles = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP : SELECT sur une BDD</title>

    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <nav>
        <a href="view/ajoutModele.php">Ajouter un modèle de voiture</a>
        <a href="view/connect.php">Se connecter</a>
    </nav>

    <h1>PHP : Requêter (SELECT) sur une BDD</h1>

    <p>Je souhaite afficher les données de la table modeles (triées par marque) qui sont présentes en BDD avec un tableau HTML</p>

    <table>
        <tr>
            <th>id_modele</th>
            <th>Modèle</th>
            <th>marque</th>
            <th>Carburant</th>
        </tr>
        
        <?php
            // Affichage des données
            foreach($listModeles as $modele){
                echo '<tr>';
                
                foreach ($modele as $valeur) {
                    echo '<td>' . $valeur . '</td>';
                }
                
                echo '</tr>';
            }
        ?>
        
    </table> 

</body>
</html>