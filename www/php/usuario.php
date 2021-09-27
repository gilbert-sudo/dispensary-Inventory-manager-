<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');
if(isset($_POST['acao'])){
    $nome=$_POST['nome'];
    $cargo=$_POST['cargo'];
   $usuario=$_POST['usuario'];
   $senha=$_POST['senha'];

       $sql = $db->prepare("INSERT INTO tb_usuarios (nome, usuario, senha, cargo) VALUES (:nome ,:usuario ,:senha ,:cargo)");
       $sql->bindValue(':nome', $nome);
       $sql->bindValue(':usuario',$usuario);
       $sql->bindValue(':senha',$senha);
       $sql->bindValue(':cargo',$cargo);
       $sql->execute();
       header('Location: ../main.php?pg=usuario');
   }
?>