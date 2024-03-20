<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    $sql = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "L'administrateur a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'administrateur : " . $conn->error;
    }

    $conn->close();
}
?>
