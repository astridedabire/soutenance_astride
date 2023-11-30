<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";


$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}


$nom = $_POST['nom'];
$email = $_POST['email'];

$message = $_POST['message'];
$sql = "INSERT INTO commentaire (nom,  email, message) VALUES ('$nom', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Merci pour votre apport!";
   header("Location: index.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
