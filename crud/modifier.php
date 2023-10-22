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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];

    $sql = "UPDATE infos SET nom=?, prenom=?, age=?, adresse=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssisi", $nom, $prenom, $age, $adresse, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM infos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

?>
    <h1>Formulaire d'édition (UPDATE)</h1>

    <!-- Formulaire de modification ici -->
    <form method="POST" action="modifier.php">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label for="nom">Nom :</label>
        <input type="text" name="nom" value="<?= $row['nom'] ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" value="<?= $row['prenom'] ?>" required><br>

        <label for="age">Âge :</label>
        <input type="number" name="age" value="<?= $row['age'] ?>" required><br>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" value="<?= $row['adresse'] ?>" required><br>

        <input type="submit" name="modifier" value="Modifier">
    </form>

    <a href="index.php" class="btn btn-primary">Retour à la liste</a>

</body>
</html>