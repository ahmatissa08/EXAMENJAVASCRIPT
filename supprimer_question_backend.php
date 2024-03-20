<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    $questionId = $_POST['questionId'];
    $sql = "DELETE FROM questions WHERE id = '$questionId'";
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo json_encode(array("message" => "La question a été supprimée avec succès."));
            header("Location: home_admin.php");
        } else {
            echo json_encode(array("message" => "Aucune question n'a été trouvée avec cet ID."));
        }
    } else {
        echo json_encode(array("message" => "Erreur lors de la suppression de la question : " . $conn->error));
    }

    $conn->close();
}
?>
