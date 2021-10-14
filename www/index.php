<?php
require_once 'classes/Mysql.php';
session_start();
$numRows = 0;

if (isset($_POST['acao'])) {
    if (!empty($_POST['usuario']) and !empty($_POST['senha']) and $_POST['fonction'] == "Admin") {

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        //nouveau

        $sql = "SELECT * FROM tb_usuarios where usuario = :usuario AND senha = :senha";
        $result = $db->prepare($sql);
        $result->bindValue(':usuario', $usuario);
        $result->bindValue(':senha', $senha);
        $result->execute();
        while ($row = $result->fetch(SQLITE3_ASSOC)) {
            ++$numRows;
        }
        $info = $result->fetch(SQLITE3_ASSOC);
        if ($numRows == 1) {
            $_SESSION['id'] = $info['id'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['access'] = 1;
            header("Location:main.php");
        }

        //COMPTE MPIASA
        elseif (!empty($_POST['usuario']) and !empty($_POST['senha']) and $_POST['fonction'] == "Admin") {

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            //nouveau

            $sql = "SELECT * FROM tb_caisse where usuario2 = :usuario2 AND senha2 = :senha2";
            $result = $db->prepare($sql);
            $result->bindValue(':usuario2', $usuario);
            $result->bindValue(':senha2', $senha);
            $result->execute();
            while ($row = $result->fetch(SQLITE3_ASSOC)) {
                ++$numRows;
            }
            $info = $result->fetch(SQLITE3_ASSOC);
            if ($numRows == 1) {
                $err = '<div class="erro-box"><i class="fa fa-times"></i> Ce compte ne possède pas le droit administrateur!</div>';
            } else {
                //erreur
                $err = '<div class="erro-box"><i class="fa fa-times"></i> Identifiant ou mot de passe incorrect!</div>';
            }
        }

        //COMPTE MPIASA
        else {
            //erreur
            $err = '<div class="erro-box"><i class="fa fa-times"></i> Identifiant ou mot de passe incorrect!</div>';
        }
    } elseif (!empty($_POST['usuario']) and !empty($_POST['senha']) and $_POST['fonction'] == "Caisse") {

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        //nouveau

        $sql = "SELECT * FROM tb_caisse where usuario2 = :usuario2 AND senha2 = :senha2";
        $result = $db->prepare($sql);
        $result->bindValue(':usuario2', $usuario);
        $result->bindValue(':senha2', $senha);
        $result->execute();
        while ($row = $result->fetch(SQLITE3_ASSOC)) {
            ++$numRows;
        }

        if ($numRows == 1) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header("Location:caisse/index.php?pg=main");
        } elseif (!empty($_POST['usuario']) and !empty($_POST['senha']) and $_POST['fonction'] == "Caisse") {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            //nouveau

            $sql = "SELECT * FROM tb_usuarios where usuario = :usuario AND senha = :senha";
            $result = $db->prepare($sql);
            $result->bindValue(':usuario', $usuario);
            $result->bindValue(':senha', $senha);
            $result->execute();
            while ($row = $result->fetch(SQLITE3_ASSOC)) {
                ++$numRows;
            }
            if ($numRows == 1) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                header("Location:caisse/index.php?pg=main");
            } else {
                //erreur
                $err = '<div class="erro-box"><i class="fa fa-times"></i> Identifiant ou mot de passe incorrect!</div>';
            }
        } else {
            //erreur
            $err = '<div class="erro-box"><i class="fa fa-times"></i> Identifiant ou mot de passe incorrect!</div>';
        }
    } else {
        //erreur empty
        $err = '<div class="erro-box"><i class="fa fa-times"></i> Veuillez remplir tous les champs!</div>';
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http - equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Authentification
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="css/material-kit.css?v=2.0.5" rel="stylesheet" />
    <style>
        .form-control {
            margin-top: 10px;
        }

        .card-title {
            width: 180px;
        }

        .logo {
            z-index: 3000;
            position: absolute;
            margin-top: -50px;
            margin-left: 140px;
        }

        .card-login {
            border-radius: 50px;
            border: 3px solid;
        }
        #fleche-select{
            z-index: 10000;
            position: absolute;
        }
       
    </style>
</head>

<body class="login-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" id="sectionsNav">
        <div class="container">
            <?php if (isset($err)) {
                echo $err;
            } ?>
    </nav>
    <div class="page-header header-filter" style="background-image: url('img/far.png'); background-size: cover; background-position: top center;">
        <div class="container" align="center">

            <div class="col-lg-4 col-md-6 ml-auto mr-auto" style="max-width: 500px">
                <div class="logo text-center">

                    <img src="img.png" class="card-title">
                    <!-- <h4 class="card-title" style="color: #ffffff;"> Connexion</h4> -->
                </div>
                <div class="card card-login" style="height:450px; padding: 150px 50px 50px 50px; width: 360px;">

                    <form class="form" method="post" action="#">

                        <div class="card-body">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <h4 class="material-icons">🎫</h4>
                                    </span>
                                </div>
                                <label style="width: 170px;">
                                    <select class="form-control" name="fonction">
                                        <option value="Caisse">Caisse </option>
                                        <option value="Admin">Admin </option>
                                    </select>
                                </label>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">👨‍💼</i>
                                    </span>
                                </div>
                                <label>
                                    <input type="text" class="form-control" placeholder="Entrez l'utilisateur..." name="usuario">
                                </label>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons"> 🔑</i>
                                    </span>
                                </div>
                                <label>
                                    <input type="password" class="form-control" placeholder="Tapez le mot de passe" name="senha">
                                </label>
                            </div>
                            <button type="submit" name="acao" class="btn" style=" background-color: #10978e; border: 2px solid black;border-radius: 1rem;"> se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">

                <div class="copyright " align="center">
                    &copy; GILBERT Madagascar 
                </div>
            </div>
        </footer>
    </div>
    <!--Core JS Files-->
    <script src="js/core/jquery.min.js" type="text/javascript"></script>
    <script src="js/core/popper.min.js" type="text/javascript"></script>
    <script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="js/material-kit.js?v=2.0.5" type="text/javascript"></script>
</body>