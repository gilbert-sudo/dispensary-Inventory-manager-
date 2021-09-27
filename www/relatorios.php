<div class="lista-cliente">
    <div class="row">
        <div class="col-lg-5">
            <h5>Relatório de vendas por: mês / <a href = "main.php?pg=relatorio_clientes">cliente</a></h5>
        </div>
    </div>

    <div id="top" class="row">
        <div class="col-lg-5">
            <h2>Vendas por mês</h2>
        </div>
    </div>


    <div id="list" class="row">
		<div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th scope="col">Mês</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Vendas</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include ('classes/Mysql.php');

                        $query = "SET lc_time_names = 'pt_BR';";
                        $sql=MySql::conectar()->prepare($query);
                        $sql->execute();

                        $query =  "SELECT DATE_FORMAT(ven.data, '%M') AS mes
                                        , DATE_FORMAT(ven.data, '%Y') AS ano
                                        , REPLACE(ROUND(SUM(ven.valor), 2), '.', ',') AS val 
                                        , COUNT(ven.id) as qtd
                                        
                                    FROM `tb_vendas` AS ven
                                    
                            INNER JOIN `tb_clientes` AS cli 
                                    ON ven.cliente = cli.id
                                        
                                GROUP BY DATE_FORMAT(ven.data, '%Y-%m') 
                                
                                ORDER BY DATE_FORMAT(ven.data, '%Y-%m') desc";

                        $sql=MySql::conectar()->prepare($query);
                        $sql->execute();

                        $produtos= $sql->fetchAll();

                        foreach ($produtos as $value):
                            echo "	<tr>
                                        <td>" . ucfirst($value['mes']) . "</td>
                                        <td>{$value['ano']}</td>
                                        <td>{$value['qtd']}</td>
                                        <td>R$ {$value['val']}</td>
                                    </tr>";
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
	</div>
</div>
