<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $articleId = $_GET['id'];


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }


    $sql = "DELETE FROM article WHERE id = $articleId";

    if ($conn->query($sql) === TRUE) {
        header('Location: article.php');
        exit;
    } else {
        echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }
    
    
    $conn->close();
} else {
    echo "ID service non valide.";
}
?>
