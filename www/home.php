<?php
include( 'classes/Mysql.php' );
$usuario = $_SESSION['usuario'];
?>
<div class="home">
    <div class="rom">
        <div class="col-md-4">
            <div class="card" style="padding: 10px;width: 280px;height: 145px;margin-right: 50px;margin-bottom: 50px;margin-left: 30px;background-color: #00a99d">
                <div class="">
                    <h2 style="margin-left: 50px;margin-top: 15px;">Bienvenue</h2>
                    <h3 style="margin-left: 80px;"><?php echo $usuario ?></h3>
                </div>
            </div>

            <!--Weather Forecast courtesy of www.tititudorancea.com-->
            <style>
                .WFOT1 {border:2px solid #E1E1E1; background-color:#F1F1F1; padding:10px}
                .WFH1 {font:bold 14px Arial, sans-serif; margin-bottom:6px}
                TABLE.WFOT TD {vertical-align:top}
                .FCOVTMP {font:14px Arial, sans-serif; line-height:16px; padding-bottom:4px}
                .FCOVEXP {font:12px Arial, sans-serif; line-height:14px; text-align:center}
                .WFI {background-color:#3399FF;padding:0}
                .WTL {color:blue;font-weight:bold}
                .WTH {color:red;float:right;font-weight:bold}

                .WFDAY {font-size:12px;text-align:center;font-weight:bold}
            </style>
            <div style="position:relative;background-color:#FFFFFF;margin-left: 45px">
                <div id="wf_div"></div>
                <script type="text/javascript" src="https://tools.tititudorancea.com/weather_forecast.js?place=antananarivo&amp;s=1&amp;days=6&amp;utf8=no&amp;columns=3&amp;lang=FR"></script>

            </div>
            <!--end of Weather Forecast-->


        </div>

            <div class="col-md-7">
                <div class="card" style="width: 340px;height: 300px;margin-left: 90px;background-color:#fffa90">
                    <div class="table-responsive col-md-12">
                        <?php
                        $data = date( 'Y/m/d' );
                        $sql = $db->prepare( "SELECT * FROM tb_lembrete" );
                        $sql->execute();
                        $lembrete = $sql->fetchAll();
                        ?>
                        <h3>Notes autocollantes</h3>
                        <br/>
                        <table class="table table-striped table-responsive" cellspacing="0" cellpadding="0"
                               style="width : 100px;" 
                        >
                        <thead>

                        <?php
                        foreach ($lembrete as $value):
                            ?>
                            <tr style="width: 100px">
                                <td style="width: 100px">
                                    <p><?php echo $value['texto'] ?></p>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </thead>
                        <tbody>
                        <tr>

                        </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

