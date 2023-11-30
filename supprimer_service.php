<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $serviceId = $_GET['id'];


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }


    $sql = "DELETE FROM service WHERE id = $serviceId";

    if ($conn->query($sql) === TRUE) {
        header('Location: service.php');
        exit;
    } else {
        echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }
    
    
    $conn->close();
} else {
    echo "ID service non valide.";
}
?>
