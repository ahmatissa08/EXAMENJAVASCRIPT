<?php
 $conn = new mysqli("mysql-addimiglobal.alwaysdata.net", "351911", "9WCQw!DynUD5!Zz", "addimiglobal_14");
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$questions = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $question = array(
            "question" => $row['question'],
            "options" => array($row['option1'], $row['option2'], $row['option3']),
            "answer" => $row['answer']
        );
        array_push($questions, $question);
    }
}

echo json_encode($questions);
$conn->close();
?>
