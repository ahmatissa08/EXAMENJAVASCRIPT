<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $question = $_POST['question'];
    $category = $_POST['category'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO questions (question, category, option1, option2, option3, answer) VALUES ('$question', '$category', '$option1', '$option2', '$option3', '$answer')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "La question a été ajoutée avec succès."));
        echo '<script>alert("La question a été ajoutée avec succès."); window.location.href = "home_admin.php";</script>';
    } else {
        echo json_encode(array("message" => "Erreur lors de l'ajout de la question : " . $conn->error));
    }

    $conn->close();
}
?>
