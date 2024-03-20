<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    $email = $_POST['email'];
    $sql = "UPDATE joueurs SET status = 'active' WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Le joueur a été débloqué avec succès."));
    } else {
        echo json_encode(array("message" => "Erreur lors du déblocage du joueur : " . $conn->error));
    }
    $conn->close();
}
?>
