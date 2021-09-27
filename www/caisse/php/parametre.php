<?php
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');
session_start();
$numRows = 0;

        if(isset($_POST['valider'])){
             if (!empty($_POST['nom']) and !empty($_POST['code'])) {

                    $usuario = $_POST['nom'];
                    $senha = $_POST['code'];
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
                    if($numRows == 1){
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['senha'] = $senha;
                        $_SESSION['nome']=$info['nome'];
                      header("Location: ../../main.php");
                    }
                    
               //COMPTE MPIASA
                  elseif (!empty($_POST['nom']) and !empty($_POST['code'])) {

                   $usuario = $_POST['nom'];
                    $senha = $_POST['code'];
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
                    if($numRows == 1){
                        $err = 'Ce compte ne possède pas le droit d\'administrateur!';
                        header("Location: ../parametre.php?err=$err");
                    }else{
                        //erreur
                        $err = 'Identifiant ou mot de passe incorrect!';
                        header("Location: ../parametre.php?err=$err");
                    }
               }

               //COMPTE MPIASA
                    else{
                        //erreur
                        $err = 'Identifiant ou mot de passe incorrect!';
                        header("Location: ../parametre.php?err=$err");
                    }
               }
            else{
                 //erreur empty
                 
                $err = 'Veuillez remplir tous les champs!';
                header("Location: ../parametre.php?err=$err");
            }
        }

?>