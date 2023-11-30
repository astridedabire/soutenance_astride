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
$contact = $_POST['contact'];
$message = $_POST['message'];
$sql = "INSERT INTO message (nom, contact, email, message) VALUES ('$nom','$contact', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message recu nous vous contacterons très vite !";
   header("Location: index.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
