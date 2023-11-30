<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$titre1 = $_POST['titre1'];
$titre2 = $_POST['titre2'];
$description1 = $_POST['description1'];
$description2 = $_POST['description2'];
$date = $_POST['date'];

$image1 = $_FILES['image1']['name'];
$image2 = $_FILES['image2']['name'];


$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);


move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1);
move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);


$sql = "INSERT INTO publication (titre1, titre2, image1, image2, description1, description2, date) 
        VALUES ('$titre1', '$titre2', '$image1', '$image2', '$description1', '$description2', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Poste ajouté avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
