
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


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM utilisateur WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
    header("Location: admin.php");
    exit();
} else {
  
    echo "Identifiants invalides. Veuillez réessayer.";
}


$conn->close();
?>
