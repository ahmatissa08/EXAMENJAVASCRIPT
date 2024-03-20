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
        $questions[] = $row;
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($questions);
?>
