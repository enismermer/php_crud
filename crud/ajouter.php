<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO infos (nom, prenom, age, adresse) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssis", $nom, $prenom, $age, $adresse);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
}
?>
    <h1>Formulaire d'ajout (CREATE)</h1>

    <!-- Formulaire d'ajout ici -->
    <form method="POST" action="ajouter.php">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="age">Âge :</label>
        <input type="number" name="age" required><br>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" required><br>

        <input type="submit" name="ajouter" value="Ajouter">
    </form>

    <a href="index.php" class="btn btn-primary">Retour à la liste</a>

</body>
</html>