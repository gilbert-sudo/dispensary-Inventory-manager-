<?php
include('../classes/Sistema.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logout.css">
  <title>Logiciel vente</title>
  <style type="text/css">
    .container {
      width: 100%;
      padding-right: 0px;
      padding-left: 0px;
      margin-right: auto;
      margin-left: auto;
    }

    body {

      font-family: Arial, Helvetica, sans-serif
    }

    .card-heading,
    .card-subheading {
      font-weight: bold
    }

    .card {
      width: 450px;
      height: 450px;
      border: none;
      border-radius: 10px
    }

    input {
      width: 100%;
      background: white;
      border-radius: 5px;
      padding: 4px;
      padding-left: 15px;
    }


    .btn-primary {
      border-radius: 8px;
      background: #2979FF;
      width: 120px
    }

    .btn-primary span {
      font-size: 15px
    }
   
  </style>
</head>

<body>
  <content>
    <div id="Block1" class="col-md-2">
      <img class="logo" src="img/logo.png">
      <ul class="menu">
        <li class="active"><a href="index.php"><span class="c">C</span>AISSE</a></li>
        <li><a href="stock.php"><span class="c">S</span>TOCK</a></li>
        <li><a href="parametre.php"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>

    <div id="Block2" class="col-md-10">
      <!-- app content -->
      <div class="bar" align="center">
         <table>
          <td>
            <p class="text">DISPENSAIRE ANGLICAN TSINJOHASINA</p>
          </td>
          <td><a href="../logout.php" class="btn btn-danger loggout">Se déconnecter</a></td>
        </table>
      </div>
      <div class="content">

        <div class="coment-bottom bg-white p-2 px-4" style="margin: 40px;">
          <!-- sign-up -->

          <div class="container d-flex justify-content-center">
            <div class="card mx-2 my-5">
              <h2 class="card-heading px-3">Ajouter un client</h2>
              <h5 class="card-subheading px-3 pb-3">C'est facile et rapide!</h5>
              <form method="POST" action="php/add-user.php">
                <div class="row rone">
                  <input type="text" name="clientName" <?php if (isset($_GET['nom']) & !empty($_GET['nom'])) {
                                                          echo "value=" . $_GET['nom'];
                                                        } else {
                                                          echo "placeholder='Entrez son nom complet (obligatoire)'";
                                                        }; ?> required>
                  <input type="text" name="clientNum" <?php if (isset($_GET['num']) & !empty($_GET['num'])) {
                                                        echo "value=" . $_GET['num'];
                                                      } else {
                                                        echo "placeholder='Entrer un Code interne (obligatoire)'";
                                                      }; ?> required>
                </div>
                <div class="row rtwo">
                  <input type="date" name="clientPhone" <?php if (isset($_GET['tel']) & !empty($_GET['tel'])) {
                                                            echo "value=" . $_GET['tel'];
                                                          } else {
                                                            echo "placeholder='Entrer une date'";
                                                          }; ?>>
                </div>
                <div class="row rthree">
                  <input type="text" name="clientMail" <?php if (isset($_GET['email']) & !empty($_GET['email'])) {
                                                          echo "value=" . $_GET['email'];
                                                        } else {
                                                          echo "placeholder='Entrer une adresse (obligatoire)'";
                                                        }; ?> style="margin-bottom: 30px;" required>
                  <button type="submit" name="enregistrer" class="btn btn-primary mt-3" style="margin-left: 20px;"><span>Enregister</span></button>
                  <a class="btn btn-danger mt-3" href="index.php" style="text-decoration:none; color:white;">Annuler</a>
                </div>
                <?php if (isset($_GET['errMess'])) : ?>
                  <div class="alert alert-<?= $_GET['typeMess']; ?>" style="margin-top: 20px;"><?= $_GET['errMess']; ?></div>
                <?php endif; ?>
              </form>
            </div>
          </div>

          <!-- end sign-up -->
        </div>
      </div>
      <!-- fin affichage panier -->

      <!-- fin app content -->
    </div>
  </content>

  <script src="../js/caisse.js"></script>

</body>

</html>