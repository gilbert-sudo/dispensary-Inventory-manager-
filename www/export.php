<?php
include('classes/connect.php');
// Store the file name into variable
$file = "programmed-add.db";
$exp_path = getenv('HOMEDRIVE') . getenv("HOMEPATH") . "\Desktop";
$path = "$exp_path\\Produits.db";

// Header content type

// Read the file
copy($file, $path);
//exec("EXPLORER /E, $exp_path");

//RESET the programmed-add.db data base
$db = connect('programmed-add.db');
$sql = $db->query('DELETE FROM `add_product`');

$db_2 = connect2('pharmacie.db');
$reset_pro = $db_2->prepare("UPDATE tb_produtos SET codBarras = 0 WHERE codBarras = 1");
$reset_pro->execute();
?>
<div  align="center">
    <h3>
       <big><strong>🔔</strong></big> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Votre programme a bien été exporté ✅ <br><small> Dans votre bureau sous le nom de </small><strong>Produits.db</strong> 
    </h3>
</div>
<hr>
<div align="center">
    <h4>L'avez-vous trouver?</h4>
    <a class="btn btn-danger" href="php/reveal-dasktop.php">NON, Ouvrir mon bureau 🤔!</a>
    <a class="btn btn-primary" href="?pg=produtos">Merci, Je l'ais trouvé 🙂!</a>
</div>
