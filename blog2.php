<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECOURSES - Online Courses HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="assets/css/fontawesome.css">

  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">  
  

  <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
<?php include("navbar.php"); ?>

<style>
     
     .card-img-top {
         max-height: 200px;
         object-fit: cover;
     }
 </style>


<div class="container mt-5">
 <h2>Vos Publications</h2>
 <div class="row">
     <?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "solucom";

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

 
     $sql = "SELECT * FROM publication ORDER BY date DESC";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
             echo '<div class="col-md-4 mb-3">';
             echo '<div class="card">';
         
             if ($row['image1'] != '') {
                 echo '<img src="uploads/' . $row['image1'] . '" class="card-img-top" alt="Image de la publication">';
             }
             echo '<div class="card-body">';
             echo '<h5 class="card-title">' . $row['titre1'] . ' - ' . $row['titre2'] . '</h5>';
             echo '<p class="card-text">' . $row['description1'] . '</p>';
             echo '<p class="card-text">' . $row['description2'] . '</p>';
             echo '</div>';
             echo '<div class="card-footer text-muted">';
             echo 'Publié le ' . $row['date'];
             echo '</div>';
             echo '</div>';
             echo '</div>';
         }
     } else {
         echo '<p>Aucune publication trouvée.</p>';
     }

     $conn->close();
     ?>
 </div>
</div>



<?php include("footer.php"); ?>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>