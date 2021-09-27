<?php 
require_once 'classes/Mysql.php';
$numRows = 0;

        if(isset($_POST['acao'])){
            if (!empty($_POST['usuario']) and !empty($_POST['senha'])) {

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
                    if($numRows == 1){
                      header("Location:login.php");
                    }else{
                        //erreur
                        $err = '<div class="erro-box"><i class="fa fa-times"></i> Identifiant ou mot de passe incorrect!</div>';
                    }
               }else{
                 //erreur empty
                $err = '<div class="erro-box"><i class="fa fa-times"></i> Veuillez remplir tous les champs!</div>';
            }
        }
 ?> 
<!DOCTYPE html >
<head >
    <meta charset = "utf-8" />
    <meta http - equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
    <title >
        Authentification
    </title >
    <meta content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name = 'viewport' />
    <link rel = "stylesheet" type = "text/css" href = "https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" ><link href = "css/material-kit.css?v=2.0.5" rel = "stylesheet" />

</head >

<body class="login-page sidebar-collapse" >
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" id = "sectionsNav" >
    <div class="container" >
<?php if (isset($err)) {
   echo $err;
 }?>
</nav >
<div class="page-header header-filter" style = "background-image: url('img/far.png'); background-size: cover; background-position: top center;" >
    <div class="container" >
    
        <div class="col-lg-4 col-md-6 ml-auto mr-auto" >
            <div class="card card-login" >

                <form class="form" method = "post" action="#">
                    <div class="card-header card-header-primary text-center" >

                        <h4 class="card-title" > Connexion</h4 >
                    </div >
                    <div class="card-body" >
                        <div class="input-group" >
                            <div class="input-group-prepend" >
                    <span class="input-group-text" >
                      <i class="material-icons" > face</i >
                    </span >
                            </div >
                            <label >
                                <input type = "text" class="form-control" placeholder = "Entrez l'utilisateur..." name = "usuario" >
                            </label >
                        </div >
                        <div class="input-group" >
                            <div class="input-group-prepend" >
                    <span class="input-group-text" >
                      <i class="material-icons" > lock_outline</i >
                    </span >
                            </div >
                            <label >
                                <input type = "password" class="form-control" placeholder = "Tapez le mot de passe" name = "senha" >
                            </label >
                        </div >
                        <button type = "submit"  name = "acao" class="btn btn-primary"> se connecter</button >
                    </div >
                </form >
            </div >
        </div >
    </div >
    <footer class="footer" >
        <div class="container" >

            <div class="copyright " >
                &copy; GILBERT SOFTWARE
            </div >
        </div >
    </footer >
</div >
<!--Core JS Files-->
<script src = "js/core/jquery.min.js" type = "text/javascript" ></script >
<script src = "js/core/popper.min.js" type = "text/javascript" ></script >
<script src = "js/core/bootstrap-material-design.min.js" type = "text/javascript" ></script >
<script src = "js/material-kit.js?v=2.0.5" type = "text/javascript" ></script >
</body >