<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_text = $_POST['question_text'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    $sql = "INSERT INTO questions (question_text, option1, option2, option3, option4, correct_answer) VALUES ('$question_text', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";

    if ($conn->query($sql) === TRUE) {
        echo "La question a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la question : " . $conn->error;
    }

    $conn->close();
}
?>
