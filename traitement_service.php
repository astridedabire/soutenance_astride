<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Traitement d'ajout service
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (isset($_POST['titre']) && isset($_FILES['image'])) {
        $titre = $_POST['titre'];
        $image = $_FILES['image']['name'];

        $targetDir = "uploads/";
        move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $image);

        $sql = "INSERT INTO service (titre, image) VALUES ('$titre', '$image')";
        if ($conn->query($sql) === TRUE) {
            echo "Service ajouté avec succès.";
            header("Location: service.php");
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Vérification des champs requis
    if (isset($_POST['titre']) && isset($_POST['service_id'])) {
        // Récupération des données du formulaire
        $titre = $_POST['titre'];
        $service_id = $_POST['service_id'];

        // Connexion à la base de données (à adapter avec vos informations)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "solucom";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

       
        $sql = "UPDATE service SET titre='$titre' WHERE id=$service_id";
        if ($conn->query($sql) === TRUE) {
            echo "Service modifié avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>