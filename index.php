<?php 
    require_once 'service/db_connect.php';

    //? La requête SELECT
    $query = 'SELECT * FROM modeles ORDER BY marque ASC;';

    $stmt = $db_connexion->query($query);
    $listModeles = $stmt->fetchAll();
    // var_dump($listModeles);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acces au BDD </title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    
    <h1>Créer un script permettant d’afficher le contenu de la table « modeles » dans un tableau HTML. <br> Les résultats doivent être triés par marque</h1>
    
    <table>
        <tr>
            <th>id_modele</th>
            <th>Modèle</th>
            <th>Marque</th>
            <th>Carburant</th>
        </tr>
        <tr>
            <?php 
                // Affichage des donées
                foreach ($listModeles as $modele) {
                    echo '<tr>';
                    foreach ($modele as $valeur) {
                        echo '<td>' . $valeur . '</td>';
                    }
                    echo '</tr>';
                }
            ?>
        </tr>
    </table>

    <br><hr><br>

    <h2>Exercice 2 : Créer un formulaire qui permet l’insertion de nouvelles données dans la table « modeles ».</h2>


    <form action="" method="POST" class="formulaireEntier">

        <div class="form-control">
            <input type="text" name="modele" id="Modele" placeholder="Modèle du véhicule à enregistrer">
            
        </div>
        <div class="form-control">
            <input type="text" name="marque" id="Marque" placeholder="Marque du véhicule à enregistrer">
            
        </div>
        <div class="form-control">
            <input type="text" name="carburant" id="Carburant" placeholder="Carburant qu'utilise le véhicule">
            
        </div>
        
        <div class="form-control">
            <input type="submit" class="btn-primary" value="VALIDER">      
        </div>
    </form>

            





    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <hr>
</body>
</html>