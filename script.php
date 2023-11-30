<?php
function afficherTitrePublicationParID($idPublication)
{
    $conn = new mysqli('localhost', 'root', '', 'solucom');

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $sql = "SELECT id, titre1 FROM publication WHERE id = $idPublication";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idPublication = $row['id'];
        $titrePublication = $row['titre1'];

        $conn->close();

        return $titrePublication;
    } else {
        $conn->close();
        return "Aucun titre de publication n'a été trouvé dans la base de données pour l'ID spécifié.";
    }
}




function afficherImagePublicationParID($idPublication) {
    $conn = new mysqli('localhost', 'root', '', 'solucom');

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $sql = "SELECT id, image1 FROM publication WHERE id = $idPublication";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePublication = $row['image1'];

        $conn->close();

        return 'uploads/' . $imagePublication;
    } else {
        $conn->close();
        return "Aucune image de publication n'a été trouvée dans la base de données pour l'ID spécifié.";
    }
}

///////////////////////////////////////////////
$idPublication = 1; 

$cheminImage = afficherImagePublicationParID($idPublication);


?>

