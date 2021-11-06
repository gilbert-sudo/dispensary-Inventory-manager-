<?php
include('classes/Mysql.php');
$date = date('m/d/y');
$date2 = date_parse("$date");
$jour = $date2['day'];
$mois = $date2['month'];
$annee = $date2['year'];
?>



<div class="lista-cliente">
    <h5 style="text-align:right;">Stock le <?= $jour . "/" . $mois . "/" . $annee ?></h5>
    <?php
    $sql = $db->prepare("SELECT principio FROM `tb_produtos`");
    $sql->execute();
    $reg = $sql->fetchAll();
    $reg = array_unique(array_column($reg, 'principio'));

    foreach ($reg as $value2) {

        $types = strtoupper($value2);
        echo "<h6 style='text-align:center;'>$types</h6>";

       
        $sql = $db->prepare("SELECT * FROM `tb_produtos` WHERE principio = '$value2'");
        $sql->execute();
        $produtos = $sql->fetchAll();
        $count = 0;
    ?>



        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th style="text-align:right">Code</th>
                        <th style="text-align:right">Quantité</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php foreach ($produtos as $value) :
                        $count++;
                            ?>
                            <td><?php echo $count ?></td>
                            <td style="min-width: 490px;"><?php echo $value['descricao'] ?></td>
                            <td style="text-align:right"><?php echo $value['codInterno'] ?></td>
                            <td style="text-align:right"><?php echo $value['quantidade'] ?></td>

                    </tr>
                <?php endforeach; ?>
            
                </tbody>
            </table>
        </div>

    <?php
    }
    ?>

</div>