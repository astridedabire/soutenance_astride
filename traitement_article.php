<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Traitement d'ajout article
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (isset($_POST['titre']) && isset($_FILES['image'])&& isset($_POST['description'])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
       
        $targetDir = "uploads/";
        move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $image);

        $sql = "INSERT INTO article (titre, image, description) VALUES ('$titre', '$image','$description')";
        if ($conn->query($sql) === TRUE) {
            echo "article ajouté avec succès.";
            header("Location: liste_article.php");
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Vérification des champs requis
    if (isset($_POST['titre']) && isset($_POST['article_id'])) {
        // Récupération des données du formulaire
        $titre = $_POST['titre'];
        $service_id = $_POST['article_id'];

        // Connexion à la base de données (à adapter avec vos informations)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "solucom";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

       
        $sql = "UPDATE service SET titre='$titre' WHERE id=$article_id";
        if ($conn->query($sql) === TRUE) {
            echo "Service modifié avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>