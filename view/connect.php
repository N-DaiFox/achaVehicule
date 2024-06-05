<?php
    session_start();

    setcookie('cookieDeSessions', 'Ce cookie sera détruit à la fin de la session');
    setcookie('cookie1min', 'Ce cookie sera détruit dans 1 minute', time() + 60);
    setcookie('monCookieAvecDuree');

    // Import
    require_once '../service/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 1 - Je nettoie les données du formulaire
        $_POST = filter_input_array(
            INPUT_POST,
            [
                'id' => FILTER_SANITIZE_NUMBER_INT,
                'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
            ]
        );

        // 2 - J'hydrate les variables à utiliser pour remplaceer les paramètres de la requête
        $id = $_POST['id'];
        $nom = $_POST['nom'];

        // 3 - J'écris ma requête paramétrées nommées
        $requete = 'SELECT id_personne, nom FROM PROPRIETAIRES WHERE id_personne = :id AND nom = :nom';

        // 4 - Je prépare la requête 
        $stmt = $db_connexion->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);

        // 6 - Exécution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();

        // Si $nb vaut 1, ALORS j'autaorise la connecxion et je redirige l'utilisateur vers une page de modification de profil.
        // ATTENTION / N'oubliez pas d'ouvrir une session et de stocker l'id de l'utilisateur dans $_SESSION
        if($nb > 0){
            $_SESSION['id'] = $id;
            header('Location: updateProprietaire.php');
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP login</title>
</head>
<body>
    <h1>PHP : Login + UPDATE sur la table propriétaires</h1>
    <h2>Ici, le Login</h2>

    <form action="#" method="POST">
        <label for="id">Identifiant</label>
        <input type="text" name="id" id="id">

        <br>

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">

        <br>

        <input type="submit" value="Se connecter">
    </form>



</body>
</html>