<?php
session_start();

function getAdminCount() {
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(*) AS admin_count FROM admin";
    $result = $conn->query($sql);

    $count = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['admin_count'];
    }

    $conn->close();

    return $count;
}
function getPlayers() {
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");


    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM joueurs";
    $result = $conn->query($sql);

    $players = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $players[] = $row;
        }
    }

    $conn->close();

    return $players;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Administrateur</title>
    <script src="register_admin.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="desktop">
    <h2>Bienvenue, Administrateur</h2>
    <div class="rectangle1">
    <?php
    // Afficher le nombre d'administrateurs
    $adminCount = getAdminCount();
    echo "<p>Nombre d'administrateurs inscrits : $adminCount</p>";

    $players = getPlayers();
    if (!empty($players)) {
        echo "<h3>Liste des joueurs inscrits :</h3>";
        echo "<ul>";
        foreach ($players as $player) {
            echo "<li>{$player['name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun joueur inscrit pour le moment.</p>";
    }
    ?>
      
      <div>
        <h3>Gestion des questions :</h3>
        <ul>
            <li><a href="ajouter_question.html">Ajouter une question</a></li>
            <li><a href="masquer_question.html">Masquer une question</a></li>
            <li><a href="supprimer_question.html">Supprimer une question</a></li>
            <li><a href="liste_question.html">Listes des question</a></li>
        </ul>
    </div>
    <div>
        <h3>Ajouter un autre administrateur :</h3>
        <ul>
            <li><a href="register_admin.html">Ajouter un administrateur</a></li>
        </ul>
    </div>
    <div>
        <h3>Gestion des joueurs :</h3>
        <ul>
            <li><a href="supprimer_joueur.html">Supprimer un joueur</a></li>
            <li><a href="bloquer_joueur.html">Bloquer un joueur</a></li>
            <li><a href="debloquer_joueur.html">Débloquer un joueur</a></li>
        </ul>
    </div>
<a href="#" onclick="logout()">Déconnexion</a>
</div>
</div>
</body>
</html>
