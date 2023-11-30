


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">

   

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>

    

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
       
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
          
                <li class="nav-item">
                  <a
                    class="nav-link d-flex align-items-center gap-2 active"
                    aria-current="page"
                    href="ajout_article.php"
                  >
                    <svg class="bi"><use xlink:href="#house-fill" /></svg>
                    Article
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="service.php">
                    <svg class="bi"><use xlink:href="#file-earmark" /></svg>
                    Service
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="message.php">
                    <svg class="bi"><use xlink:href="#cart" /></svg>
                    Message
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="commentaire.php">
                    <svg class="bi"><use xlink:href="#cart" /></svg>
                    Commentaire
                  </a>
                </li>
               
              </ul>

              <hr class="my-3" />

              <ul class="nav flex-column mb-auto">
                
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" href="déconnexion.php">
                    <svg class="bi"><use xlink:href="#door-closed" /></svg>
                    Déconnexion
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      


    <form action="" method="POST">
    <div class="mb-3">
        <label for="titre" class="form-label">Nouveau titre du service</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Nouvelle image du service</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>

    <input type="hidden" name="service_id" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update" class="btn btn-primary">Modifier le service</button>
</form>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solucom";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['service_id']) && !empty($_POST['service_id']) && isset($_POST['titre'])) {
            $serviceId = $_POST['service_id'];
            $nouveauTitre = $_POST['titre'];


            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $file_tmp_name = $_FILES['image']['tmp_name'];
                $file_name = $_FILES['image']['name'];
              
                move_uploaded_file($file_tmp_name, 'uploads/' . $file_name);
            }

           
            $sql = "UPDATE service SET titre = :nouveauTitre WHERE id = :serviceId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nouveauTitre', $nouveauTitre);
            $stmt->bindParam(':serviceId', $serviceId);
            $stmt->execute();

          
            // header('Location: service.php');
            
        } else {
            echo "Données manquantes pour la mise à jour du service.";
        }
    }
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
    </main>
  </div>
</div>
<script src="bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
