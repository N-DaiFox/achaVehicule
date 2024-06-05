<?php
    session_start();

    /*************************************************************
    *       TRES IMPORTANT : NE PAS OUBLIER DE VERIFIER SI        *
    *       L'UTILISATEUR EST VRAIMENT CONNECTE et que son        *
    *   id = 1 (pour simuler une employé de la préfecture) !!!!!! *
    *   Sinon, il est redirigé vers la page de updateProprietaire *
    ***************************************************************/ 
    if (!$_SESSION['id'] == 1) {
        header('Location: updateProprietaire.php');
    }

    // Import
    require_once '../../service/db_connect.php';

    // Requête sur la table MODELES pour les proposer dans un select HTML
    $requete = 'SELECT * from modeles';
    $stmt = $db_connexion->query($requete);
    $listeModeles = $stmt->fetchAll();

    // Récupération de la date du jour pour préremplir le formulaire
    $today = date('Y-m-d');

    /*******************************************************
     *  Ici, traitement pour exécuter une requête UPDATE    *
     *******************************************************/
    // Ce code doit être exécuté QUE SI $_POST est définie
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
        // 1 - Je nettoie les données du formulaires
        $_POST = filter_input_array(
            INPUT_POST,
            [
                'immatriculation' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'id_modeles' => FILTER_SANITIZE_NUMBER_INT,
                'couleur' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'dateVoiture' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
            ]
        );

        // 2 - J'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $immatriculation = $_POST['immatriculation'];
        $id_modeles = $_POST['id_modeles'];
        $couleur = $_POST['couleur'];
        $dateVoiture = $_POST['dateVoiture'];

        // 3 - J'écris ma requête paramétrées nommées
        $requete = 'INSERT INTO voitures VALUES (:immatriculation, :id_modeles, :couleur, :dateVoiture)';

        $stmt = $db_connexion->prepare($requete);
        $stmt->bindParam(':immatriculation', $immatriculation);
        $stmt->bindParam(':id_modeles', $id_modeles);
        $stmt->bindParam(':couleur', $couleur);
        $stmt->bindParam(':dateVoiture', $dateVoiture);

        $stmt->execute();

        $nb = $stmt->rowCount();
        
        if($nb > 0){
            header('Location: ../voiture.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>Table VOITURES -> CREATE</h1>

    <form action="#" method="post">
        <fieldset>
            <legend>Enregistrer un nouveau véhicule</legend>

            <!-- L'immatriculation -->
            <label for="immatriculation">Immatriculation</label>
            <input type="text" name="immatriculation" id="immatriculation">

            <br>

            <!-- le modèle du véhicule (id_modeles) avec SELECT-->
            <label for="id_modeles"></label>
            <select name="id_modeles" id="id_modeles">
                <option value="">Choisissez le modèle du véhicule</option>

                <?php
                    foreach ($listeModeles as $valeurs) {
                        echo '<option value="' . $valeurs['id_modeles'] . '">' . $valeurs['modele'] . ' - ' . $valeurs['marque'] . ' - ' . $valeurs['carburant'] . '</option>';
                    }
                     
                ?>
            
                </select>

            <br>
            
            <fieldset>
                <legend>Choisissez la couleurs du véhicule</legend>
                <!-- Les couleurs (CL, MO, FO) avec RadioButton-->
                <input type="radio" name="couleur" id="couleur_CL" value="CL">
                <label for="couleur">Clair</label>
                <br>

                <input type="radio" name="couleur" id="couleur_MO" value="MO">
                <label for="couleur">Moyen</label>
                <br>

                <input type="radio" name="couleur" id="couleur_FO" value="FO">
                <label for="couleur">Foncé</label>
            </fieldset>
            
            <br>

            <!-- La date d'achat (dateVoiture) -->
            <label for="dateVoiture">Date d'achat</label>
            <input type="date" name="dateVoiture" id="dateVoiture" value="<?= $today ?>">

            <br>

            <input type="submit" value="Enregistrer le nouveau véhicule">

        </fieldset>
    </form>

</body>
</html>