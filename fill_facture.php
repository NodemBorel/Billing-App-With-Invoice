<?php

include'config.php';

session_start();

if(!isset($_SESSION["user_id"])){
  header("Location: index.php");
}


 if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
  
       move_uploaded_file($file_tmp,"uploads/".$file_name);
       $pdf = file_get_contents("uploads/".$file_name);
  $number = preg_match_all("/\/Page\W/", $pdf, $dummy);
  echo "<br><h1>Le nombre de page dans ce document est ". $number . "</h1><br>";
  echo "<center><a href='facture.php' class='btn btn-secondary'>savegarder la facture</a></center>";
  echo "<p></p>";
  echo "<script> alert('Le nombre de page dans ce document est '+' ' + $number);</script>";
 }

 if(isset($_POST['submit'])){
    $relue = $_POST['relue'];
    $couleur = $_POST['Couleur'];
    $libelle = $_POST['Libelle'];

    if ($relue == "oui") {
        $relue = 300;
    }
    else{
        $relue = 0;
    }

    if ($couleur == "oui1") {
        $couleur = 50;
    }
    else{
        $couleur = 25;
    }

    $total = (($number*$couleur) + $relue);

    $sql = "INSERT INTO facture (libelle, num_page, couleur, relue, total) VALUES ('$libelle', '$number', '$couleur', '$relue', '$total')";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>FORM</title>
        <meta charset="utf-8">
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
                  <a class="nav-link active" aria-current="page" href="logout.php">logout</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="next.php">back>>></a>
                </li>
              </ul>

              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Prix unitaire
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pricing</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Avec couleur --- 50frs</p>
                        <p>Noir et blank --- 25frs</p>
                        <p>Raillure --- 300frs</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </nav>

        <p></p>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-1">
                  <a href="mailto:emperialborel@gmail.com" class="btn btn-secondary ">Envoyer pour impression</a>
                </div> 
                   <div class="card mt-5 shadow">
                        <div class="card-header">
                            <h4>Formulaire facture</h4>
                        </div>
                        <div class="card-body">  
                          <div>
                             <label for="formFileLg" class="form-label">Import a File</label>
                             <input type="file" class="form-control form-control-lg" accept=".pdf" name="image" required>
                          </div>  <br>
                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Libelle document</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail3" name="Libelle" required>
                            </div>
                          </div><br>
                          <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">raillure</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="relue" id="gridRadios1" value="oui" checked>
                                <label class="form-check-label" for="gridRadios1">
                                  oui
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="relue" id="gridRadios2" value="non">
                                <label class="form-check-label" for="gridRadios2">
                                  non
                                </label>
                              </div>
                            </div>
                          </fieldset><br>
                          <label for="formFileLg" class="form-label">couleur</label>
                          <select name="Couleur" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                              <option value="oui1" >Oui</option>
                              <option value="non1" >Non</option>
                         </select><br>
                          <!---<div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Montant</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail3">
                            </div>
                          </div><br> --->
                          <button type="submit" name="submit" class="btn btn-primary" href="facture.php">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <p></p>
        <p></p>

        <footer class="text-muted text-center py-4">
          <div class="container">
            <p class="float-end mb-1">
              <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Copyright &copy; @UY1_ICT4D</p>
          </div>
        </footer>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>