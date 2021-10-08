<?php
require_once("classes/Mysql.php");
function createRandomPassword()
{
    $chars = "003232303232023232023456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;
    }
    return $pass;
}

$finalcode = createRandomPassword();

if (isset($_POST['facturer'])) {
    
    $codeitems = [];
    $qttitems = [];
    $arrayCount = 0;
    $total = 0;
    $vita = 0;
    for ($i = 1; $i < 29; $i++) {

        if (isset($_POST['code' . $i])) {
            $code = $_POST['code' . $i];
            $codeitems[] = $code;
            $arrayCount = $arrayCount + 1;
        }
        if (isset($_POST['qt' . $i])) {
            $qtt = $_POST['qt' . $i];
            $qttitems[] = $qtt;
        }
    }

    //entrer les produit dans la base de donnée dans tb_produit_vendu
    for ($i = 0; $i < $arrayCount; $i++) {
        $sql = $db->prepare("SELECT * FROM `tb_produtos` where codInterno= :code");
        $sql->bindValue(':code', $codeitems[$i]);
        $sql->execute();
        $pro = $sql->fetch();
        $numero = $finalcode;
        $codebare = $pro['codInterno'];
        $nom = $pro['descricao'];
        $quantbefore = $pro['quantidade'];
        $quant = $qttitems[$i];
        //update quant in the inventory
        $sql2 = $db->prepare("UPDATE tb_produtos SET quantidade = :quantidade WHERE codInterno = :code");
        $sql2->bindValue(':code', $codeitems[$i]);
        $sql2->bindValue(':quantidade', ($quantbefore-$quant));
        $sql2->execute();
        //END update quant in the inventory
        $valeur = $pro['venda'];
        $date = date("m/d/y");
        $sql = $db->prepare("INSERT INTO tb_produit_vendu (numero, codebare, nom, quant, valeur, date) VALUES (:numero, :codebare, :nom, :quant, :valeur, :date)");
        $sql->bindValue(':numero', $numero);
        $sql->bindValue(':codebare', $codebare);
        $sql->bindValue(':nom', $nom);
        $sql->bindValue(':quant', $quant);
        $sql->bindValue(':valeur', $valeur);
        $sql->bindValue(':date', $date);
        $sql->execute();

        //calcule total prix
        $prix = $valeur * $qttitems[$i];
        //fin calcul total prix
        $total = $total + $prix;
        $vita = $vita + 1;
    }
    // fin entrer les produit dans la base de donnée dans tb_produit_vendu

    //redirection vers facture
    if ($vita == $arrayCount) {
        if ($arrayCount == 0) {
            header('Location: caisse');
        } else {
            header("Location: caisse/facture.php?total=$total&numero=$finalcode");
        }
    }
}
