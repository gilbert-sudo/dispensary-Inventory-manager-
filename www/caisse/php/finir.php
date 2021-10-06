<?php 
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');
function userExist(string $param)
{   
    global $db;
    $numRows = 0;
    $sql = "SELECT * FROM tb_clientes where nome = :nom";
    $result = $db->prepare($sql);
    $result->bindValue(':nom', $param);
    $result->execute();
    while ($row = $result->fetch(SQLITE3_ASSOC)) {
                  ++$numRows;
            }
    if($numRows == 1){
      return true;
    }else {
        return false;
    }
}

if (isset($_POST['finaliser']) & !empty($_POST['cliente'])) {
$total = $_GET['total'];
$numero = $_GET['numero'];          
$user = $_POST['cliente'];
$mode = $_POST['pagamento'];
$state = userExist($user);
           if ($state) {
            header("location: ../index.php?finaliser=1&numero=$numero&total=$total&client=$user&mode=$mode");
           } else {
            $errMess = '⚠ Ce client n\'est pas encore enregistré dans votre base de donnée ‼';
            header("Location: ../facture.php?total=$total&numero=$numero&errMess=$errMess&mode=$mode");
           }
  } ?>
  
  