<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    if (empty($name) || empty($pseudo) || empty($password) || empty($telephone) || empty($email)) {
        echo "Tous les champs sont obligatoires.";
        exit();
    }

    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $sql_check = "SELECT * FROM admin WHERE pseudo = '$pseudo'OR  email = '$email' OR  telephone = '$telephone';";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Le joueur avec ce pseudo existe déjà.');</script>";
        exit();
    }

    $sql_insert = "INSERT INTO admin (name, pseudo, password, telephone, email) VALUES ('$name', '$pseudo', '$password', '$telephone', '$email')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Inscription réussie.');</script>";
        header("Location: home_admin.php");
    } else {
        echo "<script>alert('Erreur lors de l\'inscription : " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>
