<?php

include'config.php';

session_start();

if(!isset($_SESSION["user_id"])){
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil</title>
</head>
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

 
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">ImpriMORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
              </ul>

                <!------------------------------------------Historique-------------------------------------------------->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Historique
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Historique</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">25/04/2017</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>




<?php

$conn = mysqli_connect("localhost", "root", "", "login-registration");

$query = "SELECT * FROM facture";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0){
  foreach($query_run as $row){
    //echo
    ?>
    <tr>
      <th scope="row">id:<?= $row['id_facture']; ?></th>
      <td><?= $row['total']; ?></td>
      <td><?= $row['libelle']; ?></td>
    </tr>
    <?php
  }
}
else{
  echo "No record found";
}
 
?>


                    
                  </tbody>

                </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-----------------------------------------END------------------------------------------------------------>
                   

            </div>
          </div>
        </nav>




<div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
      <span class="fs-4">impriMORE</span>
    </a>
  </header>

  <main>
    <h1>Get started with impriMORE</h1>
    <p class="fs-5 col-md-8">improMORE est t'une application de de facturation des impression a distance<p>----------------------------------------------------- BIENVENUE ------------------------------------------</p>---------------------------------------------------------------------- end.</p>

    <div class="mb-5">
      <a href="fill_facture.php" class="btn btn-primary btn-lg px-4">Faire une facture</a>
    </div>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-6">
        <h2>Avantage</h2>
        <p>Pres a commmencer ? Bienvenue sur la platforme a pou avantage de......</p>
        <ul class="icon-list">
          <li >Evite les deplacement</li>
          <li >Securiser</li>
          <li >Facile d'utilisation</li>
          <li >Rapide</li>
        </ul>
      </div>

      <div class="col-md-6">
        <h2>Guides</h2>
        <p>Welcome Here...... Mercie de nous faire confiance suivez les consigne suivant</p>
        <ul class="icon-list">
          <p class="float-end mb-1">
              <a href="#">suivez les instruction suivant</a>
            </p>
          <li>Apres vous etre connectez.....</a></li>
          <li>Cliquez sur le button " Faire une Impression"</a></li>
          <li>Rempliser les champ indiquer et ...</a></li>
          <li>Envoyez a l'impression</a></li>
        </ul>
      </div>
    </div>
  </main>
  <footer class="text-muted text-center py-4">
          <div class="container">
            <p class="float-end mb-1">
              <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Copyright &copy; @UY1_ICT4D</p>
          </div>
        </footer>
</div>






<script src="assets/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>