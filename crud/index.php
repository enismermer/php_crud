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

echo '<h1>Liste des infos</h1>';

echo '<table>';
echo '<tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Âge</th>
        <th>Adresse</th>
        <th>Action</th>
      </tr>';

$sql = "SELECT * FROM infos";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nom'] . '</td>';
        echo '<td>' . $row['prenom'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['adresse'] . '</td>';
        echo '<td>
                <a href="modifier.php?id=' . $row['id'] . '" class="btn btn-warning">Modifier</a>
                <a href="supprimer.php?id=' . $row['id'] . '" class="btn btn-danger">Supprimer</a>
              </td>';
        echo '</tr>';
    }
}

echo '</table>';
echo '<a href="ajouter.php" class="btn btn-primary">Ajouter</a>';

?>

</body>
</html>