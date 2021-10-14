<?php

class Sistema
{


    public static function carregarPagina()

    {  if (isset($_GET['pg'])) {
        $pg = $_GET['pg'];
    }
        
        if (isset( $pg )) {
                include $pg . ".php";
            // onde 'pg' é a variavel passada pela URL (GET)
        }
        else{
            $pg = 'accueil';
            include 'home.php'; //primeiro acesso, padrao 'home.php'

        }
    }
    public static function logado(){
        return isset($_SESSION['login']) ? 1: 0;
    }
    public static function loggout(){
        session_destroy();
    }

}
function showErr()
{
    if (isset($_GET['err'])) {
        if (($_GET['err']) == 1) {
            if (isset($_GET['typeMess']) && isset($_GET['errMess'])) {
                $TypeMess = $_GET['typeMess'];
                $errMess = $_GET['errMess'];
                echo '<button name="error" class="btn btn-' . $TypeMess . '" onclick="return false;"> ' . $errMess . '</button>';
            }
        }
    }
}