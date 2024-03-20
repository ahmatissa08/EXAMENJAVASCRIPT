<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['email'] = $email;
        echo "Connexion réussie. Redirection vers la page d'accueil de l'administrateur...";
        header("Location: home_admin.php");
    } else {
        echo "<script>alert('Erreur lors de la connexion email ou mot de passe incorect  VEUILLEZ RESSAYER: " . $conn->error . "');</script>";
    }

    // Fermer la connexion
    $conn->close();
}
?>
